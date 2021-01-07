<?php

    function getFirstSmallImage($images)
    {
        if( !empty($images) && $images->count() > 0 ){
            foreach( $images as $image ){
                if( strrpos($image->title, 'small') !== false ){
                    return $image->title;
                }
            }
        }
    }
