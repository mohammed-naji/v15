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

    function create() {
        return view('books.create');
    }

    function store(Request $request) {
        // validate data
        $request->validate([
            'name' => 'required',
            // 'cover' => 'required',
            'publisher' => 'required',
            'page_count' => 'required',
            'price' => 'required'
        ]);

        $data = $request->except('_token', 'cover');

        // upload files
        if($request->hasFile('cover')) {
            $cover_name = rand().time().$request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('uploads/covers'), $cover_name);
            $data['cover'] = $cover_name;
        }

        // add to database
        // 1. using query builder
        // 2. using object
        // 3. using model

        // DB::table('books')->insert([
        //     'name' => $request->name,
        //     'cover' => $cover_name,
        //     'publisher' => $request->publisher,
        //     'page_count' => $request->page_count,
        //     'price' => $request->price,
        // ]);

        // $book = new Book();

        // $book->name = $request->name;
        // $book->cover = $cover_name;
        // $book->publisher = $request->publisher;
        // $book->page_count = $request->page_count;
        // $book->price = $request->price;

        // $book->save();
        // dd($book);

        Book::create($data);

        // redirect to any page
        return redirect()
        ->route('books.index')
        ->with('msg', 'Book added successfully')
        ->with('type', 'success');
    }

    function destroy($id) {
        Book::destroy($id);

        return redirect()
        ->route('books.index')
        ->with('msg', 'Book deleted successfully')
        ->with('type', 'warning');
    }

}

// http://127.0.0.1:8000/books?q=co&count=15
// http://127.0.0.1:8000/books?page=2
