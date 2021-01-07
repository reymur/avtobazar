<?php

    use App\User;

    function getStatus($sale)
    {
        if( !empty($sale) ){
            return User::where('name', $sale->name)
                ->orWhere('autoNumber', $sale->name)->first();
        }

        return false;
    }
