<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privlist extends Model
{
    protected $table = 'ref_privlist';
    protected $primaryKey = 'privmid';
    public $timestamps = false;
    protected $guarded = [];

    public function privmas()
    {
        return belongsTo('App\Models\Privmas', 'privmid');
    }

    public function menus()
    {
        return belongsTo('App\Models\Menus', 'menuid');
    }
}
