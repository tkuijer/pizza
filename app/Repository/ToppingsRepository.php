<?php

namespace App\Repository;

use App\Models\Topping;
use App\Repository\Interfaces\ToppingsRepositoryInterface;

class ToppingsRepository extends BaseRepository implements ToppingsRepositoryInterface
{

    public function __construct(Topping $model)
    {
        parent::__construct($model);
    }

}
