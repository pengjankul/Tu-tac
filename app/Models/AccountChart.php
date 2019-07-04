<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AccountCharts
 * @package App\Models
 * @version June 4, 2019, 7:33 pm +07
 *
 * @property integer grp_chartid
 * @property integer achart_parent_id
 * @property string chart_code
 * @property string nameth
 * @property string nameen
 * @property string chart_detail
 * @property string Type
 * @property string accnt_type
 * @property string chartchart_type
 * @property string|\Carbon\Carbon datetime_add
 * @property integer user_add
 * @property string|\Carbon\Carbon datetime_update
 * @property integer user_update
 * @property string fag_allow
 */
class AccountChart extends Model
{

    public $table = 'account_chart';

    protected $primaryKey = 'achart_id';

    const CREATED_AT = 'datetime_add';
    const UPDATED_AT = 'datetime_update';

    public $fillable = [
        'grp_chartid',
        'achart_parent_id',
        'chart_code',
        'nameth',
        'nameen',
        'chart_detail',
        'chartcate_type',
        'accnt_type',
        'chartchart_type',
        'chart_remark',
        'mapid',
        'chartyear',
        'datetime_add',
        'user_add',
        'datetime_update',
        'user_update',
        'fag_allow',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'achart_id' => 'integer',
        'grp_chartid' => 'integer',
        'achart_parent_id' => 'integer',
        'chart_code' => 'string',
        'nameth' => 'string',
        'nameen' => 'string',
        'chart_detail' => 'string',
        'chartcate_type' => 'string',
        'accnt_type' => 'string',
        'chartchart_type' => 'string',
        'chart_remark' => 'string',
        'mapid' => 'integer',
        'chartyear' => 'integer',
        'datetime_add' => 'datetime',
        'user_add' => 'integer',
        'datetime_update' => 'datetime',
        'user_update' => 'integer',
        'fag_allow' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'achart_parent_id' => 'required',
        // 'chart_code' => 'required',
        // 'datetime_add' => 'required',
        // 'user_add' => 'required',
        // 'datetime_update' => 'required',
        // 'user_update' => 'required',
    ];

    public function parent()
    {

        return $this->belongsTo('App\Models\AccountChart', 'achart_parent_id');

    }

}
