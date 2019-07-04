<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Researchers
 * @package App\Models
 * @version June 29, 2019, 9:52 pm +07
 *
 * @property string rescode
 * @property string nameth
 * @property string nameen
 * @property integer cardid
 * @property string birthdate
 * @property string addr_psonth
 * @property string addr_psonen
 * @property string addr_offth
 * @property string addr_offen
 * @property string addr_msg_nameth
 * @property string addr_msg_nameen
 * @property string addr_msgth
 * @property string addr_msgen
 * @property string sexcode
 * @property string phoneno
 * @property string mbileno
 * @property string faxcode
 * @property string positionth
 * @property string positionen
 * @property string email_addr
 * @property string restype
 * @property string postcode
 * @property string|\Carbon\Carbon datetime_add
 * @property integer user_add
 * @property string|\Carbon\Carbon datetime_update
 * @property integer user_update
 * @property string|\Carbon\Carbon tsdatetime_update
 * @property integer tsuser_update
 * @property integer orgid
 * @property string orgname
 * @property string fag_allow
 */
class Researchers extends Model
{

    public $table = 'researcher';

    protected $primaryKey = 'userid';

    const CREATED_AT = 'datetime_add';
    const UPDATED_AT = 'datetime_update';

    public $fillable = [
        'rescode',
        'nameth',
        'nameen',
        'cardid',
        'birthdate',
        'addr_psonth',
        'addr_psonen',
        'addr_offth',
        'addr_offen',
        'addr_msg_nameth',
        'addr_msg_nameen',
        'addr_msgth',
        'addr_msgen',
        'sexcode',
        'phoneno',
        'mbileno',
        'faxcode',
        'positionth',
        'positionen',
        'email_addr',
        'restype',
        'postcode',
        'datetime_add',
        'user_add',
        'datetime_update',
        'user_update',
        'tsdatetime_update',
        'tsuser_update',
        'orgid',
        'orgname',
        'fag_allow',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'userid' => 'integer',
        'rescode' => 'string',
        'nameth' => 'string',
        'nameen' => 'string',
        'cardid' => 'integer',
        'birthdate' => 'date',
        'addr_psonth' => 'string',
        'addr_psonen' => 'string',
        'addr_offth' => 'string',
        'addr_offen' => 'string',
        'addr_msg_nameth' => 'string',
        'addr_msg_nameen' => 'string',
        'addr_msgth' => 'string',
        'addr_msgen' => 'string',
        'sexcode' => 'string',
        'phoneno' => 'string',
        'mbileno' => 'string',
        'faxcode' => 'string',
        'positionth' => 'string',
        'positionen' => 'string',
        'email_addr' => 'string',
        'restype' => 'string',
        'postcode' => 'string',
        'datetime_add' => 'datetime',
        'user_add' => 'integer',
        'datetime_update' => 'datetime',
        'user_update' => 'integer',
        'tsdatetime_update' => 'datetime',
        'tsuser_update' => 'integer',
        'orgid' => 'integer',
        'orgname' => 'string',
        'fag_allow' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'userid' => 'required',
        // 'rescode' => 'required',
        // 'nameth' => 'required',
        // 'addr_offth' => 'required',
        // 'addr_offen' => 'required',
        // 'postcode' => 'required',
        // 'datetime_add' => 'required',
        // 'user_add' => 'required',
        // 'datetime_update' => 'required',
        // 'user_update' => 'required',
        // 'tsdatetime_update' => 'required',
        // 'tsuser_update' => 'required',
    ];

}
