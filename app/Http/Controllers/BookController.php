<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Collection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);


        $response = ['books' => $books];
        return view('books')->with($response);
    }
    public function displayBook($book_id)
    {
        $user = Auth::user();
        $collections = Collection::where('user_id', $user->id)->get();
        $book = Book::where('_id', $book_id)->first();
        $response = ['book' => $book, 'collections' => $collections];
        return view('book')->with($response);
    }
    public function editBook(Request $request, $id) {
            $data = $request->all();
            $book = Book::find($id);
            $book->update($data);
            return redirect('books');

    }
    public function addInCollection(Request $request, $book_id)
    {
        $collection_id = $request->collection;
        Collection::where('_id', $request->collection)
            ->push('books', $book_id);

        return back()->with('message', 'Book added in your collection');
    }

    public function searchBook(Request $request)
    {
        $text = $request->input();
        $books = Book::where('Title', 'regexp', "/$text/")->get();
        //$articles = Article::search('bu');
        //dd($articles);
        return view('books', compact('books'));
    }
}
