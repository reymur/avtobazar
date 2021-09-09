<?php

    use App\User;

    function getStatus($sale)
    {
        if( !empty($sale) && $sale != null ){
            return User::where('name', $sale->name)
                ->orWhere('phone', $sale->phone)->first();
        }

        return false;
    }
