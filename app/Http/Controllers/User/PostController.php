<?php

namespace App\Http\Controllers\User;
use App\Post_Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost()
    {
        if(Auth::user()->status == true){
            $categories = Post_Category::where('status', true)->get();
            return view('admin.post.create', compact('categories'));
        }
        else{
            return redirect()->back()->with('warning', 'Account is either disabled, ban or inactive., You\'re not allowed to perform this action');
        }
    }

    public function store()
    {
        if(Auth::user()->status == true){
            $post = request()->validate([
                'title' => ['required', 'max:255'],
                'image' => ['required', 'image'],
                'post_category_id' => 'required',
                'content' => 'required',
            ]);

            $imagePath = request('image')->store('uploads/post', 'public');
            $id = Auth::user()->id;

            $slug = Str::slug($post['title']) . '-' . $id . '-by';
        
            Auth::user()->posts()->create([
                'user_id' => $id,
                'title' => $post['title'],
                'post_category_id' => $post['post_category_id'],
                'content' => $post['content'],
                'image' => $imagePath,
                'view_count' => 1,
                'slug' => $slug
            ]);
            return redirect()->back()->with('success', 'Post Successfully Created');
        }
        else{
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
    }

    public function update( Request $request )
    {
        // dd($request->all());
    }
}
