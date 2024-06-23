@extends('layouts.plantilla')

@section('content')
<h1 id="userList_title">
    <i class="nav-icon fas fa-solid fa-users" aria-hidden="true"></i>
    {{__('User list')}}
</h1>
<div id="userList_btnGroup">
    <button id="btnAddUser" type="button" class="btn text-center" data-toggle="modal" data-target="#modalCreateUser">
        <p><i class="fas fa-solid fa-plus"></i></p>
        <p>{{__('Add')}}</p>
    </button>
    <button id="btnEditUser" type="button" class="btn text-center" data-toggle="modal" data-target="#modalEditUser">
        <p><i class="fas fa-pen"></i></p>
        <p>{{__('Edit')}}</p>
    </button>
    <button id="btnDeleteUser" type="button" class="btn text-center" data-toggle="modal" data-target="#modalDeleteUser">
        <p><i class="fas fa-solid fa-trash"></i></p>
        <p>{{__('Delete')}}</p>
    </button>
</div>
<div id="userList_table_container" class="rounded">
    <table id="userList_table" class="display table table-bordered table-responsive dt-responsive">
        <thead>
            <tr>
                <th class="text-center">{{__('Select')}}</th>
                <th>{{__('Code')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Lastnames')}}</th>
                <th>{{__('Email')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr class="row-selectable">
                    <td class="text-center"><input type="checkbox" value="{{$u->id}}"></td>
                    <td>{{$u->id ? $u->id : '-'}}</td>
                    <td>{{$u->name ? $u->name : '-'}}</td>
                    <td>{{$u->lastname ? $u->lastname : '-'}}</td>
                    <td>{{$u->email ? $u->email : '-'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de creación -->
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateUserLabel">{{__('Create User')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="modalCreateUser_id">

                <div class="form-group">
                    <label for="modalCreateUser_name">{{__('Name')}}</label>
                    <input type="text" name="name" id="modalCreateUser_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalCreateUser_lastname">{{__('Lastnames')}}</label>
                    <input type="text" name="lastname" id="modalCreateUser_lastname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalCreateUser_email">{{__('Email')}}</label>
                    <input type="email" name="email" id="modalCreateUser_email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalCreateUser_password">{{__('Password')}}</label>
                    <input type="password" name="password" id="modalCreateUser_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalCreateUser_password">{{__('Confirm password')}}</label>
                    <input type="password" name="password_confirmation" id="modalCreateUser_password_confirmation" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button id="btnCreateUser" class="btn btn-outline-success">{{__('Add')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición -->
<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditUserLabel">{{__('Edit user')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="modalEditUser_id">

                <div class="form-group">
                    <label for="modalEditUser_name">{{__('Name')}}</label>
                    <input type="text" name="name" id="modalEditUser_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalEditUser_lastname">{{__('Lastnames')}}</label>
                    <input type="text" name="lastname" id="modalEditUser_lastname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalEditUser_email">{{__('Email')}}</label>
                    <input type="email" name="email" id="modalEditUser_email" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button id="btnUpdateUser" class="btn btn-outline-success">{{__('Update')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación -->
<div class="modal fade" id="modalDeleteUser" tabindex="-1" role="dialog" aria-labelledby="modalDeleteUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteUserLabel">{{__('Delete User')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="modalDeleteUser_id">

                <p>{{__('Delete user from list?')}}</p>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button id="btnDestroyUser" class="btn btn-outline-danger">{{__('Delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection