<?php

use App\Sale;

function getAnnouncementSaleCarModel($user_id, $marka){
        if( !empty($user_id) && !empty($marka) ) {
            $sale = Sale::where(['user_id' => $user_id, 'marka' => $marka])->get();

            if( !empty($sale) && $sale->count() ) {
                return $sale;
            }

            return false;
        }

        return false;
    }
