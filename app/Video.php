<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Video extends Model
{
    public function playlist()
    {
        return $this->belongsTo('App\Playlist');
    }

    public function getEmbed()
    {
        $embed = Embed::make($this->url)->parseUrl();

        if (!$embed)
            return '';

        //dd($embed->getHtml());

        return $embed->getHtml();
    }
}
