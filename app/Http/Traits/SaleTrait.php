<?php

namespace App\Http\Traits;

use App\Sale;
use App\SaleImage;
use Intervention\Image\Facades\Image;

trait SaleTrait
{
    protected function saleAnnounceValidate($request)
    {
        if( !empty($request) ) {
            $request->validate([
                'marka'     => 'required',
                'model'     => 'required',
                'title'     => 'required|string|min:3|max:72',
                'condition' => 'required',
                'price'     => 'required|numeric',
                'note'      => 'required|min:6|max:3000',
                'name'      => 'required|min:3|max:32',
                'phones'    => 'array|required',
                'phones.*'  => 'required|size:10',
                'images'    => 'array|required',
                'images.*'  => 'required|image|max:8000',
            ]);
        }
    }

    protected function saleAnnounceSave($request)
    {
            $sale = Sale::create([
                'user_id'   => auth()->check() ? auth()->user()->id : NULL,
                'marka'     => $request->marka,
                'model'     => $request->model,
                'title'     => $request->title,
                'condition' => $request->condition,
                'price'     => $request->price,
                'city'      => $request->city,
                'note'      => $request->note,
                'name'      => $request->name,
                'pin'       => $this->makePin(),
                'number'    => $this->makeNumber(),
            ]);

            if (isset($sale->id)) {
                $this->phonesSave($sale,$request);

                $this->imagesSave($request, $sale->id);
            }

            return $sale;
    }

    public function phonesSave($sale, $request)
    {
        if( is_array( $request->phones ) ) {
            foreach ( $request->phones as $phone) {
                $sale->phones()->create([
                    'number' => $phone ?? NULL
                ]);
            }
        }
        else {
            $sale->phone()->create([
                'number' => $request->phones
            ]);
        }
    }

    public function imagesSave($request, $sale_id)
    {
        if( $request->hasFile('images') ){
            $image_big = false;
            $image_small = false;
            $files = $request->images;
            $path = public_path('images/sale/');

            if( count($files) > 0 ){
                foreach ($files as $key => $file){
                    $image_big = $this->imageResizeSave($file, 'big_', $path, $key, $sale_id, 1200, 800);
                    $image_small = $this->imageResizeSave($file, 'small_', $path, $key, $sale_id, 150, 120);

                    if( $image_small && $image_big ){
                        $this->imageSaleMake($image_big, $sale_id);
                        $this->imageSaleMake($image_small, $sale_id);
                    }
                }
            }
        }

        return false;
    }

    public function imageSaleMake($image, $sale_id){
        SaleImage::create([
            'title'   => $image,
            'sale_id' => $sale_id,
        ]);
    }

    public function imageResizeSave($file, $prefix, $path, $name, $sale_id, $width, $height)
    {
        $extension = $file->getClientOriginalExtension();
        $new_name = $prefix . ((int)$name + 1) .'_'. $sale_id .'.'. $extension;

        if( is_dir($path) ){
            $img = Image::make($file);
            $img->resize($width, $height);
            $image_saved = $img->save( $path . $new_name);

            if( $image_saved ){
                return $new_name;
            }
        }

        return false;
    }

    public function responseData($new_sale)
    {
        if( $new_sale->number ){
            return response()->json([
                'marka'  => $new_sale->marka,
                'number' => $new_sale->number,
                'pin'    => $new_sale->pin,
            ],200);
        }
    }

    public function makePin()
    {
        return random_int(0,99) . random_int(0,99) . random_int(0,9) + $this->makeNumber();
    }

    public function makeNumber()
    {
        $number = Sale::all();

        if( $number->count() > 0 ){
            return (int)$number->count() + 1;
        }

        return 1;
    }
}
