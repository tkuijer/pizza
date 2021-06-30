<?php

namespace App\Repository\Interfaces;

use App\Models\Pizza;
use App\Http\Requests\StorePizzaRequest;

interface PizzaRepositoryInterface extends BaseRepositoryInterface
{
    public function createFromRequest(StorePizzaRequest $request) : Pizza;
}
