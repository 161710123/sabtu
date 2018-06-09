@extends('layouts.user')
@section('content')
<br>
<br>
<br>
<div class ="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class ="card">
        <div class="card-header">Selamat Datang user</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
          
            Berhasil Masuk
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection