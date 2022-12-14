<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view("admin.posts.index",[
            'posts'=>Post::paginate(50)
        ]);
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit',['post'=>$post]);
    }
    public function update(Post $post)
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail'=>'image',
            'slug'=>['required', Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt'=> 'required',
            'body'=>'required',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);

        // dd('hello world');
        if (isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('public/thumbnails');
        }



        $post->update($attributes);

        return back()->with('success','Post Updated!');
    }
    public function delete(Post $post)
    {
        $post::findOrFail($post->id)->delete();

        return back();
    }
}
