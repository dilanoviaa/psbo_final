<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Redirect;
use App\Tag;
use App\scholarship;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags       = tag::all();
        $tagEdit    = null;
        // $tagEdit['name'] = null;
        // $tagEdit    = array();
        // dd($tagEdit);

        return view('tags.index', compact('tags', 'tagEdit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
       
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('name'   =>  'required|max:191'));

        $tag        = new Tag;
        $tag->name  = $request->name;
        $tag->save();

        session()->flash('success', 'New Tag was successfully created!');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = tag::all();
        $tagEdit = Tag::find($id);
        // dd($tagEdit);
        return view('tags.index', compact('tagEdit', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateTag  = Tag::find($id);
        $updateTag->update([
            'name'  => $request->input('name'),
        ]);

        session()->flash('success', 'Tag was successfully edited!');
        
        return redirect()->route('tags.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag    = Tag::find($id);
        $tag->scholarships()->detach();
        $tag->delete();


        session()->flash('success', 'Delete Succesful!');
        return redirect()->route('tags.index');
    }

    public function test()
    {
        $tags   = Tag::all();
        return view('test', compact('tags'));
    }

    public function testview($id){
        $tag    = Tag::find($id);
        
        // $scholarships_list  = $scholarships->tags()->get();
        // dd($scholarships->tags());
        return view('testview', compact('tag'));

    }
}
