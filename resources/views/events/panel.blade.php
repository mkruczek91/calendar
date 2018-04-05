@extends('layouts.app')

@section('content')


<table class="table table-hover">
    <tr>
        <th>Kto</th>
        <th>Temat</th>
        <th>Od</th>
        <th>Do</th>
        <th colspan="2">Akceptacja</th>
        
    </tr>
@foreach($events as $event)
    <tr>
        <td>?</td>
        <td>{{$event->events_name}}</td>
        <td>{{$event->start_date}}</td>
        <td>{{$event->end_date}}</td>



        <td><a href="{{ route('events.edit', $event->id)}}" class="btn btn-success">Tak</a></td>
        
        <td>
            <form method="post" action="{{route('events.destroy', $event->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Nie</button>
            </form>
        </td>
    </tr>

@endforeach
</table>
{{$events->links()}}



@endsection