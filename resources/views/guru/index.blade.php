@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Berita
			  	<div class="panel-title pull-right"><a href="{{ route('gurus.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
            <style type="text/css">
              #myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}
            </style>
            <script type="text/javascript">
              function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
            </script>

			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table" id="myTable">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
			  		  <th>Foto</th>
					  <th>Nama </th>
					  <th> Mata Pelajaran</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($guru as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td><img src="{{ asset('assets/admin/images/icon/'.$data->foto )}}" style="max-height:60px; max-width: 60px; margin-top: 6px;"></td>
				    	<td>{{ $data->nama }}</td>
				    	<td>{{ $data->mapel }}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('gurus.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('gurus.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('gurus.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection