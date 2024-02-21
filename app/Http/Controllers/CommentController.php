<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        // dump(request()->all());
        // dd(request()->all());
        

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', "Comment posted successfully!");
    }
}
