<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Order;

class DashboardController extends Controller
{
    public function if_index()
    {
      $book = Book::paginate(10);
      return view('sales.dashboard.index', ['book' => $book]);
    }

    public function if_createOrder()
    {
      $book = Book::all();
      return view('sales.dashboard.transaksi', ['book' => $book]);
    }

    public function if_storeOrder(Request $r)
    {
      $order = new Order;
      $kode = "OR" . rand(999, 111);
      $order->if_kode_pemesanan = $kode;
      $order->if_tanggal_pemesanan = date("Y-m-d");
      $order->if_email_pemesan = $r->input('email_pemesan');
      $order->if_kode_buku = $r->input('kode_buku');
      $order->if_jumlah_pemesanan = $r->input('jumlah_pemesanan');
      $order->if_keterangan = $r->input('keterangan');
      $order->if_kode_bayar = "Belum Bayar";
      $order->save();

      return redirect(url('order'))->with('message','Order sudah diterima, harap lakukan pembayaran. Kode Transaksi : ' . $kode);
    }

    public function if_viewOrder()
    {
      return view('sales.dashboard.view');
    }

    public function if_showOrder(Request $r)
    {
      $tipe = $r->input('tipe');
      $value = $r->input('value');
      if ($tipe == "kp") {
        $order = Order::where('if_kode_pemesanan', $value)->first();
        return view('sales.dashboard.show', ['data' => $order]);
      } elseif ($tipe == 'e') {
        # code...
      } elseif ($tipe == 'tp') {
        # code...
      }
    }

    public function if_fullOrder($kode)
    {
      $order = Order::where('if_kode_pemesanan', $kode)->first();
      return view('sales.dashboard.invoice', ['data' => $order]);
    }
}
