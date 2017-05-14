@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb">
	<li><a href="{{url('/home')}}">Beranda</a></li>
	<li class="active">Keluarga</li>
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
			<h2 class="panel-title" style="text-align: center;"><b>DATA KELUARGA</b></h2>
		</div>
		<div class="panel-body">
			<div class="col-md-9">
				@if(Auth::user()->level != "Kepaladesa")
					<a href="{{ route('keluarga.create') }}">
	                    <button type="button" class="btn btn-primary">
	                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Keluarga
			            </button>
	                </a>
				@endif
			</div>
			<div class="col-md-3"><br>
				{!! Form::open(['method'=>'GET','url'=>'/keluarga','role'=>'search','class'=>'control-label']) !!}
				<div class="input-group">
				  	<input type="text" class="form-control" name="search" placeholder="Cari...">
				  	<span class="input-group-btn">
						<button class="btn btn-default"><i class="fa fa-search"></i></button>
						<a href="{{ route('keluarga.index') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
				  	</span>
				</div>
				{!! Form::close() !!}
			</div>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nomor KK</th>
					<th>Kepala Keluarga</th>
					<th>Alamat</th>
					<th>RT</th>
					<th>RW</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($kel as $no => $row)
				<tr id="{{ $row->id_kk }}">
					<td>{{ $no+1 }}</td>
					<td name="no_kk">{{ $row->no_kk }}</td>
					<td>{{ $row->nama }}</td>
					<td name="alamat">{{ $row->alamat }}</td>
					<td name="rt">{{ $row->rt }}</td>
					<td name="rw">{{ $row->rw }}</td>
					<td>
						<a class="btn btn-sm btn-success btn-xs" href="{{ action('KeluargaController@show',['id'=>$row->id_kk]) }}">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> lihat
						</a>
								
						@if(Auth::user()->level != "Kepaladesa")
							<a class="btn btn-warning btn-xs" href="{{ action('KeluargaController@edit',['id'=>$row->id_kk]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ubah</a>

							<form action="{{ action('KeluargaController@destroy',['id'=>$row->id_kk]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-danger btn-xs" type="submit">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus
								</button>
							</form>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<?php echo str_replace('/?', '?', $kel->render()); ?>
	</div>
</div>
@endsection

@section('modal')
	<div id="post" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/keluarga') }}">
                	{{ csrf_field() }}
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tambah Data Keluarga</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group"> 
							{!! Form::label('no_kk', 'Nomor KK :', ['class'=>'col-md-3 control-label']) !!} 
							<div class="col-md-8"> 
								{!! Form::text('no_kk', null, ['class'=>'form-control']) !!} 
							</div> 
						</div>

						<div class="form-group"> 
							{!! Form::label('alamat', 'Alamat :', ['class'=>'col-md-3 control-label']) !!} 
							<div class="col-md-8"> 
								{!! Form::text('alamat', null, ['class'=>'form-control']) !!} 
							</div> 
						</div>

						<div class="form-group">
						  {!! Form::label('rt_id', 'RT :', ['class'=>'col-md-3 control-label']) !!}
						  <div class="col-md-8">
						  	{!! Form::select('rt_id',$rt,null,['class' => 'form-control','placeholder' =>'-RT-']) !!}
						  </div>
						</div>

						<div class="form-group">
						  {!! Form::label('rw_id', 'RW :', ['class'=>'col-md-3 control-label']) !!}
						  <div class="col-md-8">
						    {!! Form::select('rw_id',$rw,null,['class' => 'form-control','placeholder' =>'-RW-']) !!}						    
						  </div>
						</div>

                    </div>
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT DATA KELUARGA -->
    <div id="put" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/keluarga') }}"> {!! csrf_field() !!}

                
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tambah Data Keluarga</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group"> 
							{!! Form::label('no_kk', 'Nomor KK :', ['class'=>'col-md-3 control-label']) !!} 
							<div class="col-md-8"> 
								{!! Form::text('no_kk', null, ['class'=>'form-control']) !!} 
							</div> 
						</div>

						<div class="form-group"> 
							{!! Form::label('alamat', 'Alamat :', ['class'=>'col-md-3 control-label']) !!} 
							<div class="col-md-8"> 
								{!! Form::text('alamat', null, ['class'=>'form-control']) !!} 
							</div> 
						</div>

						<div class="form-group">
						  {!! Form::label('rt_id', 'RT :', ['class'=>'col-md-3 control-label']) !!}
						  <div class="col-md-8">
						  	{!! Form::select('rt_id',$rt,null,['class' => 'form-control','placeholder' =>'-RT-']) !!}
						  </div>
						</div>

						<div class="form-group">
						  {!! Form::label('rw_id', 'RW :', ['class'=>'col-md-3 control-label']) !!}
						  <div class="col-md-8">
						    {!! Form::select('rw_id',$rw,null,['class' => 'form-control','placeholder' =>'-RW-']) !!}						    
						  </div>
						</div>

                    </div>
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript">        
        $(document)
        
        .on('click', 'button[name="tambahkel"]', function() {
        	
        	var id_kk = $(this).parents('tr').first().attr('id_kk'); //get id parameter
            var no_kk= $(this).parents('tr').first().find('td[name="no_kk"]').text();
            var alamat = $(this).parents('tr').first().find('td[name="alamat"]').text();
            var rt_id = $(this).parents('tr').first().find('td[name="rt_id"]').text();
            var rw_id = $(this).parents('tr').first().find('td[name="rw_id"]').text();
            $('#post input[name="id_kk"]').val('');
            $('#post input[name="no_kk"]').val('');
            $('#post input[name="alamat"]').val('');
            $('#post input[name="rt_id"]').val('');
            $('#post input[name="rw_id"]').val('');
            $('#post').removeClass('fade');
            $('#post').show();
        })

        .on('click', 'button[name="ubahkel"]', function() {
        	
        	var id = $(this).parents('tr').first().attr('id_kk'); //get id parameter
            var no_kk= $(this).parents('tr').first().find('td[name="no_kk"]').text();
            var alamat = $(this).parents('tr').first().find('td[name="alamat"]').text();
            var rt = $(this).parents('tr').first().find('td[name="rt"]').text();
            var rw = $(this).parents('tr').first().find('td[name="rw"]').text();
            $('#put input[name="id_kk"]').val(id);
            $('#put input[name="no_kk"]').val(no_kk);
            $('#put input[name="alamat"]').val(alamat);
            $('#put input[name="rt_id"]').val(rt);
            $('#put input[name="rw_id"]').val(rw);
            $('#put').removeClass('fade');
            $('#put').show();

            /*var id = $(this).parents('tr').first().attr('id'); //get id parameter
            var nama_parameter = $(this).parents('tr').first().find('td[name="nama_parameter"]').text();
            var nilai_angka = $(this).parents('tr').first().find('td[name="nilai_angka"]').text();
            var satuan= $(this).parents('tr').first().find('td[name="satuan"]').text();
            $('#put input[name="id"]').val(id);
            $('#put input[name="nama_parameter"]').val(nama_parameter);
            $('#put input[name="nilai_angka"]').val(nilai_angka);
            $('#put input[name="satuan"]').val(satuan);
            $('#put').removeClass('fade');
            $('#put').show();*/
        })

        .on('click', 'button[name="batal"], .close-modal', function() {
            $('.modal').hide();
        })
        ;

        function confirmDelete() {
		var result = confirm('Menghapus data ini akan menghapus data yang bersangkutan. Apakah Anda yakin akan menghapus data ini?');

		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}
    </script>
@endsection