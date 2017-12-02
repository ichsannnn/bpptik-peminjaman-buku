<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Book;

class OrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function if_index()
    {
      // echo "string";
      $order = Order::orderBy('if_kode_bayar', 'desc')->paginate(10);
      // $order = Order::all();
      return view('sales.order.index', ['data' => $order, 'email' => '', 'transaksi' => '']);
      // foreach ($order as $key => $value) {
      //   $book = Book::where('if_kode_buku', $value->if_kode_buku)->first();
      //   echo "Kode pemesanan " . $value->if_kode_pemesanan;
      //   if ($value->if_jumlah_pemesanan < 20 && ($book->if_tahun_terbit - date('Y') == 0)) {
      //     echo " no diskon<br>";
      //   } elseif ($value->if_jumlah_pemesanan >= 20 && $value->if_jumlah_pemesanan < 40 && (date('Y') - $book->if_tahun_terbit == 0)) {
      //     echo " karena beli banyak, lebih dari 20, dapet diskon<br>";
      //   } elseif ($value->if_jumlah_pemesanan >= 40 && (date('Y') - $book->if_tahun_terbit == 0)) {
      //     echo " karena beli banyak, lebih dari 40, dapet diskon<br>";
      //   } elseif ($value->if_jumlah_pemesanan >= 20 && $value->if_jumlah_pemesanan < 40 && (date('Y') - $book->if_tahun_terbit > 0)) {
      //     echo " karena beli banyak, lebih dari 20, dan buku udah tua, dapet diskon dobel deh<br>";
      //   } elseif ($value->if_jumlah_pemesanan >= 40 && (date('Y') - $book->if_tahun_terbit > 0)) {
      //     echo " karena beli banyak, lebih dari 40, dan buku udah tua, dapet diskon dobel deh<br>";
      //   } elseif ($value->if_jumlah_pemesanan < 20 && (date('Y') - $book->if_tahun_terbit > 0)) {
      //     echo " bukan terbitan tahun ini, jadi dapet diskon > " . (date("Y") - $book->if_tahun_terbit) . '<br>';
      //     for ($i=1; $i <= 10; $i++) {
      //       if (date('Y') - $book->if_tahun_terbit == $i) {
      //         echo '<b>'.$i * 0.005.'</b><br>';
      //       }
      //     }
      //   }
      // }
      //
      // dd($order);
    }

    public function if_editOrder($id)
    {
      $book = Book::all();
      $order = Order::find($id);
      return view('sales.order.edit', ['book' => $book, 'data' => $order]);
    }

    public function if_updateOrder(Request $r)
    {
      $id = $r->input('id');
      $order = Order::find($id);
      $order->if_email_pemesan = $r->input('email_pemesan');
      $order->if_kode_buku = $r->input('kode_buku');
      $order->if_jumlah_pemesanan = $r->input('jumlah_pemesanan');
      $order->if_keterangan = $r->input('keterangan');
      $order->save();

      return redirect(url('transaksi'));
    }

    public function if_deleteOrder($id)
    {
      $order = Order::find($id);
      $order->delete();
      return redirect(url('admin/transaksi'));
    }

    public function if_searchOrder(Request $r)
    {
      $email = $r->input('email');
      $tanggal = $r->input('tanggal_transaksi');

      if ($email != "" && $tanggal != "") {
        $order = Order::where('if_email_pemesan', $email)->where('if_tanggal_pemesanan', $tanggal)->get();
        return view('sales.order.search', ['data' => $order, 'email' => $email, 'transaksi' => $tanggal]);
      } elseif ($email != "") {
        $order = Order::where('if_email_pemesan', $email)->get();
        return view('sales.order.search', ['data' => $order, 'email' => $email, 'transaksi' => $tanggal]);
      } elseif ($tanggal != "") {
        $order = Order::where('if_tanggal_pemesanan', $tanggal)->get();
        return view('sales.order.search', ['data' => $order, 'email' => $email, 'transaksi' => $tanggal]);
      }
    }

    public function if_viewOrder($kode)
    {
      $order = Order::where('if_kode_pemesanan', $kode)->first();
      return view('sales.order.invoice', ['data' => $order]);
    }

    public function if_doneOrder($id)
    {
      $order = Order::find($id);
      $order->if_kode_bayar = "Sudah Bayar";
      $order->save();
      return redirect(url('admin/transaksi'));
    }

    public function if_cancelOrder($id)
    {
      $order = Order::find($id);
      $order->if_kode_bayar = "Belum Bayar";
      $order->save();
      return redirect(url('admin/transaksi'));
    }


}
