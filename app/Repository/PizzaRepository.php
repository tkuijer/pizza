<?php

namespace App\Repository;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Requests\StorePizzaRequest;
use App\Repository\Interfaces\PizzaRepositoryInterface;

class PizzaRepository extends BaseRepository implements PizzaRepositoryInterface
{
    public function __construct(Pizza $model)
    {
        parent::__construct($model);
    }

    /**
     * @param Request $request
     * @return Pizza
     */
    public function createFromRequest(StorePizzaRequest $request): Pizza
    {
        $pizza = new $this->model;

        $pizza->name = $request->get('name');

        $pizza->save();

        return $pizza;
    }
}
