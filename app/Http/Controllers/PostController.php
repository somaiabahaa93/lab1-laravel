<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
use App\Models\Post;
use  App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;




class postController extends Controller
{
    public function index ()
    {
        // $allPosts = [
        //     ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'],
        //     ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Ebrahim', 'created_at' => '2021-04-15'],
        //     ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ramy', 'created_at' => '2021-06-01'],
        // ];
        $allPosts=Post::paginate(50);
        return view('posts.index',['posts'=>$allPosts]);
    }


    public function show ($postId)
    {
//  $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ali', 'created_at' => '2021-03-20','email'=>'Ali@gmail.com'];
$post= Post::find($postId);
 return view('posts.show',['post'=>$post]);

    }


public function create ()
{
    return view ('posts.create',['users'=>User::all()]);
    
}

public function store (StorePostRequest $request)
{
    $reqData=$request->all();
    Post::create($reqData);
    return redirect()->route('posts.index');
    

}
public function edit ( $postId)
{

    // $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ali'];
    $post= Post::find($postId);
    // dd($post);
 return view('posts.edit',['post'=>$post,'users'=>User::all()]);

}
public function update (UpdatePostRequest $request ,$postId)
 {   
    //   $reqData= $request->all();
    
    $post = Post::findorfail($postId);
    
      $post->update([
          'title'=>$request['title'],
          'description'=>$request['description'],
          'user_id'=>$request['user_id']
      ]);

    // Post::update(['title'=>$request['title'],'description'=>$request['description']]);
    return redirect()->route('posts.index');
    // return redirect()->route('posts.index');

}
public function destroy($postId)
{
    $post = Post::findorfail($postId);
    $post->delete();
    return redirect()->route('posts.index');

}

}