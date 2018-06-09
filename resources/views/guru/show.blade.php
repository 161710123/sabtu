@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Guru
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>

			  <div class="panel-body">
        			<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" readonly>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('mapel') ? ' has-error' : '' }}">
			  			<label class="control-label">Mata Pelajaran</label>	
			  			<input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}" readonly>
			  			@if ($errors->has('mapel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mapel') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection