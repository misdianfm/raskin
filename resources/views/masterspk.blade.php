@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb" id="top">
		<li><a href="{{url('/home')}}">Beranda</a></li>
		<li class="active">Data Master SPK</li>
	</ul>
@endsection

@section('section')
<div class="container col-lg-12" style="padding-bottom: 100px;">
	<div class="row"{{--  style="background-color: rgb(245, 245, 245); border-bottom-color: rgb(221, 221, 221);" --}}>
		<div class="col-md-12">
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
				<!-- @elseif ($errors->has('nama_bobot'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('nama_bobot', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@elseif ($errors->has('bobot'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('bobot', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div> -->
				@elseif ($errors->has('kriteria'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('kriteria', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@elseif ($errors->has('bobot_id'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('bobot_id', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@elseif ($errors->has('tipe'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('tipe', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@elseif ($errors->has('variabel'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('variabel', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@elseif ($errors->has('kriteria_id'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('kriteria_id', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@elseif ($errors->has('bobot_id'))
					<div class="alert alert-danger" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>
					    <strong>Gagal!</strong>  {!! $errors->first('bobot_id', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
					</div>
				@endif
			</div>

			<!-- <div class="page-header">
				 <h3 style="text-align: center;">Data Master SPK</h3>
			</div> -->

<!-- BOBOT -->
			<!--<div class="col-md-8">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2 class="panel-title" style="text-align: center;"><b>BOBOT PREFERENSI</b></h2>
					</div>

					<div class="panel-body">
						<div class="col-md-12">
						<b>Tambah Bobot Preferensi</b>
						<hr>
						{!! Form::model($bobot,array('action' => 'BobotController@store', 'role'=>'form','class'=>'form-inline')) !!}
							<div class="form-group">
								{!! Form::text('nama_bobot', null, ['class'=>'form-control','placeholder'=>'Nama Bobot']) !!}
								{!! Form::number('bobot', null, ['class'=>'form-control','placeholder'=>'Bobot']) !!}
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah</span>
								</button>
							</div>
						{!! Form::close() !!}
						</div>
					</div>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Bobot Preferensi</th>
									<th>Nilai Bobot</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							
								@foreach($bobot as $no => $bobots)
								<tr id="{{ $bobots->id }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="nama_bobot">{{ $bobots->nama_bobot }}</td>
									<td name="bobot">{{ $bobots->bobot }}</td>
									<td style="width: 25%">
										<button type="button" name="bobot" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>
										<form action="{{ action('BobotController@destroy',['id'=>$bobots->id]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger btn-xs" type="submit">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div style="padding: 10px;">
							{{ $bobot->appends(['bobot' => $bobot->currentPage()])->links() }}
						</div>
						
				</div>
			</div>
		-->
<!-- KRITERIA -->
			<div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2 class="panel-title" style="text-align: center;"><b>KRITERIA</b></h2>
						
					</div>

					<div class="panel-body">
						<br>
						<div class="col-md-9">
							<button type="submit" name="tambahkrit" class="btn btn-primary">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Kriteria</span>
							</button>
						</div>
						<div class="col-md-3">
							{!! Form::open(['method'=>'GET','url'=>'/spk','role'=>'search','class'=>'control-label']) !!}
							<div class="input-group">
							  <input type="text" class="form-control" name="search" placeholder="Cari...">
							  <span class="input-group-btn">
							  	<button class="btn btn-default"><i class="fa fa-search"></i></button>
							  	<a href="{{ route('spk.index') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
							  </span>
							</div>
							{!! Form::close() !!}
						</div>
					</div>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kriteria</th>
									<th>Bobot</th>
									<th>Jenis Atribut</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach($kriteria as $no => $krit)
								<tr id="{{ $krit->id }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="kriteria">{{ $krit->kriteria }}</td>
									<td name="bobot_id"><span class="hide" >{{ $krit->bobot->id }}</span>{{ $krit->bobot->bobot }}</td>
									<td name="tipe"><span class="hide" >{{ $krit->tipe }}</span>{{ $krit->tipe }}</td>
									<td style="width: 10%">

									<button type="button" name="kriteria" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>
									

										<form action="{{ action('KriteriaController@destroy',['id'=>$krit->id]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger btn-xs" type="submit">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						
					<div class="panel-body">
						{{ $kriteria->appends(['kriteria' => $kriteria->currentPage()])->links() }}
					</div>
				</div>
			</div>

<!-- VARIABEL -->
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2 class="panel-title" style="text-align: center;"><b>Nilai Kriteria</b></h2>
					</div>

					<div class="panel-body">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<button type="submit" name="tambahvar" class="btn btn-primary">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Nilai Kriteria</span>
							</button>
						</div>
						<!--<div class="col-md-3">
							{!! Form::open(['method'=>'GET','url'=>'/spk','role'=>'search','class'=>'control-label']) !!}
							<div class="input-group">
							  <input type="text" class="form-control" name="search" placeholder="Cari...">
							  <span class="input-group-btn">
							  	<button class="btn btn-default"><i class="fa fa-search"></i></button>
							  	<a href="{{ route('spk.index') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
							  </span>
							</div>
							{!! Form::close() !!}
						</div>-->
					</div>
						<!-- <div class="col-md-12">
						<b>Tambah Variabel</b>
						<hr>
						{!! Form::model($variabel,array('action' => 'VariabelController@store', 'role'=>'form','class'=>'form-inline')) !!}
							<div class="form-group">
								{{ Form::select('kriteria_id', $kri , null, ['class'=>'form-control col-md-2','placeholder' =>'--Kriteria--']) }}

								{!! Form::text('variabel', null, ['class'=>'form-control','placeholder'=>'Variabel']) !!}

								{!! Form::select('bobot_id',$bob,null,['class' => 'form-control','placeholder' =>'--Bobot--']) !!}
								
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah</span>
								</button>
							</div>
						{!! Form::close() !!}
						<hr>
						</div> -->

						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kriteria</th>
									<th>Nilai Kriteria</th>
									<th>Bobot Nilai Kriteria</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($variabel as $no => $varz)
								<tr id="{{ $varz->id }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="kriteriaa"><span class="hide" >{{ $varz->kriteria->id }}</span>{{ $varz->kriteria->kriteria }}</td>
									<td name="variabel">{{ $varz->variabel }}</td>
									<td name="bobott"><span class="hide" >{{ $varz->bobot->id }}</span>{{ $varz->bobot->nama_bobot }} ({{ $varz->bobot->bobot }})</td>
									<td  style="width: 10%">

										<button type="button" name="variabel" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>
									

										<form action="{{ action('VariabelController@destroy',['id'=>$varz->id]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger btn-xs" type="submit">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div style="padding: 10px;">
							{{ $variabel->appends(['variabel' => $variabel->currentPage()])->links() }}
						</div>
				</div>
			</div>

			<div class="col-md-2 col-md-offset-10" style="padding: 10px;">
				<a href="#top">
					<i class="fa fa-arrow-circle-o-up fa-5x" style="text-align: right; width: 100px;" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<!-- TAMBAH KRITERIA -->
    <div id="tambah" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            
            	<form class="form-horizontal" role="form" method="POST" action="{{ action('KriteriaController@store') }}">
            		<input type="hidden" name="_method" value="post">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tambah Kriteria</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	
						    <label class="col-md-3 control-label">Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::text('kriteria', null, ['class'=>'form-control','placeholder'=>'Kriteria']) !!}
						    	<br>
						    </div>

						    <label class="col-md-3 control-label">Bobot</label>
						    <div class="col-md-8">
						    	{!! Form::select('bobot_id',$bob,null,['class' => 'form-control','placeholder' =>'--Nilai--']) !!}<br>
						    </div>

						    <label class="col-md-3 control-label">Jenis Atribut</label>
						    <div class="col-md-8">
						    	{{ Form::select('tipe', array('Biaya' => 'Biaya', 'Keuntungan' => 'Keuntungan'), null, array('class'=>'form-control','placeholder' =>'--Jenis Atribut--' )) }}<br>
						    </div>

						    <div class="col-md-12"><hr></div>

						    <label class="col-md-3 control-label">Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::text('variabel', null, ['class'=>'form-control','placeholder'=>'Variabel']) !!}<br>
						    </div>

						    <label class="col-md-3 control-label">Bobot Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::select('bobot',$bob,null,['class' => 'form-control','placeholder' =>'--Bobot--']) !!}
						    </div>

					    </div>
					</div>


								
					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- TAMBAH VARIABEL -->
    <div id="tambah2" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            
            	<form class="form-horizontal" role="form" method="POST" action="{{ action('VariabelController@store') }}">
            		<input type="hidden" name="_method" value="post">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tambah Nilai Kriteria</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	
						    <label class="col-md-3 control-label">Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::select('kriteria_id', $kri , null, ['class'=>'form-control col-md-2','placeholder' =>'--Kriteria--']) !!}<br>
						    </div>
						    <br>
						    <label class="col-md-3 control-label"><br>Nilai Kriteria</label>
						    <div class="col-md-8">
						    	<br>{!! Form::text('variabel', null, ['class'=>'form-control','placeholder'=>'Variabel']) !!}<br>
						    </div>

						    <label class="col-md-3 control-label">Bobot Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::select('bobot',$bob,null,['class' => 'form-control','placeholder' =>'--Bobot--']) !!}
						    </div>

					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- EDIT VARIABEL -->
    <div id="vari" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            	@foreach($variabel as $no => $varz)
	        	<form class="form-horizontal" role="form" method="POST" action="{{ action('VariabelController@update',$varz->id) }}"> {!! csrf_field() !!}
	        	@endforeach
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Ubah Nilai Kriteria</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	
						    <label class="col-md-3 control-label">Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::select('kriteria_id',$kri,null,['class' => 'form-control','placeholder' =>'--Kriteria--','id' => 'bobot_id']) !!}
						    	<br>
						    </div>

						    <label class="col-md-3 control-label">Nilai Kriteria</label>
						    <div class="col-md-8">
						    	<input type="text" name="variabel" class="form-control" value=""><br>
						    </div>

						    <label class="col-md-3 control-label">Bobot Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::select('bobot_id',$bob,null,['class' => 'form-control','placeholder' =>'--Bobot--','id' => 'bobot_id']) !!}
						    	<br>
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- EDIT BOBOT -->
    <div id="bobot" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('BobotController@update',$bobots->id) }}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Bobot</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">Nama Bobot</label>
						    <div class="col-md-8">
						    	<input type="text" name="nama_bobot" class="form-control" value=""><br>
						    </div>
						    <label class="col-md-3 control-label">Bobot</label>
						    <div class="col-md-8">
						    	<input type="number" name="bobot" class="form-control" value=""><br>
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
				</form>
            </div>
        </div>
    </div>


<!-- EDIT KRITERIA -->
    <div id="kriteria" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            @foreach($kriteria as $no => $krit)
         	<form class="form-horizontal" role="form" method="POST" action="{{ action('KriteriaController@update',$krit->id) }}"> {!! csrf_field() !!}
         	@endforeach
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Kriteria</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">Kriteria</label>
						    <div class="col-md-8">
						    	<input type="text" name="kriteria" class="form-control" value=""><br>
						    </div>
						    <label class="col-md-3 control-label">Bobot</label>
						    <div class="col-md-8">
						    	{!! Form::select('bobot_id',$bob,null,['class' => 'form-control','placeholder' =>'--Nilai--','id' => 'bobot_id']) !!}
						    	<br>
						    </div>
						    <label class="col-md-3 control-label">Jenis Atribut</label>
						    <div class="col-md-8">
						    	{{ Form::select('tipe', array('Biaya' => 'Biaya', 'Keuntungan' => 'Keuntungan'), null, array('class'=>'form-control','placeholder' =>'--Jenis Atribut--' )) }}
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
				</form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
    	function confirmDelete() {
		var result = confirm('Apakah Anda yakin akan menghapus data ini?');

		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}

		$(document)

        // TAMBAH KRITERIA
        .on('click', 'button[name="tambahkrit"]', function() {
            $('#tambah input[name="id"]').val();
            $('#tambah input[name="kriteria"]').val();
            $('#tambah select[name="bobot_id"]').val();
            $('#tambah select[name="tipe"]').val();
            $('#tambah input[name="variabel"]').val();
            $('#tambah select[name="bobot"]').val();
            $('#tambah').removeClass('fade');
            $('#tambah').show();
        })

        // TAMBAH VARIABEL
        .on('click', 'button[name="tambahvar"]', function() {
            $('#tambah2 input[name="id"]').val();
            $('#tambah2 input[name="kriteria_id"]').val();
            $('#tambah2 input[name="variabel"]').val();
            $('#tambah2 select[name="bobot_id"]').val();
            $('#tambah2').removeClass('fade');
            $('#tambah2').show();
        })


        //BOBOT
        .on('click', 'button[name="bobot"]', function() {
            var id = $(this).parents('tr').first().attr('id'); 
            var nama_bobot = $(this).parents('tr').first().find('td[name="nama_bobot"]').text();
            var bobot = $(this).parents('tr').first().find('td[name="bobot"]').text();
            $('#bobot input[name="id"]').val(id);
            $('#bobot input[name="nama_bobot"]').val(nama_bobot);
            $('#bobot input[name="bobot"]').val(bobot);
            $('#bobot').removeClass('fade');
            $('#bobot').show();
        })

        //KRITERIA
        .on('click', 'button[name="kriteria"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var kriteria = $(this).parents('tr').first().find('td[name="kriteria"]').text();
            var bobot_id = $(this).parents('tr').first().find('td[name="bobot_id"]').find('span').text();
            var tipe = $(this).parents('tr').first().find('td[name="tipe"]').find('span').text();
            $('#kriteria input[name="id"]').val(id);
            $('#kriteria input[name="kriteria"]').val(kriteria);
            $('#kriteria select[name="bobot_id"]').val(bobot_id);
            $('#kriteria select[name="tipe"]').val(tipe);
            $('#kriteria').removeClass('fade');
            $('#kriteria').show();
        })
        
        //VARIABEL
        .on('click', 'button[name="variabel"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var variabel = $(this).parents('tr').first().find('td[name="variabel"]').text();
            var bobot_id = $(this).parents('tr').first().find('td[name="bobott"]').find('span').text();
            var kriteria_id = $(this).parents('tr').first().find('td[name="kriteriaa"]').find('span').text();
            $('#vari input[name="id"]').val(id);
            $('#vari input[name="variabel"]').val(variabel);
            $('#vari select[name="bobot_id"]').val(bobot_id);
            $('#vari select[name="kriteria_id"]').val(kriteria_id);
            $('#vari').removeClass('fade');
            $('#vari').show();
        })
        
        
        .on('click', 'button[name="batal"], .close-modal', function() {
            $('.modal').hide();
            
        })
        ;
		

    </script>
@endsection
