<?php

namespace App\Http\Controllers\User;
use App\Post_Images;
use App\Post_Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
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

    public function store(Request $request)
    {
        if(Auth::user()->status == true){
            $post = [
                'title' => ['required', 'max:255'],
                'image' =>['required', 'image', 'max:1999'],
                'post_category_id' => 'required',
                'content' => 'required',
                'photos' => 'required|array',
                'photos.*' => ['required', 'image', 'max:1999']
            ];
            $request->validate($post);
            $imagePath = request('image')->store('uploads/post', 'public');
            $image = Image::make(public_path('storage/'.$imagePath))->fit(400, 238);
            $image->save();
            $id = Auth::user()->id;
            $slug = Str::slug($request->title) . '-' . $id . '-by';
        
            $post =  Auth::user()->posts()->create([
                'user_id' => $id,
                'title' => $request->title,
                'post_category_id' => $request->post_category_id,
                'content' => $request->content,
                'image' => $imagePath,
                'view_count' => 1,
                'slug' => $slug
            ]);
            foreach ($request->photos as $photo) {
                $filename = $photo->store('uploads/post', 'public');
                $photos = Image::make(public_path('storage/'.$filename))->fit(672, 414);
                $photos->save();
                Post_Images::create([
                    'post_id' => $post->id,
                    'filename' => $filename
                ]);
            }

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
