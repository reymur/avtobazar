<?php

namespace App\Http\Controllers;

use App\Car;
use App\Type;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function getModel(Request $request)
    {
        $model = Car::with('types')->where('title', $request->name)->first();

        if( ! count($model) ) return abort(404);

        return view('pages.cars.models', compact('model'));
    }

    public function getModelTypes(Request $request)
    {
        $type = Type::with('parent')->where('title', $request->name)->first();

        if( ! count($type) ) return abort(404);

        return view('pages.cars.model_types', compact('type'));
    }

    public function getJsonModelTypes(Request $request)
    {
        $model = Type::where('parent_id', $request->id)->get();

        if( ! count($model) ) {
            return response()->json([
                'errors' => 'Not founds'
            ], 404);
        }

        return response()->json([
            'types' => $model
        ]);
    }
}
