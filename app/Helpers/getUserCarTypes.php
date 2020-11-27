<?php

    function getUserCarTypes($car_name, $my_car_types){
        if( is_array($my_car_types) || is_object($my_car_types)){
            foreach ( $my_car_types as $type ){
                if( $car_name == $type->title){
                    return true;
                }
            }
        }
        else{
            if( $car_name == $my_car_types){
                return true;
            }
        }
    }
