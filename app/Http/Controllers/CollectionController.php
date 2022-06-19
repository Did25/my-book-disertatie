<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Book;

class CollectionController extends Eloquent
{
    protected $collection;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $collections = Collection::where('user_id', $user->id)->get();
        $response = ['collections' => $collections];
        return view('my-collections')->with($response);
        //$books = $user->books()->sortBy('title')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();

        $this->collection = new Collection();
        $this->collection->name = $request->name;
        $this->collection->user_id = $user->id;
        $this->collection->save();

        return back()->with('message', 'Collection created!');
    }
    public function show($collection_id) {
        $collection = Collection::where('_id', $collection_id)->first();
        $my_books = [];
        foreach($collection->books as $book) {
            $my_book = Book::where('_id', $book)->first();
            $my_books[] = $my_book;
        }
        $response = ['collection' => $collection, 'books' => $my_books];
        return view('collection')->with($response);
    }
}
