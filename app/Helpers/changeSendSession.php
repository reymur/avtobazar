<?php

    function changeSendSession(){
        if( session()->has('send_flash') ){
            session(['send_flash' => 3]);
        }
    }
