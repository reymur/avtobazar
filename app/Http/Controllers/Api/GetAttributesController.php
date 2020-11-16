<?php

namespace App\Http\Controllers\Api;

use App\Condition;
use App\FuelType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetAttributesController extends Controller
{
    public function __construct(){
//        $this->middleware('api');
    }

    public function getFuelType(Request $request)
    {
        if( $request->has('fuel') && $request->has('condition') ) {
            $fuels = FuelType::find( $request->fuel );
            $condition = Condition::find( $request->condition );

            if ( $fuels->title && $condition->title ) {
                return response()->json([
                    'fuel_type' => $fuels->title,
                    'condition' => $condition->title,
                ], 200);
            }
        }
    }
}
