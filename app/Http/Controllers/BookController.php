<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function if_index()
    {
      $book = Book::orderBy('id', 'desc')->paginate(10);
      return view('sales.book.index', ['book' => $book]);
    }

    public function if_create()
    {
      return view('sales.book.create');
    }

    public function if_store(Request $r)
    {
      $book = new Book;
      $kode = "IF" . rand(999, 111);
      $book->if_kode_buku = $kode;
      $book->if_judul_buku = $r->input('judul_buku');
      $book->if_pengarang = $r->input('pengarang');
      $book->if_penerbit = $r->input('penerbit');
      $book->if_tahun_terbit = $r->input('tahun_terbit');
      $book->if_harga = $r->input('harga');
      $book->save();

      return redirect(url("admin/buku"));
    }

    public function if_edit($id)
    {
      $book = Book::find($id);
      return view('sales.book.edit', ['data' => $book]);
    }

    public function if_update(Request $r)
    {
      $id = $r->input('id');
      $book = Book::find($id);
      $book->if_judul_buku = $r->input('judul_buku');
      $book->if_pengarang = $r->input('pengarang');
      $book->if_penerbit = $r->input('penerbit');
      $book->if_tahun_terbit = $r->input('tahun_terbit');
      $book->if_harga = $r->input('harga');
      $book->save();

      return redirect(url("admin/buku"));
    }

    public function if_delete($id)
    {
      $book = Book::find($id);
      $book->delete();
      return redirect(url('admin/buku'));
    }
}
