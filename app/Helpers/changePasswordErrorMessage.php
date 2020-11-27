<?php

    function changePasswordErrorMessage($message, $search, $replace)
    {
        if ( !empty($message) && !empty($replace) ) {
            $is_replace = str_replace( $search, $replace, $message);
            return $is_replace ?: false;
        }
    }
