<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleMake(Request $request)
    {
        return view('announcements.announce_sale_make');
    }

    public function saleAnnounceMake(Request $request)
    {
//        dd( $request->images[0]->getClientOriginalName() );
        $request->validate([
            'marka' => 'required',
            'model' => 'required',
            'title' => 'required|string|min:3|max:32',
            'condition' => 'required',
            'price' => 'required|numeric',
            'note' => 'required|min:6|max:1000',
            'name' => 'required|min:3|max:32',
            'phone' => 'required|numeric|min:10|max:10',
            'images' => 'array|required',
            'images.*' => 'required|image|max:1000',
        ]);
    }
}
