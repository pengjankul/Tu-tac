<?php

namespace App\Repositories;

use App\Models\Institutions;
use App\Repositories\BaseRepository;

/**
 * Class InstitutionsRepository
 * @package App\Repositories
 * @version June 29, 2019, 10:02 pm +07
*/

class InstitutionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Institutions::class;
    }
}
