<?php

namespace App\Http\Controllers;

use App\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function getConditions()
    {
        $conditions = Condition::select('id','title')->limit(5)->get();

        if( $conditions->count() ){
            return response()->json([
                'conditions' => $conditions
            ], 200);
        }

        return response()->json([
            'errors' => null
        ], 404);
    }
}
