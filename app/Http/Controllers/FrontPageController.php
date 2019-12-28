<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_Images;
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

    public function PostByCategory($slug)
    {
        $category = Post_Category::where('slug', $slug)->first();
        $posts = Post::where('post_category_id', $category->id)->inRandomOrder()->get();
        return view('admin.users.category.allpostsbycategory', compact('posts'));
    }

    public function allPosts()
    {
        $posts = Post::where('status', false)->inRandomOrder()->get();
        return view('admin.users.post.allposts', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $postKey = 'post'.$post->id;
        if(!Session::has($postKey)){
            $post->increment('view_count');
            Session::put($postKey);
        }
        $photos = Post_Images::where('post_id', $post->id)->get();
        $postCategory = Post::where('post_category_id', $post->post_category_id)->get();
        return view('admin.users.post.show', compact('post','postCategory','photos'));
    }
}
