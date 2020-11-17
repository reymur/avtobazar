<?php

namespace App\Http\Controllers\Api;

use App\Condition;
use App\FuelType;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetAttributesController extends Controller
{
    public function __construct(){
//        $this->middleware('api');
    }

    public function getAnnounceSenderUser(Request $request){
        if( $request->has('announcement_user_id') ) {
            $sender = User::find( $request->announcement_user_id );

            if ( $sender ) {
                return response()->json([
                    'sender' => $sender,
                ], 200);
            }

            return response()->json([
                'errors' => $sender,
            ], 404);
        }
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

            return response()->json([
                'errors' => [
                    'fuel_type' => $fuels,
                    'condition' => $condition
                ],
            ], 404);
        }
    }
}
