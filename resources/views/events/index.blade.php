
@extends('layouts.app')

@section('content')
        <div class="container">

            <div class="panel panel-default">

             <div class="panel-heading">Dodaj swoja propozycje terminu spotkania</div>

              <div class="panel-body">    

                   {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif

                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('events_name','Temat spotkania:') !!}
                            <div class="">
                            {!! Form::text('events_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('events_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          {!! Form::label('start_date','Data rozpoczecia:') !!}
                          <div class="">
                          {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          {!! Form::label('end_date','Data zakonczenia:') !!}
                          <div class="">
                          {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      {!! Form::submit('Zaproponuj',['class'=>'btn btn-primary']) !!}
                      </div>
                    </div>
                   {!! Form::close() !!}

             </div>

            </div>

            {{-- <div class="panel panel-default">
              <div class="panel-heading">Kalendarz spotkan</div>
              <div class="panel-body">
               

                  {!! $calendar_details->script() !!}

              </div>
            </div> --}}

            </div>
@endsection