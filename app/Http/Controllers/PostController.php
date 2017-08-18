<?php

namespace ilProfe\Http\Controllers;
use ilProfe\User;
use ilProfe\Post;
use ilProfe\Type;
use ilProfe\GmapsController;
use ilProfe\Comment;
use Auth;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

class PostController extends Controller
{


  private $path = 'post';

  public function __construct()
  {
      $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index() {
    $posts = Post::orderBy('updated_at')->paginate(5);
    return view($this->path.'.index', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

  protected function create()
  {
    $types = Type::get();
    return view('post.create')->with('types', $types);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */

   protected function validator(array $data)
    {
       return Validator::make($data, [
         'level' => 'required',
         'description' => 'required|max:2048',
         'price' => 'required|numeric',
         'free_trial' => 'required',
         'type_id' => 'required',
       ]);
     }

  public function store(Request $request)
    {
      $this->validate($request, [
        'level' => 'required',
        'description' => 'required|max:2048',
        'price' => 'required|numeric',
        'type_id' => 'required',
      ], [
        "numeric" => "Esto debe ser un numero.",
        'required' => 'Debes completar este campo.',
        'max' => 'El texto es demasiado largo.',
      ]);

       $post = new Post;
       $post->level = $request['level'];
       $post->description = $request['description'];
       $post->price = $request['price'];
       $post->free_trial = 1;
       $post->type_id = $request['type_id'];
       $post->user_id = Auth::user()->id;
       $post->save();

    //   $post = Post::findOrFail($post->id);
    //   $user = Auth::user();
    //   $commentscount = count(Comment::where('post_id','=',$post->id)->get());
    //   return view($this->path.'.show', compact('post', 'user', 'commentscount'));
       return redirect('profile');
     }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

    $post = Post::findOrFail($id);
    $user = Auth::user();

    $homeurl = route('/');

    $icono = $homeurl . '/style/images/iconos/' . $post->type['name'] . '.png';
    $coor2[] = array('<b><img class="avatarmapa" src="'.$homeurl.'/uploads/avatars/'.$post->user['picture'].'"><div class="tituloavatar"><a href="'.$homeurl.'/post/'.$post->id.'/">'.$post->user['name'].'</a></b></div>'.$post->type['name'],$post->user['latitud'],$post->user['longitud'], $icono);

    $commentscount = count(Comment::where('post_id','=',$id)->get());
    return view($this->path.'.show', compact('post', 'user', 'commentscount', 'coor2'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $post = Post::findOrFail($id);
    $user = Auth::user();
    $types = Type::get();
    if ($post->user_id === $user->id || $user->is_admin === 1) {
    return view($this->path.'.edit', compact('post','types'));
    } else {
       return redirect('profile')->with('error','authorization');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(Request $request, $id)
   {
     $post = Post::findOrFail($id);
     $user = Auth::user();
     $post->level = $request->level;
     $post->description = $request->description;
     $post->price = $request->price;
     $post->free_trial = 1;
     $post->type_id = $request->type_id;
     $post->save();

     $homeurl = route('/');
     $icono = $homeurl . '/style/images/iconos/' . $post->type['name'] . '.png';
     $coor2[] = array('<b><img class="avatarmapa" src="'.$homeurl.'/uploads/avatars/'.$post->user['picture'].'"><div class="tituloavatar"><a href="'.$homeurl.'/post/'.$post->id.'/">'.$post->user['name'].'</a></b></div>'.$post->type['name'],$post->user['latitud'],$post->user['longitud'], $icono);

     $commentscount = count(Comment::where('post_id','=',$id)->get());
     return view($this->path.'.show', compact('post', 'user', 'commentscount', 'coor2'));
   }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $post = Post::findOrFail($id);
    $post->delete();
    return redirect()->route('profile');
  }

  public function home()
  {
    $posts = Post::orderBy('created_at', 'desc')->groupby('user_id')->distinct('user_id')->get();
    $types = Type::get();

      $inflemos = 38;
      $cantidadposts = count(Post::all()) + $inflemos;
      $cantidadalumnos = count(User::where('is_profe','=',0)->get()) + $inflemos;
      $cantidadprofes = count(User::where('is_profe','=',1)->get()) + $inflemos;
      $cantidadreviews = count(Comment::all()) + $inflemos - 15;
      $cantidadestilos = count(type::all());

    $homeurl = route('/');

    foreach ($posts as $post) {

            $icono = $homeurl . '/style/images/iconos/' . $post->type['name'] . '.png';
            $coor2[] = array('<b><img class="avatarmapa" src="'.$homeurl.'/uploads/avatars/'.$post->user['picture'].'"><div class="tituloavatar"><a href="'.$homeurl.'/post/'.$post->id.'/">'.$post->user['name'].'</a></b></div>'.$post->type['name'],$post->user['latitud'],$post->user['longitud'], $icono);
        };

    return view('layouts.home', compact('posts', 'types', 'coor2', 'cantidadposts','cantidadalumnos','cantidadprofes','cantidadestilos','cantidadreviews'));
  }

  public function contact()
  {
    $homeurl = route('/');
    $icono = $homeurl . '/style/images/iconos/digital.png';
    $coor2[] = array('<a href="https://www.digitalhouse.com/curso/desarrollo-web-fullstack/">Digital House - Proyecto Final</a>',-34.5499,-58.44375193119049, $icono);

    return view('layouts.contact', compact('coor2','icono'));
  }

}

  ?>
