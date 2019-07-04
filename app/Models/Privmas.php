<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privmas extends Model
{
    protected $table = 'ref_privmas';
    protected $primaryKey = 'privmid';
    public $timestamps = false;

    // protected $fillable = [
    //     'PRIVMSORT', 'NAMEEN', 'NAMETH',
    //     'ENTUSER', 'ENTHOST', 'ENTDATE', 'MODUSER', 'MODHOST', 'MODDATE', 'STS',
    // ];
    protected $guarded = [];

    public function scopeSts($query)
    {
        return $query->where('STS', 1);
    }

    public function userpriv()
    {
        return $this->hasMany('App\Models\Userpriv', 'userprivid');
    }

    public function privlist()
    {
        return $this->hasMany('App\Models\Privlist', 'privmid');
    }
}
