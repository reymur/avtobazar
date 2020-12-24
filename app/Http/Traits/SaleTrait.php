<?php

namespace App\Http\Traits;

use App\Sale;

trait SaleTrait
{
    protected function saleAnnounceValidate($request)
    {
        if( !empty($request) ) {
            $request->validate([
                'marka' => 'required',
                'model' => 'required',
                'title' => 'required|string|min:3|max:32',
                'condition' => 'required',
                'price' => 'required|numeric',
                'note' => 'required|min:6|max:3000',
                'name' => 'required|min:3|max:32',
                'phone' => 'required|min:10|max:10',
                'images' => 'array|required',
                'images.*' => 'required|image|max:8000',
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

        if( isset($sale->id) ){
            $sale->phone()->create([
                'number' => $request->phone
            ]);
        }

        return $sale;
    }

    public function responseData($new_sale)
    {
        if( $new_sale->number ){
            return response()->json([
                'number' => $new_sale->number,
                'pin' => $new_sale->pin
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
        return $number->count() > 0 ? $number->count() + 1 : 1;
    }
}
