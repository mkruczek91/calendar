@extends('layouts.app')

@section('content')

<table class="table table-hover">
    <tr>
        <th>Kto</th>
        <th>Temat</th>
        <th>Od</th>
        <th>Do</th>
       
        
    </tr>
@foreach($events as $event)
    <tr>
        <td>
            @if ($event->users)
                {{$event->users()->first()->name}}
            @endif        
        </td>
        <td>{{$event->events_name}}</td>
        <td>{{$event->start_date}}</td>
        <td>{{$event->end_date}}</td>



  
    </tr>

@endforeach
</table>

{{$events->links()}}



@endsection