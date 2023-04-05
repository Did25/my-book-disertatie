<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My collection: {{$collection->name}}
        </h2>
    </x-slot>
    <div>
        <h1>Books added in collection</h1>
        @foreach( $books as $book)
        <div style="display:flex">
            <p>{{$book->title}}</p>
            <button type="button" class="btn btn-primary btn-sm py-2 mx-2">Delete</button>
        </div>

        @endforeach
    </div>
</x-app-layout>