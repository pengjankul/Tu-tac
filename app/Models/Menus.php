<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'ref_menu';
    protected $primaryKey = 'menuid';
    public $timestamps = false;
    protected $guarded = [];

    public function privlist()
    {
        return $this->hasMany('App\Models\Privlist', 'menuid');
    }

    public function submenus()
    {
        return $this->hasMany('App\Models\Submenus', 'menuid');
    }

    public function scopeofSts($qurey)
    {
        return $qurey->where('sts', 1);
    }
}
