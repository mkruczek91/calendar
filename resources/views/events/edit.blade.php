@extends('layouts.app')

@section('content')


<form action="{{ route('events.update', $event->id)}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">

    <div class="panel panel-default">
        <div class="panel-heading">Czy na pewno akceptujesz spotkanie:</div>
        <div class="form-group">
            <input disabled type="text" class="form-control" value="{{ $event->events_name}}" name="events_name">
        </div>
        <div class="form-group">
            <input disabled type="text" class="form-control" value="{{ $event->start_date}}" name="start_date">
        </div>
        <div class="form-group">
            <input disabled type="text" class="form-control" value="{{ $event->end_date}}" name="end_date">
        </div>
        <div class="form-group">
            <input type="hidden" type="text" class="form-control" value="{{ $event->status}}" name="status">
        </div>
        
        
        <div class="panel-body">
       
            <div class="form-group">
                <button class="btn btn-primary">Zapisz</button>
         
                <a href="{{ route('events.panel')}}" class="btn btn-danger">Anuluj</a>
            </div>

        </div>
    </div>


</form>



@endsection