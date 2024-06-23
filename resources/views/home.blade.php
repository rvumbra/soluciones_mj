@extends('layouts.plantilla')

@section('content')
<div id="year-calendar">
    
</div>

<div class="event-window-container">
    <div class="toast bg-white" id="event-window" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000" data-autohide="false">
        <div class="toast-header text-center">
            <button id="colorOfEvent" type="button" class="btn"></button>
            <strong class="mr-auto">{{__('Event')}}</strong>
            <small></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="contentOfEvent" class="toast-body text-center">
            
        </div>
    </div>
</div>
@endsection