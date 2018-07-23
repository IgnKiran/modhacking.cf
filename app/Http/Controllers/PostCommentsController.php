<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all();
        return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//        $user = Auth::user();
//        $data = [
//            'post_id' => $request->post_id,
//            'author' => $user->name,
//            'email' => $user->email,
//            'photo' => $user->photo->file,
//            'body' => $request->body
//
//        ];
//
//        Comment::create($data);
//        $request->session()->flash('comment_message', 'Your comment has been submitted and is waiting for moderation.');
//        return redirect()->back();
//    }

    //duplicate function for commenting - since, problem with not being able to comment through non admin users
    public function createComment(Request $request){
        //
        $user = Auth::user();
        $data = [
            'post_id' => $request->post_id,
            'author' => $user->name,
            'email' => $user->email,
            'photo' => $user->photo->file,
            'body' => $request->body

        ];

        Comment::create($data);
        $request->session()->flash('comment_message', 'Your comment has been submitted and is waiting for moderation.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show',compact('comments','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Comment::findOrFail($id)->update($request->all());
//        return redirect('/admin/comments');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Comment::findOrFail($id)->delete();
        return redirect()->back();

    }

    // same functionality as blog 'post' page located at root of views. this function provides view for showing comment with active replies
//    public function comment($id){
//        $comment = Comment::findOrFail($id);
//        $replies = $comment->replies()->where('is_active', '1')->get();
//        return view('comment', compact('comment','replies'));
//    }
}
