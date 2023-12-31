<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store (Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
         ]);

         if($validator->fails()){
             return back()->with('status','Something wrong!');
         }else{

            
         Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
         ]);

         return  redirect(route('posts.all'))->with('status','Post created successfully');

         }




    }

    public function show($postId){
        $post = Post::findOrFail($postId);
        return view('posts.show',compact('post'));
    }

    public function edit($postId){
        $post = Post::findOrFail($postId);
       
        return view('posts.edit', compact('post'));
    }

    public function update ($postId, Request $request){
        Post::findOrFail($postId)->update($request->all());

        return redirect(route('posts.all'))->with('status','Post updated successfully');
    }

    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));

    }
}
