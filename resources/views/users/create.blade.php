@extends ('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



   <form action="{{ route('users.store') }}" method="post">
       {{ csrf_field() }}
       <div class="form-group">
           <input type="text" class="form-control" name="name" placeholder="login">
       </div>
       <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="e-mail">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="haslo">
        </div>

       <div class="form-group">
           <button class="btn btn-primary">Zapisz</button>
       </div>
   </form>
@endsection
