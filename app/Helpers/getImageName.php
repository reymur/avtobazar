<?php

    function getImageName($name)
    {
        if( empty($name) ) return false;

        $pos = strpos($name, '.');

        return substr($name, 0, $pos);
    }
