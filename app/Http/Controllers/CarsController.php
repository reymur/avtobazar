<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Car;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CarsController extends Controller
{
    public function getModels(Request $request)
    {
        $model = Car::with('types')->where('title', $request->name)->first();

        if( ! $model ) return abort(404);

        return view('pages.cars.models', compact('model'));
    }

    public function getModelType(Request $request)
    {
        $type = Type::with('parent')->where('title', $request->title)->first();

        if( ! $type ) return abort(404);

        return view('partials.model_type', compact('type'));
    }

    public function getJsonModelTypes(Request $request)
    {
        $marka = Car::where('name', $request->name)->first();

        $model = Type::where('parent_id', $marka->id)->get();

        if( ! $model ) {
            return response()->json([
                'errors' => 'Not founds'
            ], 404);
        }

        return response()->json([
            'types' => $model
        ]);
    }

    public function sendInfo(Request $request)
    {
        if( $request->image ){
            $created = $this->createWithImage($request);

            if( $created ){
                $imageName = $created->getImageName->image;
                $this->saveImage($request->image, $imageName);

                return response()->json([
                    'data' => $created->getImageName
                ],200);
            }
        }else{
            $this->createWithOutImage($request);
            return response()->json([
                'data' => 'created without image'
            ],200);
        }

        return response()->json([
            'errors' => 'Filed Announcement!'
        ], 404);
    }

    private function getNewImageName($file)
    {
        $image = $file;
        $time = time();
        $extension = $image->getClientOriginalExtension();
        $new_name = $time.'.'.$extension;

        return $new_name ?? false;
    }

    private function saveImage($image, $name)
    {
        Image::make( $image )
            ->resize(450, 400)
            ->save(
                public_path('/images/announcement/'.$name)
            );
    }

    private function createWithImage($request)
    {
        $created = Announcement::create([
            'user_id' => Auth::user()->id ?? null,
            'spare_parts' => $request->spare_parts,
            'marka' => $request->marka,
            'model' => $request->model,
            'year' => $request->year,
            'motor' => $request->motor,
            'store' => $request->store,
            'texpassport' => $request->texpassport,
            'city' => $request->city,
            'note' => $request->note,
            'image' => $this->getNewImageName( $request->image ),
        ]);

        return $created;
    }

    private function createWithOutImage($request)
    {
        $created = Announcement::create([
            'user_id' => Auth::user()->id ?? null,
            'spare_parts' => $request->spare_parts,
            'marka' => $request->marka,
            'model' => $request->model,
            'year' => $request->year,
            'motor' => $request->motor,
            'store' => $request->store,
            'texpassport' => $request->texpassport,
            'city' => $request->city,
            'note' => $request->note,
        ]);

        return $created;
    }
}
