<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scholarship;
use App\requirement;
use App\Tag;
use Alert;
use Illuminate\Support\Facades\DB;
use Session, Redirect;
use View;
use Storage;
use Auth;
use Carbon\Carbon;
use App\Notifications\TutorialPublished;
use Illuminate\Support\Collection;
use App\Userinfo;
use App\User;
use App\Comment;
session()->regenerate();
error_reporting(0);


class ScholarshipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function read()
    {
        $readScholarship = scholarship::orderBy('id')->get();

        return view('/scholarship', compact('readScholarship'));
    }
    public function create()
    {
        $tags   = tag::all();
        return view('/addScholarship', compact('tags'));
        // return view('haha');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'          => 'required|max:100',
            'firm'          => 'required',
            'description'   => 'required',
            'gda'           => 'required|min:1.75|max:4|numeric',
            'semesters'     => 'required',
            'deadline'      => 'required',
            'faculties'     => 'required',
            'programs'      => 'required',
            'image'         => 'mimes:jpeg,jpg,png,gif|max:10000'
            
        ));
        
        $faculty    = ','.implode(",", $request->faculties);
        // dd($faculty);
        $program    = ';'.implode(";", $request->programs);
        $semester   = ','.implode(",", $request->semesters);
        $tanggal    = $request->deadline;
        $date       = date("Y-m-d", strtotime($tanggal));
        if($request->file('image') != null){
            $image  = $request->file('image')->store('beasiswa');
        } else{
            $image  = null;
        }
        $scholarships   = scholarship::create([
            'name'          => $request->input('name'),
            'firm'          => $request->input('firm'),
            'description'   => $request->input('description'),
            'applyOnline'   => 1,
            'image'         => $image,
            'admin_id'      => Auth::user()->id,
        ]);
        $scholarships->requirement()->create([
            'gda'        => $request->input('gda'),
            'semester'   => $semester,
            'deadline'   => $date,
            'faculty'    => $faculty,
            'program'    => $program,
        ]);

        //kode jopan ngirim notif email ke semua user yg memenuhi syarat
        $meong = $request->input('name');
        $terakhir = requirement::latest()->first();
        foreach (User::all() as $user) {
        $aa = $user->getAttribute('name');
        $a = strpos($program, $user->getAttribute('program'));
        $fakultas1 = strpos($faculty, $user->getAttribute('faculty'));
        $semester1 = strpos($semester, $user->getAttribute('semester'));
        // dd($program);

        if($fakultas1 >= 1 and $user->getAttribute('gda') >= $request->input('gda') and $semester1 >= 1 and $a >= 1) {
            $request->session()->put('namaa', $aa);
            $request->session()->put('nama', $meong);
            session()->put('flag', 1);
            session()->put('id', $terakhir->getAttribute('id'));
            $user->notify(new TutorialPublished($user));
        }
        }
        // sampe sini

        $scholarships->tags()->sync($request->tags, false);
        session()->flash('success', 'Scholarship successfull added!');
        return redirect()->route('scholarship.read');
    }

    public function edit($id)
    {
        $scholarships   = scholarship::find($id);
        $requirements   = $scholarships->requirement;
        
        $faculty        = $requirements->faculty;
        $faculties      = explode(',', $faculty);
        $program        = $requirements->program;
        $programs       = explode(';', $program);
        $semester       = $requirements->semester;
        $semesters      = explode(',', $semester);
        $tags = Tag::all();
        return view('/editScholarship', compact('scholarships', 'requirements','tags', 'faculties','programs', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name'          => 'required|max:100',
            'firm'          => 'required',
            'description'   => 'required',
            'gda'           => 'required|min:1.75|max:4|numeric',
            'semesters'     => 'required',
            'deadline'      => 'required',
            'faculties'     => 'required',
            'programs'      => 'required',
            'image'         => 'mimes:jpeg,jpg,png,gif|max:10000'
            
        ));

        $faculty    = ';'.implode(";", $request->faculties);
        $program    = ';'.implode(";", $request->programs);
        $semester   = ';'.implode(";", $request->semesters);
        $tanggal    = $request->deadline;
        $date       = date("Y-m-d", strtotime($tanggal));


        $updateScholarship = scholarship::find($id);
        if($request->file('image') != null){
            Storage::delete($updateScholarship->image);
            $image  = $request->file('image')->store('beasiswa');
        } else{
            $image  = $updateScholarship->image;
        }
        $updateScholarship->update([
            'name'          => $request->input('name'),
            'firm'          => $request->input('firm'),
            'description'   => $request->input('description'),
            'applyOnline'   => 1,
            'image'         => $image,
        ]);
        $updateScholarship->requirement->update([
            'gda'        => $request->input('gda'),
            'semester'   => $semester,
            'deadline'   => $date,
            'faculty'    => $faculty,
            'program'    => $program
        ]);
        if (isset($request->tags)) {
            $updateScholarship->tags()->sync($request->tags);
        } else {
            $updateScholarship->tags()->sync(array());
        }
        session()->flash('notif', 'Edit Succesful!');
        return redirect()->route('scholarship.view', compact('id'));
    }

    public function destroy($id)
    {
        $scholarships   = scholarship::find($id);
        $scholarships->requirement->delete();
        $scholarships->tags()->detach();
        $scholarships->delete();
        session()->flash('deleteNotif', 'Delete Succesful!');
        return redirect()->route('scholarship.read');
    }

    public function view($id)
    {
        $scholarships   = scholarship::find($id);
        $requirements   = $scholarships->requirement;
        // $array_require = json_decode(json_encode($requirements), True);
        // dd($scholarships->tags());
        $comments       = $scholarships->comment;
        
        return view('admin.scholarshipView', compact('scholarships', 'requirements','comments'));
    }

    public function test($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }

        // alert()->message('Sweet Alert with message.');
        return view('/test');
    }

    public function comment(Request $request, $id)
    {
        $user           = Auth::user();
        $scholarships   = scholarship::find($id); 
        $this->validate($request, array(
            'content'          => 'required|max:255',
        ));

        $comment            = new Comment();
        $comment->content   = $request->content;
        $comment->user_id   = 1;
        $comment->admin_id  = $user->id;
        $comment->user_email= $user->email;
        $comment->name      = $user->name;

        $comment->scholarship()->associate($scholarships);
        $comment->save();       

        $comments           = $scholarships->comment;

        $requirements       = $scholarships->requirement;
        $tags    = Tag::all();

        // return redirect()->route('scholarship.read');

        // return redirect()->route('admin.scholarshipView', compact('scholarships', 'requirements','comments'));
        return redirect()->back();
    }
}
