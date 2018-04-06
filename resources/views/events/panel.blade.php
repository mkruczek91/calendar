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
        <td>
            @if ($event->users)
                {{$event->users()->first()->name}}
            @endif        
        </td>
        <td>{{$event->events_name}}</td>
        <td>{{$event->start_date}}</td>
        <td>{{$event->end_date}}</td>



        <td><a href="{{ route('events.edit', $event->id)}}" class="btn btn-success">Tak</a></td>
        
        <td>
 
            <form class="delete" action="{{route('events.destroy', $event->id)}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-danger">Nie</button>
            </form>

        </td>
    </tr>

@endforeach

<script>
        $(".delete").on("submit", function(){
            return confirm("Czy na pewno chcesz usunac propozycje spotkania?");
        });
</script>


</table>
{{$events->links()}}



@endsection