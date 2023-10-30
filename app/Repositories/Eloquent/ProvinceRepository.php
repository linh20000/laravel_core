<?php

namespace App\Repositories\Eloquent;

use App\Repositories\ProvinceRepositoryInterface;
use App\Models\Province;

class ProvinceRepository extends RelationModelRepository implements ProvinceRepositoryInterface
{

    protected $querySearchTargets = [
        'province_code',
        'province_name',
        'province_code_im'
    ];

    public function getBlankModel()
    {
        return new Province();
    }
}
