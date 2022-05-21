<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    @foreach($books as $book)
    <div style="display:flex; margin-left:25px">
        <a href={{$book->image}}><img src={{$book->image_medium}} style="margin:20px"></img></a>
        <div style="display:list-item; margin-top: 15px;">
            <p><b>Title:</b> {{$book->title}}</>
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