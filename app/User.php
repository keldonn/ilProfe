<?php
/*
namespace ilProfe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements Authenticatable
{
  use AuthenticableTrait;
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'is_profe', 'is_admin');
    protected $visible = array('is_profe', 'is_admin');
    protected $hidden = array('remember_token', 'timestamps');

}

*/

namespace ilProfe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_profe', 'bio', 'phone', 'location', 'picture', 'latitud', 'longitud', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('ilProfe\Post');
    }
}
