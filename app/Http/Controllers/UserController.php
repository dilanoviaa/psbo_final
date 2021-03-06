<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\scholarship;
use App\User;
use App\Comment;
use App\Notifications\TutorialPublished;
use App\requirement;
use Carbon\Carbon;
use Auth;
use Storage;
use App\Tag;
use App\Rules\ValidPhone;
class UserController extends Controller
{
    public function listScholarship()
    {
        $listScholarship = scholarship::orderBy('created_at', 'desc')->get();
        $tags   = tag::all();
        return view('index', compact('listScholarship', 'tags'));
        return view('home', compact('listScholarship', 'tags'));
    }

    public function scholarshipExplore($id)
    {
        $tag    = Tag::find($id);
        $tags   = tag::all();
        $a= $tag->scholarships;
        $jumlah = count($a);
        // dd($b);
        // dd($tag->scholarships);
        return view('/scholarshipExplore', compact('tag', 'tags','jumlah'));
    }
    public function viewProfile()
    {
        $user       = Auth::user();
        

        $faculty        = $user->faculty;
        $faculties      = explode(',', $faculty);
        $program        = $user->program;
        $programs       = explode(';', $program);
        $semester       = $user->semester;
        $semesters      = explode(',', $semester);

        return view('editProfile', compact('viewProfile', 'user', 'faculties','programs','semesters'));
    }
    
    public function updateProfile(Request $request)
    {
        $user = Auth::user();   
        $this->validate($request, array(
            'name'          => 'required|max:100',
            'email'         => 'required|unique:users,email,'.$user->id,
            'nim'           => 'required|unique:users,nim,'.$user->id,
            'department'    => 'required',
            'faculties'     => 'required',
            'gda'           => 'required|min:1.75|max:4|numeric',
            'semesters'     => 'required',
            'programs'      => 'required',
            'telephon'      => ['required', new ValidPhone],
            'avatar'        => 'mimes:jpeg,jpg,png,gif|max:10000'
        ));

        if($request->file('avatar') != null){
            Storage::delete($user->avatar);
            $image  = $request->file('avatar')->store('avatar/students');
        } else{
            $image  = $user->avatar;
        }

        $faculty    = implode(",", $request->faculties);
        $program    = implode(";", $request->programs);
        $semester   = implode(",", $request->semesters);

        $user->update([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'nim'           => $request->input('nim'),
            'department'    => $request->input('department'),
            'faculty'       => $faculty,
            'gda'           => $request->input('gda'),
            'semester'      => $semester,
            'program'       => $program,
            'telephon'      => $request->input('telephon'),
            'avatar'        => $image,
        ]);
        session()->flash('success', 'Edit Profile Succesful!');
        return redirect()->back();
    }
    public function viewDescription($id)
    {
        // dd(haaa\);
        $scholarships   = scholarship::find($id);
        // dd($scholarships)
        // $requirements   = $scholarships->requirement;
        $requirements   = $scholarships->requirement;
        $comments   = $scholarships->comment;
        $tags    = Tag::all();
        // $array_require = json_decode(json_encode($requirements), True);
        // dd($scholarships->tags());
        return view('description', compact('scholarships', 'requirements', 'tags', 'comments'));
    }

    public function matchme()
    {
        $tags   = tag::all();
        $mytime = Carbon::now();
        $mytime = Carbon::parse($mytime);
        $mytime = $mytime->toDateString();
        $nama2 = '';
        $matchScholarships = array();
        $i = 0;
        $terakhir = requirement::all()->last()->id;
        // echo $terakhir;
        foreach (requirement::all() as $requirement) {
        $scholarships   = scholarship::find($requirement->getAttribute('id'));
        $requirements   = $scholarships->name;
        $deadline = $requirement->getAttribute('deadline');
        $a = strpos($requirement->getAttribute('program'), Auth::User()->program);
        $fakultas = strpos($requirement->getAttribute('faculty'), Auth::User()->faculty);
        $semester = strpos($requirement->getAttribute('semester'), Auth::User()->semester);
        // if($a == 0) {
        //     $a = 1;
        // }
        //echo $a;
        if(Carbon::parse($deadline)->gt($mytime) and Auth::User()->gda >= $requirement->getAttribute('gda') 
        and $a >= 1 and $fakultas >=1 and $semester >= 1) {
            //echo $requirement->getAttribute('id');
            $nama2 = $nama2 . $requirements;
            // echo $terakhir->getAttribute('id');
            if($requirement->getAttribute('id') != $terakhir) {
                $nama2 = $nama2 . ', ';
            }
            array_push($matchScholarships, $scholarships);
            //$listScholarship = scholarship::orderBy('id')->getAttribute('name');
            //echo $listScholarship;
            //   dd($nama2);
            }   
        }
        // dd($matchScholarships);
        $jumlah = 0;
        $jumlah = count($matchScholarships);
        session()->put('namaa', Auth::User()->name);
        session()->put('nama', $nama2);
        // dd($nama2);
        session()->put('flag', 2);
        // if($jumlah > 0){
        //     Auth::User()->notify(new TutorialPublished(Auth::User()));
        // }
        session()->flash('sukses', 'kami telah mengirimkan notifikasi beasiwa ke email anda');
        return view('matchme', compact('matchScholarships','tags', 'jumlah'));
        }
}