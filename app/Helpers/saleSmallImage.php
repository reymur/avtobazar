<?php

    function saleSmallImage($images){
        if( !empty($images) && $images->count() ){
            foreach ($images as $image) {
                if( strpos($image, 'small') ){
                    return $image->title;
                    break;
                }
            }
        }

        return false;
    }
