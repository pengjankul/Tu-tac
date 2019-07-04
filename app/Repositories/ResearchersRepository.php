<?php

namespace App\Repositories;

use App\Models\Researchers;
use App\Repositories\BaseRepository;

/**
 * Class ResearchersRepository
 * @package App\Repositories
 * @version June 29, 2019, 9:52 pm +07
*/

class ResearchersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Researchers::class;
    }
}
