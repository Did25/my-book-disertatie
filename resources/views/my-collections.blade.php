<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Collections') }}
        </h2>
    </x-slot>
    @if(Session::has('message'))
    <div class="alert alert-danger" style="position: absolute; left:50%; top:50%; display:block;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p>{{Session::get('message') }}</p>
    </div>
    @endif
    <!-- add form -->
    <div class="justify-content mx-4 my-3" id="addCollection">
        <form style="border-style:double;" name="add-collection-form" id="add-collection-form" method="post" action="{{url('my-collections/create')}}">
            <!-- <button class="btn btn-primary float-right mr-4 my-2" onclick="openForm('addCompany')">x</button> -->
            <div class="form-title">
                <label for="addCompany">{{__('Create new collection')}}</label>
            </div>
            @csrf
            <div class="form-group  mx-2 my-2 d-flex justify-content-start px-3 py-2 row">
                <label class="col-md-3">{{__('Name')}}: </label>
                <input type="text" id="name" name="name" class="form-control col-md-9" required="">
            </div>
            <button type="submit" class="btn btn-primary float-right mr-4 mb-4">{{__('Create')}}</button>
        </form>
    </div>
    <!-- end add form -->
    <div>
        @foreach($collections as $collection)
        <p>{{$collection->name}}</p>
        @endforeach
    </div>

</x-app-layout>