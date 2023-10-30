<?php

namespace App\Repositories\Eloquent;

use App\Repositories\CouponRepositoryInterface;
use App\Models\Coupon;

class CouponRepository extends RelationModelRepository implements CouponRepositoryInterface
{

    protected $querySearchTargets = [
        'discount_code',
        'name',
        'discount',
        'duration',
    ];

    public function getBlankModel()
    {
        return new Coupon();
    }
}
