@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Bobot</li>
			</ul>
			<div class="panel panel-deafult">
				<div class="panel-heading">
					<h2 class="panel-title">Bobot</h2>
				</div>
			</div>
			<div class="panel-body">
			<p><a class="btn btn-primary" href="{{ route('bobot.create') }}">Tambah Bobot</a></p>
				<h3>Data Bobot</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Bobot</th>
							<th>Bobot</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($bob as $row)
						<tr>
							<td>{{ $row->id }}</td>
							<td>{{ $row->nama_bobot }}</td>
							<td>{{ $row->bobot }}</td>
							<td>
								<a class="btn btn-warning" href="{{ action('BobotController@edit',['id'=>$row->id]) }}">Edit</a>
								
								<form action="{{ action('BobotController@destroy',['id'=>$row->id]) }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger" type="submit">
										Hapus
									</button>
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
@endsection
