<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submenus extends Model
{
    protected $table = 'ref_submenu';
    protected $primaryKey = 'submenuid';
    public $timestamps = false;
    protected $guarded = [];

    public function menus()
    {
        return $this->belongsTo('App\Models\Menus', 'menuid');
    }

    public function thirdsubmenu()
    {
        return $this->hasMany('App\Models\Thirdsubmenus', 'submenuid');
    }
}
