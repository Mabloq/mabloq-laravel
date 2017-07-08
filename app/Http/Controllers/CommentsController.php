<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Session;

use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __contruct() {
		$this->middleware('auth', ['except' => 'store']);
	}
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
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
			'name' => 'required|max:255',
			'email' => 'required|max:255',
			'comment' => 'required|min:5|max:2000'
		));
		$post = Post::find($post_id);
		$comment = new Comment();

		$comment->name = $request->name;
		$comment->email = $request->email;
		$comment->comment = $request->comment;
		$comment->approved = true;
		$comment->post()->associate($post);

		$comment->save();

		Session::flash('success', 'Your comment has been posted');

		return redirect()->route('blog.single', [ 'id' => $post->slug]);


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

		return view('comments.edit')->withComment($comment);
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
        $comment = Comment::find($id);

	$this->validate($request, array('comment' => 'required|min:5'));

	$comment->comment = $request->comment;

	$comment->save();

	Session::flash('success', 'Comment updated');

	return redirect()->route('posts.show', $comment->post->id);
    }


	public function delete($id)
    {
        //sends user to delete page
		$comment = Comment::find($id);
		return view('comments.delete')->withComment($comment);
    }


    public function destroy($id)
    {
        $comment = Comment::find($id);
		$post_id = $comment->post->id;
		$comment->delete();

		Session::flash('Success', 'Comment was deleted');

		return redirect()->route('posts.show', $post_id);
    }
}
