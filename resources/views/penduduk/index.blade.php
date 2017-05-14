@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb">
		<li><a href="{{url('/home')}}">Beranda</a></li>
		<li class="active">Data Penduduk</li>
	</ul>
@endsection

@section('section')
<div class="col-md-12" style="padding-top: 10px;">
		@if (session('sukses'))
			<div class="alert alert-success" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			    </button>
			    <strong>Selamat!</strong> {{ session('sukses') }}
			</div>
		@elseif (session('hapus'))
			<div class="alert alert-success" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			    </button>
			  	<strong>{{ session('hapus') }}</strong> 
			</div>
		@endif
</div>
<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h2 class="panel-title" style="text-align: center;"><b>DATA PENDUDUK</b></h2>
		</div>
		<div class="panel-body">
			<!-- FUNGSI PENCARIAN -->
			<div class="col-md-9">
				@if(Auth::user()->level != "Kepaladesa")
					<a href="{{ route('penduduk.create') }}">
			            <button type="button" class="btn btn-primary">
			                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Penduduk
			            </button>
			        </a>
				@endif
			</div>
			<div class="col-md-3"><br>
				{!! Form::open(['method'=>'GET','url'=>'/penduduk','role'=>'search','class'=>'control-label']) !!}
					<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="Cari...">
						<span class="input-group-btn">
						  	<button class="btn btn-default"><i class="fa fa-search"></i></button>
						  	<a href="{{ route('penduduk.index') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
						</span>
					</div>
				{!! Form::close() !!}
			</div>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIK</th>
					<th>Nomor KK</th>
					<th>Status Hubungan</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($penduduk as $no => $row)
				<tr>
					<td>{{ $no + 1 }}</td>
					<td>{{ $row->nik }}</td>
					<td>{{ $row->kk->no_kk }}</td>
					<td>{{ $row->shdk}}</td>
					<td>{{ $row->nama }}</td>
					<td>{{ $row->jk }}</td>
					<td>
						<a class="btn btn-success btn-xs" href="{{ action('PendudukController@show',['id'=>$row->id_penduduk]) }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> lihat
						</a>

						@if(Auth::user()->level != "Kepaladesa")
							<a class="btn btn-warning btn-xs" href="{{ action('PendudukController@edit',['id'=>$row->id_penduduk]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ubah</a>

							@if($row->shdk_id != "1")
							<form action="{{ action('PendudukController@destroy',['id'=>$row->id_penduduk]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-danger btn-xs" type="submit">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus
								</button>
							</form>@endif
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<?php echo str_replace('/?', '?', $penduduk->render()); ?>
	</div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
    	$(document).ready(function() {
            var table = $("#keluarga").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('data') }}",
                columns: [
                  { data: 'id_kk', name: 'keluargas.id_kk' },
                  { data: 'no_kk', name: 'keluargas.no_kk' },
                  { data: 'alamat', name: 'keluargas.alamat' },
                  { data: 'rt', name: 'rts.rt' },
                  { data: 'rw', name: 'rws.rw' },
                  { data: 'action', 'searchable': false, 'orderable':false }
               ]
            });
        });

        function confirmDelete() {
		var result = confirm('Apakah Anda yakin akan menghapus data ini?');

		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}
    </script>
@endsection
