@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Kriteria</li>
			</ul>
			<div class="panel panel-deafult">
				<div class="panel-heading">
					<h2 class="panel-title">Keluarga</h2>
				</div>
			</div>
			<div class="panel-body">
			<p><a class="btn btn-primary" href="{{ route('kriteria.create') }}">Tambah Kriteria</a></p>
				<h3>Data Kriteria</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kriteria</th>
							<th>Bobot Kriteria</th>
							<th>Tipe Keuntungan</th>
							<th>Bobot Awal</th>
							<th>Bobot Baru (Wj)</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($krit as $row)
						<tr>
							<td>{{ $row->id }}</td>
							<td>{{ $row->kriteria }}</td>
							<td>{{ $row->bobot->nama_bobot }}</td>
							<td>{{ $row->tipe }}</td>
							<td>{{ $row->bobot->bobot }}</td>
							<td>
								{{ $wj = $row->bobot->bobot/$jumbot }}
								
							</td>
							<td>
								<a class="btn btn-warning" href="{{ action('KriteriaController@edit',['id'=>$row->id]) }}">Edit</a>
								
								<form action="{{ action('KriteriaController@destroy',['id'=>$row->id]) }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger" type="submit">
										Hapus
									</button>
								</form>

								<p><a class="btn btn-primary" href="{{ route('variabel.create') }}">Tambah Variabel</a></p>
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
