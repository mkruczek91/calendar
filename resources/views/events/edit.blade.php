@extends('layouts.app')

@section('content')


<form action="{{ route('events.update', $event->id)}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">

    <div class="card bg-light">

        <div class="card-header">Czy na pewno akceptujesz spotkanie:</div>

    <table class="table">
        <tr class="d-flex">
            <td class="col-3">Kto:</td>
            <td class="col-9">{{ $event['users']->name}}</td>
        </tr>
        <tr class="d-flex">
            <td class="col-3">Temat:</td>
            <td class="col-9">{{ $event->events_name}}</td>
        </tr>
        <tr class="d-flex">
            <td class="col-3">Początek</td>
            <td class="col-9">{{ $event->start_date}}</td>
        </tr>
        <tr class="d-flex">
            <td class="col-3">Koniec</td>
            <td class="col-9">{{ $event->end_date}}</td>
        </tr>
    </table>

        
        <div class="form-group">
            <input type="hidden" type="text" class="form-control" value="{{ $event->status}}" name="status">
        </div>
        <div class="form-group">
            <input  type="hidden" type="text" class="form-control" value="{{ $event['users']->email}}" name="email">
        </div>
        
        
        <div class="card-body">
       
            <div class="form-group">
                <button class="btn btn-primary">Zapisz</button>
         
                <a href="{{ route('events.panel')}}" class="btn btn-danger">Anuluj</a>
            </div>

        </div>
 
    </div>


</form>



@endsection