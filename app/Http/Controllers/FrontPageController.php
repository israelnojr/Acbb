<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_Category;
use App\Post_Location;
use App\Local_government;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontPageController extends Controller
{
    public function welcome()
    {
        $categories = Post_Category::where('status', true)->inRandomOrder()->limit(4)->get();
        $posts = Post::where('status', false)->inRandomOrder()->limit(6)->get();
        $locations = Local_government::where('state_id', 4)->inRandomOrder()->limit(8)->get();
        return view('welcome', compact('posts', 'categories', 'locations'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $postKey = 'post'.$post->id;
        if(!Session::has($postKey)){
            $post->increment('view_count');
            Session::put($postKey);
        }
        $postCategory = Post::where('post_category_id', $post->post_category_id)->get();
        // dd($postCategory );
        return view('admin.users.post.show', compact('post','postCategory'));
    }
}