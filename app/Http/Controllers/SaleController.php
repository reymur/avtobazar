<?php

namespace App\Http\Controllers;

use App\Http\Traits\SaleTrait;
use App\Sale;
use App\User;
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
        $sale = Sale::where([
            'marka' => $request->marka,
            'number' => $request->number
        ])->first();

        $similar_sales = Sale::where('marka', $request->marka)->get();

        if( empty($sale) ) return redirect()->route('home');

        return view('announcements.sale_show')->with([
            'sale' => $sale,
            'similar_sales' => $similar_sales,
        ]);
    }

    public function saleAnnounceMake(Request $request)
    {
        $this->saleAnnounceValidate($request);

        $new_sale = $this->saleAnnounceSave($request);

        return $this->responseData($new_sale);
    }

    public function saleUserAllSales($id){
        $all_sales = getUserAllAnnouncements($id);
        $user = User::where('id', $id)->first();

        if( $user && ($user->who === 1) ){
            return view('users.seller.partials.seller_store', [
                'all_sales' => $all_sales,
                'user' => $user
            ]);
        }else{
            return view('announcements.user_all_announce_show', [
                'all_sales' => $all_sales,
                'user' => $this->GuestSaleUserInfo($all_sales)
            ]);
        }
    }

    public function userSupportedModel($user_id, $marka){
        if( !empty($user_id) && !empty($marka) ) {
            $user = User::find($user_id);
            $all_sales = getAnnouncementSaleCarModel($user_id, $marka);

            if( $user && ($user->who === 1) ){
                return view('users.seller.partials.seller_store', [
                    'all_sales' => $all_sales,
                    'sale_car_model' => $marka,
                    'user' => $user
                ]);
            }
        }
    }

    public function GuestSaleUserInfo($sales){
        if( $sales && $sales->count() ){
            return [
                'name' => $sales->first()->name,
                'tel' => $sales->first()->user_id
            ];
        }
        return null;
    }
}
