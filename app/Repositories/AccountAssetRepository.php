<?php

namespace App\Repositories;

use App\Models\AccountAsset;
use App\Repositories\BaseRepository;

/**
 * Class AccountAssetRepository
 * @package App\Repositories
 * @version July 2, 2019, 11:09 am +07
*/

class AccountAssetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountAsset::class;
    }
}
