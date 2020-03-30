<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
class BookController extends Controller
{
     public function index()
    {
        $books = Book::with('publisher', 'rates')->orderBy('id', 'DESC')->paginate(16);
        return view('user.book.list-book', compact('books'));

    }    
    public function search(Request $request){
        $books = Book::with('rates', 'publisher')
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        ->where('title', 'LIKE', '%' . $request->search . '%')
        ->orWhere('publishers.publisher_name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('categories.category_name', 'LIKE', '%' . $request->search . '%')
        ->paginate(12);
        return view('user.book.list-book', compact('books'));
        }
       
}

