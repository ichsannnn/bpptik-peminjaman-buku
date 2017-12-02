<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function if_transaksi()
    {
      return view('sales.dashboard.transaksi');
    }
}
