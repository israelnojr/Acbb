<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_Category;
use App\Post_Location;
use App\Local_government;
use Illuminate\Http\Request;

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
        return view('admin.users.post.show', compact('post'));
    }
}
