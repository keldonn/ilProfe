<?php

namespace ilProfe;

use Auth;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Post extends Model
{

    use Rateable;

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('level', 'description', 'price', 'free_trial', 'type_id');
    protected $visible = array('level', 'description', 'price', 'free_trial', 'type_id');

    protected $hidden = [
        'user_id'
    ];

    public function type()
    {
        return $this->belongsTo('ilProfe\Type');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
