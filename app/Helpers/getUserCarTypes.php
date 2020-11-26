<?php

    function getUserCarTypes($car_name, $my_car_types){
        foreach ( $my_car_types as $type ){
            if( $car_name == $type->title){
                return true;
            }
        }
    }
