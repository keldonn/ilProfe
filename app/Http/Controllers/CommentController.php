<?php

namespace ilProfe\Http\Controllers;

use ilProfe\Comment;
use ilProfe\Post;
use Auth;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

class CommentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $userid = Auth::user()->id;
    $postid = $request['post_id'];
    $commentedalready = Comment::where('post_id','=',$postid)->where('user_id','=',$userid)->get();

    if (!count($commentedalready)) {
      $comment = new Comment;
      $comment->stars = $request['stars'];
      $comment->text = $request['text'];
      $comment->post_id = $request['post_id'];
      $comment->user_id = $userid;

      $post = Post::find($comment->post_id);

      if ($request['stars'] != 0) {
        $rating = new Rating;
        $rating->rating = $comment->stars;
        $rating->user_id = $userid;
        $post->ratings()->save($rating);
      }
      $comment->save();
      return back();
    } else {
      return redirect()->route('post.show', ['error' => $postid]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
