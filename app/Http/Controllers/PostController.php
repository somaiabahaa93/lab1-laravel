<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function index ()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'],
            ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Ebrahim', 'created_at' => '2021-04-15'],
            ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ramy', 'created_at' => '2021-06-01'],
        ];
        return view('posts.index',['posts'=>$allPosts]);
    }


    public function show ($postID)
    {
 $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ali', 'created_at' => '2021-03-20','email'=>'Ali@gmail.com'];

 return view('posts.show',['post'=>$post]);

    }


public function create ()
{
    return view ('posts.create');
}

public function store ()
{
    return redirect()->route('posts.index');

}
public function edit ($postId)
{

    $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ali'];

 return view('posts.edit',['post'=>$post]);

}
public function update ($POSTID)
{
    
    return redirect()->route('posts.index');

}

}