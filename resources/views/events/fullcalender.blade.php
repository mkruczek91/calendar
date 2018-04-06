@extends('layouts.calendar')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header"><a class="navbar-brand" href="{{route('events.termin')}}" >Przejdź do listy spotkań</a></div>

                <div class="card-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

