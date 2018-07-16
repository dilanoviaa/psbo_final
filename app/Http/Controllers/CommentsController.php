<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use App\Comment;
use App\Scholarship;
use App\Tag;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        $user           = Auth::user();
        $scholarships   = scholarship::find($id); 
        $this->validate($request, array(
            'content'          => 'required|max:255',
        ));

        

        $comment            = new Comment();
        $comment->content   = $request->content;
        $comment->user_id   = $user->id;
        $comment->user_email= $user->email;
        $comment->name      = $user->name;

        $comment->scholarship()->associate($scholarships);
        $comment->save();       

        $comments           = $scholarships->comment;

        $requirements   = $scholarships->requirement;
        $tags    = Tag::all();



        // return view('description', compact('scholarships', 'requirements', 'tags', 'comments'));
        return redirect()->back();
    }

}
