<?php

namespace ilProfe\Http\Controllers;
use ilProfe\User;
use ilProfe\Post;
use ilProfe\GmapsController;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Image;

class UserController extends Controller
{
  private $path = 'user';

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $data = User::all();
    return view($this->path.'.index', compact('data'));
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
    $userid = User::findOrFail($id);
    $user = Auth::user();
    $posts = Post::where('user_id','=',$user->id)->get();
    return view($this->path.'.profile', compact('user', 'posts'));
  }


  public function showprofe($id)
  {
    $profe = User::findOrFail($id);
    $is_profe = User::where('id','=',$id)->where('is_profe','=',1)->get();
    $userlogged = Auth::user();
    if (count($is_profe)) {
    return view($this->path.'.showprofe', compact('profe'));
    } else {
    return redirect()->route($this->path.'.show', [$userlogged->id]);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    $userlogged = Auth::user();

    //configuaración del mapa
    $config = array();
    $config['center'] = $userlogged['latitud'] . ', ' . $userlogged['longitud'];
    $config['map_width'] = 370;
    $config['map_height'] = 260;

    $config['onclick'] = '{
      createMarker_map({ map: map, position:event.latLng });
      document.getElementById(\'latitud\').value = event.latLng.lat();
      document.getElementById(\'longitud\').value = event.latLng.lng();
      }';
    $config['zoom'] = 10;

    \Gmaps::initialize($config);

    // Colocar el marcador
    // Una vez se conozca la posición del usuario
    $marker = array();
    \Gmaps::add_marker($marker);

    $map = \Gmaps::create_map();

    if ($user->id === $userlogged->id || $userlogged->is_admin === 1) {
    return view($this->path.'.edit', compact('user','map'));
    } else {
    return redirect()->route($this->path.'.profile', [$userlogged->id]);
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

    $this->validate($request, [
        'name' => 'required|string|max:200',
        'bio' => 'max:140',
        'latitud' => 'required',
        'longitud' => 'required',
        'phone' => 'max:40',
        'password' => 'confirmed',
    ], [
      'required' => 'Este campo no puede quedar vacío.',
      'confirmed' => 'Las contraseñas deben coincidir.',
      'max' => 'Demasiado largo.',
      'min' => 'Se necesitan al menos 6 caracteres.',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $user->email;
    $user->password = !empty($request->password) && $request->password == $request->password_confirmation ? bcrypt($request->password) : $user->password;
    $user->is_profe = $request->is_profe;
    $user->bio = $request->bio;
    $user->latitud = $request->latitud;
    $user->longitud = $request->longitud;
    $user->phone = $request->phone;
    $user->save();

    $posts = Post::where('user_id','=',$user->id)->get();

    return View('user.profile')->with('posts', $posts)->with('user', Auth::user());
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

  public function profile()
  {
    $user = Auth::user();
    $posts = Post::where('user_id','=',$user->id)->get();
    return view($this->path.'.profile', compact('user', 'posts'));
  }


  public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
        $path = public_path('uploads/avatars/' . $filename);
    		Image::make($avatar)->save($path);

    		$user = Auth::user();
    		$user->picture = $filename;
    		$user->save();
    	}

      $posts = Post::where('user_id','=',$user->id)->get();
      return view($this->path.'.profile', compact('user', 'posts'));
    }


}

?>
