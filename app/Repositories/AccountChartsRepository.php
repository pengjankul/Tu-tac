<?php

namespace App\Repositories;

use App\Models\AccountChart;
use App\Repositories\BaseRepository;

/**
 * Class AccountChartsRepository
 * @package App\Repositories
 * @version June 4, 2019, 7:33 pm +07
 */

class AccountChartsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return AccountChart::class;
    }

    public function getTree()
    {
        $data = [];
        $charts = AccountChart::All();
        $data['total'] = count($charts);

        foreach ($charts as $key => $value) {
            $data['rows'][$key]['id'] = $value->achart_id;
            $data['rows'][$key]['budget'] = $value->nameth;
            $data['rows'][$key]['name'] = $value->chart_code;
            $data['rows'][$key]['iconCls'] = 'treenode-no-icon';

            $data['rows'][$key]['_parentId'] = ($value->achart_parent_id == null) ? null : $value->achart_parent_id;

        }
        // $data['name'] = "iconCls";
        // $data['type'] = "string";
        // $data['defaultValue'] = "treenode-no-icon";

        return $data;
    }
}
