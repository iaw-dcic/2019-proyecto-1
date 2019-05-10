<?php

namespace Haiku;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
        /**
     * The table associated with the model.
     *
     * @var string
     */

    
    protected $table = 'albums';

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

}
