<?php

namespace ilProfe;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model 
{

    protected $table = 'password_resets';
    public $timestamps = false;
    protected $fillable = array('email', 'token');
    protected $hidden = array('created_at');

}