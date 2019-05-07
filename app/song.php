<?php

namespace Haiku;

use Illuminate\Database\Eloquent\Model;

class song extends Model
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
