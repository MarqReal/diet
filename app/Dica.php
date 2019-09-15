<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dica extends Model
{
    public static function exibirDicas()
    {
    	return \Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
    }
}
