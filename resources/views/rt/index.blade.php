@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Rukun Tetangga</li>
			</ul>
			<div class="panel panel-deafult">
				<div class="panel-heading">
					<h2 class="panel-title">Rukun Tetangga</h2>
				</div>
			</div>
			<div class="panel-body">
				<p><a class="btn btn-primary" href="{{ route('rt.create') }}">Tambah</a></p>
			</div>
			<div>
				<table class="table table-bordered"> 
					<thead>
						<tr>
							<th>No.</th>
							<th>RT</th>
							<th></th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($rt as $row)
						<tr>
							<td>{{ $row->id_rt }}</td>
							<td>{{ $row->rt }}</td>
							<td>
								<a class="btn btn-warning" href="{{ action('RtController@edit',['id'=>$row->id_rt]) }}">Edit</a>
							<form action="{{ action('RtController@destroy',['id'=>$row->id_rt]) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn btn-danger" type="submit">
											Hapus
										</button>
									</form></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection