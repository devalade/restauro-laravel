<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Database\Eloquent\Builder;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::query();
        if(request()->query('restaurant_id')){
            $tables->whereHas('created_by', function (Builder $builder) {
                $builder->whereHas('restaurant', function (Builder $builder) {
                    $builder->whereHas('id', request()->query('restaurant_id'));
                });
            });
        }

        return response()->json([ 'data' => $tables->with('statut_table')->get() ]);
    }
}
