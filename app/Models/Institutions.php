<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Institutions
 * @package App\Models
 * @version June 29, 2019, 10:02 pm +07
 *
 * @property string instcode
 * @property string nameth
 * @property string nameen
 * @property string addr_psonth
 * @property string addr_psonen
 * @property string addr_msg_name_th
 * @property string addr_msg_th
 * @property string taxcode
 * @property string addr
 * @property string telno
 * @property string fax_addr
 * @property string email_addr
 * @property string website_addr
 * @property string departtype
 * @property string depart_lv_second
 * @property string depart_lv_third
 * @property string depart_lv_fourth
 * @property string|\Carbon\Carbon datetime_add
 * @property integer user_add
 * @property string|\Carbon\Carbon datetime_update
 * @property integer user_update
 * @property string|\Carbon\Carbon tsdatetime_update
 * @property integer tsuser_update
 * @property string fag_status
 * @property string fag_allow
 */
class Institutions extends Model
{

    public $table = 'institution';

    protected $primaryKey = 'instid';

    const CREATED_AT = 'datetime_add';
    const UPDATED_AT = 'datetime_update';

    public $fillable = [
        'instcode',
        'nameth',
        'nameen',
        'addr_psonth',
        'addr_psonen',
        'addr_msg_name_th',
        'addr_msg_th',
        'taxcode',
        'addr',
        'telno',
        'fax_addr',
        'email_addr',
        'website_addr',
        'departtype',
        'depart_lv_second',
        'depart_lv_third',
        'depart_lv_fourth',
        'datetime_add',
        'user_add',
        'datetime_update',
        'user_update',
        'tsdatetime_update',
        'tsuser_update',
        'fag_status',
        'fag_allow',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'instid' => 'integer',
        'instcode' => 'string',
        'nameth' => 'string',
        'nameen' => 'string',
        'addr_psonth' => 'string',
        'addr_psonen' => 'string',
        'addr_msg_name_th' => 'string',
        'addr_msg_th' => 'string',
        'taxcode' => 'string',
        'addr' => 'string',
        'telno' => 'string',
        'fax_addr' => 'string',
        'email_addr' => 'string',
        'website_addr' => 'string',
        'departtype' => 'string',
        'depart_lv_second' => 'string',
        'depart_lv_third' => 'string',
        'depart_lv_fourth' => 'string',
        'datetime_add' => 'datetime',
        'user_add' => 'integer',
        'datetime_update' => 'datetime',
        'user_update' => 'integer',
        'tsdatetime_update' => 'datetime',
        'tsuser_update' => 'integer',
        'fag_status' => 'string',
        'fag_allow' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'instid' => 'required',
        // 'instcode' => 'required',
        // 'nameth' => 'required',
        // 'departtype' => 'required',
        // 'datetime_add' => 'required',
        // 'user_add' => 'required',
        // 'datetime_update' => 'required',
        // 'user_update' => 'required',
        // 'tsdatetime_update' => 'required',
        // 'tsuser_update' => 'required',
    ];

}
