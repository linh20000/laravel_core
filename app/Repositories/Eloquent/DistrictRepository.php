<?php

namespace App\Repositories\Eloquent;

use App\Repositories\DistrictRepositoryInterface;
use App\Models\District;

class DistrictRepository extends RelationModelRepository implements DistrictRepositoryInterface
{

    protected $querySearchTargets = [
        'pay_area_code',
        'parent_code',
        'name',
        'full_name'
    ];

    public function getBlankModel()
    {
        return new District();
    }
}
