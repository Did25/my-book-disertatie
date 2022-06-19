<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
        <button onclick="openForm('addUser')" class="btn btn-primary" style="margin: 5px;">{{_('Add new user')}}</button>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 d-flex">
        <div style="display:flex;" class="px-3 mx-auto">
            <table class="users-table">
                <tr class="table-header">
                    <th>{{__('User Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{_('Role')}}</th>
                    <th>{{_('Actions')}}</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{url('users/delete', $user->id)}}" class="btn btn-danger btn-sm py-2 mx-2">
                            <i class="fa-solid fa-trash-can">{{__('Delete')}}</i>
                        </a>
                        <button onclick="openForm('{{$user->id}}')" class="btn btn-primary btn-sm py-2 mx-2">
                            <i class="fa-solid fa-pen-to-square">{{__('Edit')}}</i>
                        </button>
                        <!-- edit form -->
                        <div class="justify-content mx-4 my-3" id="{{$user->id}}" style="display: none; position:absolute; left:30%; top:15%">
                            <form style="border-style:double;" name="edit-user-form" id="edit-user-form" method="get" action="{{url('users/edit', $user->id)}}">
                                <button type="button" class="btn btn-primary float-right mr-4 my-2" onclick="openForm('{{$user->id}}')">x</button>
                                <div class="form-title">
                                    <label for="editUser">{{__('Edit user')}}</label>
                                </div>
                                @csrf
                                <div class="form-group  mx-2 my-2 d-flex justify-content-start px-3 py-2 row">
                                    <label for="editUser" class="col-md-3">{{__('Name')}}: </label>
                                    <input type="text" id="name" name="name" class="form-control col-md-9" value="{{ $user->name }}" required="">
                                </div>
                                <div class="form-group  mx-2 py-2 d-flex justify-content-start px-3 row">
                                    <label for="editUser" class="col-md-3">{{__('Email')}}: </label>
                                    <input type="text" id="email" name="email" class="form-control col-md-9" value="{{ $user->email}}" required="">
                                </div>
                                <div class="form-group  mx-2 py-2 d-flex justify-content-start px-3 row">
                                    <label for="editUser" class="col-md-3">{{__('Role')}}: </label>
                                    <input type="text" id="email" name="email" class="form-control col-md-9" value="{{ $user->role}}" required="">
                                </div>
                                <div class="row mx-2 px-3 py-2 ml-5">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 230px;">{{__('Save')}}</button>
                                </div>
                            </form>
                        </div>

        </div>
        <!-- end edit form -->
        </td>
        </tr>
        @endforeach
        </table>
        @if(Session::has('message'))
        <div class="alert alert-danger" style="position: absolute; left:50%; top:50%; display:block;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>{{Session::get('message') }}</p>
        </div>
        @endif
        <!-- add form -->
        <div class="justify-content mx-4 my-3" id="addUser" style="display: none; position:absolute;">
            <form style="border-style:double;" name="add-admin-form" id="add-admin-form" method="post" action="{{url('users/create')}}">
                <button class="btn btn-primary float-right mr-4 my-2" onclick="openForm('addUser')">x</button>
                <div class="form-title">
                    <label for="addAdmin">{{__('Add new user')}}</label>
                </div>
                @csrf
                <div class="form-group  mx-2 my-2 d-flex justify-content-start px-3 py-2 row">
                    <label for="addAdmin" class="col-md-3">{{__('Name')}}: </label>
                    <input type="text" id="name" name="name" class="form-control col-md-9" required="">
                </div>
                <div class="form-group  mx-2 py-2 d-flex justify-content-start px-3 row">
                    <label for="addAdmin" class="col-md-3">{{__('Email')}}: </label>
                    <input type="text" id="email" name="email" class="form-control col-md-9" required="">
                </div>

                <button type="submit" class="btn btn-primary float-right mr-4 mb-4" style="width:30%">{{__('Add')}}</button>
            </form>
        </div>
        <!-- end add form -->
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