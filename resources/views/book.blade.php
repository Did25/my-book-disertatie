<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/book.css') }}" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Add to collection')}}
        </h2>
        <button onclick="openForm('{{$book->_id}}add')" class="btn btn-primary btn-sm py-2 mx-2">
            <i class="fa-solid fa-pen-to-square">{{__('Add to collection')}}</i>
        </button>
        <button onclick="openForm('{{$book->_id}}edit')" class="btn btn-primary btn-sm py-2 mx-2">
            <i class="fa-solid fa-pen-to-square">{{__('Edit book')}}</i>
        </button>
        <div style="display: none;" id="{{$book->_id}}add">
            <form style="border-style:double;" name="add-collection-form" id="add-collection-form" method="get" action="{{url('books/add-in-collection', $book->_id)}}">
                <button class="btn btn-primary float-right mr-4 my-2" onclick="openForm('{{$book->_id}}add')">x</button>
                @csrf
                <div class="form-group justify-content-start px-3 row">
                    <label class="col-md-3">{{__('Collection:')}}</label>
                    <select name="collection" id="collection" class="form-control col-md-9" required="">
                        @foreach($collections as $collection)
                        <option value="{{$collection->_id}}">{{$collection->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-right mr-4 mb-4">{{__('Add')}}</button>
            </form>
        </div>
        <div style="display: none;" id="{{$book->_id}}edit">
            <form style="border-style:double;" name="edit-book" id="edit-book" method="get" action="{{url('books/edit', $book->_id)}}">
                <!-- <button class="btn btn-primary float-right mr-4 my-2" onclick="openForm('{{$book->_id}}edit')">x</button> -->
                @csrf
                <div class="form-group  mx-2 my-2 justify-content-start px-3 py-2 row">
                    <label for="editUser" class="col-md-3">{{__('Title')}}: </label>
                    <input type="text" id="title" name="title" class="form-control col-md-9" value="{{ $book->title }}" required="">
                </div>
                <div class="form-group  mx-2 my-2 py-2 d-flex justify-content-start px-3 row">
                    <label for="editUser" class="col-md-3">{{__('Authors')}}: </label>
                    <input type="text" id="authors" name="authors" class="form-control col-md-9" value="{{ $book->authors}}" required="">
                </div>
                <div class="form-group  mx-2 my-2 py-2 d-flex justify-content-start px-3 row">
                    <label for="editUser" class="col-md-3">{{__('Description')}}: </label>
                    <input type="text" id="description" name="description" class="form-control col-md-9" value="{{ $book->description}}">
                </div>
                <div class="form-group  mx-2 my-2 py-2 d-flex justify-content-start px-3 row">
                    <label for="editUser" class="col-md-3">{{__('Authors')}}: </label>
                    <input type="text" id="authors" name="authors" class="form-control col-md-9" value="{{ $book->authors}}" required="">
                </div>
                <div class="form-group  mx-2 my-2 py-2 d-flex justify-content-start px-3 row">
                    <label for="editUser" class="col-md-3">{{__('ISBN')}}: </label>
                    <input type="text" id="isbn" name="isbn" class="form-control col-md-9" value="{{ $book->isbn}}">
                </div>
                <div class="form-group  mx-2 my-2 py-2 d-flex justify-content-start px-3 row">
                    <label for="editUser" class="col-md-3">{{__('Year')}}: </label>
                    <input type="text" id="year" name="year" class="form-control col-md-9" value="{{ $book->original_publication_year}}" required="">
                </div>
                <button type="submit" class="btn btn-primary float-right mr-4 mb-4">{{__('Save')}}</button>
            </form>
        </div>
    </x-slot>
    <div class="row">
        <div class="col-md-3">
            <a href = {{$book->image}}><img style="margin:20px;box-shadow: 8px 8px 15px rgb(0 0 0 / 25%);border-radius: 6px;" src={{$book->image}}></img></a>
        </div>
        <div class="col-md-9 mt-3 book-details">
            <h1 class="title">{{$book->title}}</h1>
            <h2 class="subtitle">{{__('Authors')}}</h2>
            <p>{{$book->authors}}</p>
            <h2 class="subtitle">Description:</h2>
            <p>{{$book->description}}</p>
            <h2 class="subtitle">{{__('ISBN')}}</h2>
            <p>{{$book->isbn}}</p>
            <h2 class="subtitle">{{__('Original publication year')}}</h2>
            <p>{{$book->original_publication_year}}</p>
            <h2 class="subtitle">{{__('Volume number')}}</h2>
            <p>{{$book->books_count}}</p>
            <h2 class="subtitle">{{__('Rating')}}</h2>
            <p>{{$book->average_rating}}</p>
        </div>
    </div>
    <script>
        function openForm($id) {
            var x = document.getElementById($id);
            if (x.style.display === "none") {
                x.style.display = "flex";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</x-app-layout>