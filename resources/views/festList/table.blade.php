@extends('layouts.plantilla')

@section('content')
<h1 id="festList_title">
    <i class="nav-icon fas fa-solid fa-calendar-minus" aria-hidden="true"></i>
    {{__('Fest days')}}
</h1>
<div id="festList_btnGroup">
    <button id="btnAddFest" type="button" class="btn text-center" data-toggle="modal" data-target="#modalCreateFest">
        <p><i class="fas fa-solid fa-plus"></i></p>
        <p>{{__('Add')}}</p>
    </button>
    <button id="btnEditFest" type="button" class="btn text-center" data-toggle="modal" data-target="#modalEditFest">
        <p><i class="fas fa-pen"></i></p>
        <p>{{__('Edit')}}</p>
    </button>
    <button id="btnDeleteFest" type="button" class="btn text-center" data-toggle="modal" data-target="#modalDeleteFest">
        <p><i class="fas fa-solid fa-trash"></i></p>
        <p>{{__('Delete')}}</p>
    </button>
</div>
<div id="festList_table_container" class="rounded">
    <table id="festList_table" class="display table table-bordered table-responsive dt-responsive">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>{{__('Code')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Color')}}</th>
                <th>{{__('Date')}}</th>
                <th>{{__('Recurrent')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fests as $f)
                <tr class="row-selectable">
                    <td class="text-center"><input type="checkbox" value="{{$f->id}}"></td>
                    <td>{{$f->id ? $f->id : '-'}}</td>
                    <td>{{$f->name ? $f->name : '-'}}</td>
                    <td>{{$f->color ? $f->color : '-'}}</td>
                    <td>{{$f->date ? $f->date : '-'}}</td>
                    <td class="text-center">{{$f->recurrent > 0 ? 1 : 0 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de creación -->
<div class="modal fade" id="modalCreateFest" tabindex="-1" role="dialog" aria-labelledby="modalCreateFestLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateFestLabel">{{__('Create Fest')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="modalCreateFest_id">

                <div class="form-group">
                    <label for="modalCreateFest_name">{{__('Name')}}</label>
                    <input type="text" name="name" id="modalCreateFest_name" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <label for="modalCreateFest_lastname">{{__('Color')}}</label><br>
                    <input type="text" name="color" id="modalCreateFest_color" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalCreateFest_date">{{__('Date')}}</label>
                    <input type="date" name="date" id="modalCreateFest_date" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <label for="modalCreateFest_recurrent">{{__('Recurrent')}}</label><br>
                    <input type="checkbox" name="recurrent" id="modalCreateFest_recurrent" class="form-control">
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button id="btnCreateFest" class="btn btn-outline-success">{{__('Add')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición -->
<div class="modal fade" id="modalEditFest" tabindex="-1" role="dialog" aria-labelledby="modalEditUserFest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditUserFest">{{__('Edit fest')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="modalEditFest_id">

                <div class="form-group">
                    <label for="modalEditFest_name">{{__('Name')}}</label>
                    <input type="text" name="name" id="modalEditFest_name" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <label for="modalEditFest_lastname">{{__('Color')}}</label><br>
                    <input type="text" name="color" id="modalEditFest_color" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modalEditFest_date">{{__('Date')}}</label>
                    <input type="date" name="date" id="modalEditFest_date" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <label for="modalEditFest_recurrent">{{__('Recurrent')}}</label><br>
                    <input type="checkbox" name="recurrent" id="modalEditFest_recurrent" class="form-control">
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button id="btnUpdateFest" class="btn btn-outline-success">{{__('Update')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación -->
<div class="modal fade" id="modalDeleteFest" tabindex="-1" role="dialog" aria-labelledby="modalDeleteFestLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteFestLabel">{{__('Delete Fest Day')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="modalDeleteFest_id">

                <p>{{__('Delete fest day from list?')}}</p>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button id="btnDestroyFest" class="btn btn-outline-danger">{{__('Delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection