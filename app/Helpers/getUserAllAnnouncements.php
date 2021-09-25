<?php

use App\Sale;

function getUserAllAnnouncements($id){
        if( $id ){
            $all_sales = Sale::where('user_id',$id)->get();

            if( !empty($all_sales) && $all_sales->count() ){
                return $all_sales;
            }

            return false;
        }

        return false;
    }
