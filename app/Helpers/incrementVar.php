<?php

    function incrementVar(): int
    {
        static $num = 1;
        return $num++;
    }
