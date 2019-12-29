<?php

namespace App\Http\Controllers\User;

use App\Post;
use App\Post_Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Post $post, $id)
    {
        if(Auth::user()->status == true){
            $post = Post::where('id', $id)->first();
            return view('admin.users.comment.create', compact('post'));
        }
        else{
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
    }
    public function store(Post $post, $id, Request $request)
    {
        if(Auth::user()->status == true){
            $post = Post::where('id', $id)->first();
            $comment = [
                'comment' => ['required'],
            ];
                $request->validate($comment);
        
                $id = Auth::user()->id;
                $comment = Post_Comment::create([
                    'user_id' => $id,
                    'post_id' => $post->id,
                    'comment' => $request->comment,
                ]);
            return redirect()->route('show.post', $post->slug)->with('success', 'Sucessfully Commented');
        }
        else{
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
    }
}
