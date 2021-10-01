<?php

    function getMorgCount($announce_users) {
        if( !empty($announce_users) ) {
            $count = 0;

            foreach ($announce_users as $user) {
                if( $user->who == 2 ) {
                    $count++;
                }
            }

            return $count;
        }

        return false;
    }
