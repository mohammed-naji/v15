<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    function index(Request $request) {

        // plain sql
        // $books = DB::select("SELECT * FROM books");

        // query builder
        // $books = DB::table('books')->get();

        // model
        // $books = Book::all();
        // $books = Book::latest('id')->get();
        // $books = Book::latest('id')->paginate(20);
        // $books = Book::latest('id')->simplepaginate(20);
        // $books = Book::latest('id')->simplepaginate(20);
        // SELECT * FROM books ORDER BY id DESC

        // SELECT * FROM books LIMIT 20 OFFSET 20 ORDER BY id DESC

        if($request->has('q')) {
            // SELECT * FROM books WHERE name like %dd%
            $books = Book::where('name', 'like', '%' . $request->q . '%')
            // ->orWhere()
            ->paginate($request->count);
        }else {
            $books = Book::latest('id')->paginate(20);
        }

        // dd($books);
        return view('books.index', compact('books'));
    }
}
