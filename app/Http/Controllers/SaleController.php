<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleMake(Request $request)
    {
        return view('announcements.announce_sale_make');
    }
}
