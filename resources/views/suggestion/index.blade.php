@extends('layouts.app')

@section('content')

<table class="table table-hover">
    <tr>
        <th>Temat</th>
        <th>Kto</th>
        <th>Od</th>
        <th>Do</th>
        <th>Tak</th>
        <th>Nie</th>
    </tr>
@foreach($suggestions as $suggestion)
    <tr>
        <td>{{$suggestion->events_name}}</td>
        <td>sie zrobi</td>
        <td>{{$suggestion->start_date}}</td>
        <td>{{$suggestion->end_date}}</td>


        <td><a href="{{ route('suggestions.yes', $suggestion->id)}}" class="btn btn-success">Tak</a></td>
        <td>
            <form method="post" action="{{route('suggestions.destroy', $suggestion->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Nie</button>
            </form>
        </td>
    </tr>

@endforeach
</table>
{{$suggestions->links()}}

@endsection