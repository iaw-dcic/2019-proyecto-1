<?php

namespace Haiku;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

      //
        /**
     * The table associated with the model.
     *
     * @var string
     */

    
    protected $table = 'songs';
}
