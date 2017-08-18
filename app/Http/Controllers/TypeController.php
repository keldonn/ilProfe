<?php

namespace ilProfe\Http\Controllers;
use ilProfe\User;
use ilProfe\Post;
use ilProfe\Type;
use ilProfe\Comment;
use Auth;

class TypeController extends Controller
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
  public function store()
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $type = Type::findOrFail($id);
      $posts = Post::orderBy('created_at', 'desc')->where('type_id','=',$id)->groupby('user_id')->distinct('user_id')->paginate(3);
  /*
      $inflemos = 99;
      $cantidadposts = count(Post::all()) + $inflemos;
      $cantidadalumnos = count(User::where('is_profe','=',0)->get()) + $inflemos;
      $cantidadprofes = count(User::where('is_profe','=',1)->get()) + $inflemos;
      $cantidadreviews = count(Comment::all()) + $inflemos;
      $cantidadestilos = count(type::all());
  */
      $homeurl = route('/');
      $posts2 = Post::where('type_id','=',$id)->groupby('user_id')->distinct('user_id')->get();
      $icono = $homeurl . '/style/images/iconos/' . $type->name . '.png';

      foreach ($posts2 as $post) {
              $coor2[] = array('<b><img class="avatarmapa" src="'.$homeurl.'/uploads/avatars/'.$post->user['picture'].'"><div class="tituloavatar"><a href="'.$homeurl.'/post/'.$post->id.'/">'.$post->user['name'].'</a></b></div>'.$post->type['name'],$post->user['latitud'],$post->user['longitud']);
          };

      return View('type.show')->with('posts', $posts)->with('type', $type)->with('coor2', $coor2)->with('icono', $icono);
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
