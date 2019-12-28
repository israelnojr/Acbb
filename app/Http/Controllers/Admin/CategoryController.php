<?php

namespace App\Http\Controllers\Admin;

use App\Post_Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    
    public function index()
    {
        if(Auth::user()->status == true){
            $categories = Post_Category::all();
            return view('admin.category.index', compact('categories'));
        }
    }

    public function myCategory()
    {
        if(Auth::user()->status == true){
            $id = Auth::user()->id;
            $categories = Post_Category::where('user_id', $id)->get();
            return view('admin.category.mycategory', compact('categories'));
        }
    }

    public function create()
    { 
        if(Auth::user()->status == true){
            return view('admin.category.create');
        }
    }
  
    public function store(Request $request)
    {
        if(Auth::user()->status == true){
            $category = [
                'name' => ['required', 'max:100'],
                'image' =>['required', 'image', 'max:1999'],
            ];
            $request->validate( $category);
            $imagePath = request('image')->store('uploads/category', 'public');
            $image = Image::make(public_path('storage/'.$imagePath))->fit(400, 238);
            $image->save();
            $id = Auth::user()->id;
            $slug = Str::slug($request->name) . '-' . $id . '-by';
        
             $category =  Auth::user()->posts()->create([
                'user_id' => $id,
                'name' => $request->name,
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
     
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function status(Post_Category $post_category, $id)
    {
        $category = Post_Category::find($id);
        if($category->status == true){
            $category->update(['status' => false]);
            $category->save();
            return redirect()->back()->with('success', 'You\'ve Successfully Updated Category Status');
        }
        else
        {
            $category->status = false;
            $category->update(['status' => true]);
            $category->save();
            return redirect()->back()->with('success', 'You\'ve Successfully Updated Category Status');
        }
    }
}
