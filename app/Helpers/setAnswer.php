<?php

    function setAnswer( $seller, $i = false ){
        if( $i === true ) {
            return collect([
                'name' => $seller->name ?? 'Yox',
                'phone' => $seller->phone ?? 'Yox',
            ]);
        }
    }
