<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Create By BK 03-06-19 
 */
class Userpriv extends Model
{
    protected $table = 'ref_userpriv';
    protected $primaryKey = 'userprivid';
    public $timestamps = false;

    protected $guarded = [];

    public function scopeOfUsername($query, $type)
    {
        return $query->where('username', $type);
    }

    public function scopeOfStsactive($query)
    {
        return $query->where('sts', 1);
    }

    public function scopeofJoinPrivmas($query)
    {
        return $query->join('ref_privmas', 'ref_userpriv.privmid', 'ref_privmas.privmid');
    }


    public function privmas()
    {
        return $this->belongsTo('App\Models\Privmas', 'privmid');
    }
}
