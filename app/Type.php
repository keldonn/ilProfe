<?php

namespace ilProfe;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $visible = array('name');

    public function posts()
    {
        return $this->hasMany('ilProfe\Post');
    }

}
