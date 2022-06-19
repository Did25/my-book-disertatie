<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
        <div style="float:right ;">
            <form action="{{url('book/search')}}" method="GET">
                <input type="text" name="search" required placeholder="Search..." />
                <button type="submit">Search</button>
            </form>
        </div>
    </x-slot>

    @foreach($books as $book)
    <div style="display:flex; margin-left:25px">
        <a href={{$book->image}}><img src={{$book->image_medium}} style="margin:20px"></img></a>
        <div style="display:list-item; margin-top: 15px;">
            <a href="{{url('/book', $book->_id)}}">
                <p><b>Title:</b> {{$book->title}}</>
            </a>
            </p>
            <p><b>Authors:</b> {{$book->authors}}</p>
            <p><b>Year: </b>{{$book->original_publication_year}}</p>
            <p></p>
            <p><b>Rating:</b>{{$book->average_rating}}</p>
            <p><b>ISBN:</b>{{$book->isbn}}</p>
        </div>
    </div>
    @endforeach
    <div>
        {!! $books->links('pagination') !!}
    </div>

</x-app-layout>