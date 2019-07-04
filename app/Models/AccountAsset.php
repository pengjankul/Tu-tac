<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccountAsset
 * @package App\Models
 * @version July 2, 2019, 11:09 am +07
 *
 * @property string save_status
 * @property string asset_type
 * @property string asset_code
 * @property string nameth
 * @property string nameen
 * @property string asset_detail
 * @property string asset_unit
 * @property float asset_price
 * @property string buydate
 * @property string base_depreciation
 * @property string depreciation_method
 * @property float brate_dprct_per
 * @property float dprct_charge
 * @property float drate_per
 * @property float cprice
 * @property string parent_asset_code
 * @property string start_charge
 * @property string date_dprct
 * @property integer lifetime_year
 * @property string dstatus
 * @property string asset_acccnt_code
 * @property string dprct_acccnt_code
 * @property string acccnt_acode
 * @property string serialno
 * @property string assets_note
 * @property string store_code
 * @property string store_note
 * @property string|\Carbon\Carbon datetime_add
 * @property integer user_add
 * @property string|\Carbon\Carbon datetime_update
 * @property integer user_update
 * @property string|\Carbon\Carbon tsdatetime_update
 * @property integer tsuser_update
 * @property string fag_allow
 */
class AccountAsset extends Model
{
    //use SoftDeletes;

    public $table = 'account_asset';

    protected $primaryKey = 'assetsid';
    
    const CREATED_AT = 'datetime_add';
    const UPDATED_AT = 'datetime_update';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'save_status',
        'asset_type',
        'asset_code',
        'nameth',
        'nameen',
        'asset_detail',
        'asset_unit',
        'asset_price',
        'buydate',
        'base_depreciation',
        'depreciation_method',
        'brate_dprct_per',
        'dprct_charge',
        'drate_per',
        'cprice',
        'parent_asset_code',
        'start_charge',
        'date_dprct',
        'lifetime_year',
        'dstatus',
        'asset_acccnt_code',
        'dprct_acccnt_code',
        'acccnt_acode',
        'serialno',
        'assets_note',
        'store_code',
        'store_note',
        'datetime_add',
        'user_add',
        'datetime_update',
        'user_update',
        'tsdatetime_update',
        'tsuser_update',
        'fag_allow'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'assetid' => 'integer',
        'save_status' => 'string',
        'asset_type' => 'string',
        'asset_code' => 'string',
        'nameth' => 'string',
        'nameen' => 'string',
        'asset_detail' => 'string',
        'asset_unit' => 'string',
        'asset_price' => 'float',
        'buydate' => 'date',
        'base_depreciation' => 'string',
        'depreciation_method' => 'string',
        'brate_dprct_per' => 'float',
        'dprct_charge' => 'float',
        'drate_per' => 'float',
        'cprice' => 'float',
        'parent_asset_code' => 'string',
        'start_charge' => 'string',
        'date_dprct' => 'date',
        'lifetime_year' => 'integer',
        'dstatus' => 'string',
        'asset_acccnt_code' => 'string',
        'dprct_acccnt_code' => 'string',
        'acccnt_acode' => 'string',
        'serialno' => 'string',
        'assets_note' => 'string',
        'store_code' => 'string',
        'store_note' => 'string',
        'datetime_add' => 'datetime',
        'user_add' => 'integer',
        'datetime_update' => 'datetime',
        'user_update' => 'integer',
        'tsdatetime_update' => 'datetime',
        'tsuser_update' => 'integer',
        'fag_allow' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        /*
        'assetid' => 'required',
        'asset_code' => 'required',
        'nameth' => 'required',
        'asset_acccnt_code' => 'required',
        'datetime_add' => 'required',
        'user_add' => 'required'
        */
    ];

    
}
