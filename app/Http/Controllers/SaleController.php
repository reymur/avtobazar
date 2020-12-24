<?php

namespace App\Http\Controllers;

use App\Http\Traits\SaleTrait;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    use SaleTrait;

    public function saleMake(Request $request)
    {
        return view('announcements.announce_sale_make');
    }

    public function saleInfo()
    {
        return view('announcements.announce_sale_flash_info');
    }

    public function saleShow(Request $request)
    {
        $sale = Sale::where('number', $request->number)->first();

        if( empty($sale) ) return redirect()->route('home');

        return view('announcements.sale_show')->with([
            'sale' => $sale
        ]);
    }

    public function saleAnnounceMake(Request $request)
    {
        $this->saleAnnounceValidate($request);

        $new_sale = $this->saleAnnounceSave($request);

        return $this->responseData($new_sale);
    }
}
