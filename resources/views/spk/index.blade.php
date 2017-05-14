@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Beranda</a></li> 
	<li class="active">Kriteria SPK</li> 
</ul>
@endsection

@section('section')
	{{-- SUKSESGAGAL --}}
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
		@elseif ($errors->has('kriteria'))
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Gagal!</strong>  {!! $errors->first('kriteria', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
			</div>
		@elseif ($errors->has('bobot'))
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
		@endif
	</div>

@if(Auth::user()->level == "Kepaladesa")
	<div class="col-md-8">
@else	
	<div class="col-md-6">
@endif
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2 class="panel-title" style="text-align: center;">
						<b>Kriteria Penerima Bantuan Raskin</b>
					</h2>
				</div>
						
				@foreach($kriteria as $no => $krit)
					<li class="list-group-item">
						<a id="{{ $krit->id }}" data-toggle="collapse" href="#{{ $krit->id }}A" aria-expanded="false" aria-controls="{{ $krit->id }}A" data-target="#{{ $krit->id }}A">
							<b style="width: 90%">C{{ $no + 1 }}. {{ $krit->kriteria }}</b>
							<span class="fa fa-caret-down" style="float: right;"></span>
				        </a>
				        <div class="collapse" id="{{ $krit->id }}A" aria-expanded="false">
				           	<hr>
							<div class="col-md-6" id="{{ $krit->id }}">
								<b>Bobot Kriteria = {{ $krit->bobot }}</b><br>
								<b name="tipe">Jenis Atribut = {{ $krit->tipe }}</b>
							</div>
							@if(Auth::user()->level != "Kepaladesa")
				       		<div class="btn-group" style="float: right;">
								<a href="#" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Aksi/Tindakan
								</a>
								<a href="#" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li>
										    <button class="btn btn-default" style="border: 0;" name="tambahvar">Tambah Nilai Kriteria</button>
										</li>
										<li class="divider"></li>
										<li>
										    <div id="{{ $krit->id }}">
										    	<p class="hide" name="kriteria_id"><span class="hide">{{ $krit->id }}</span></p>
												<p class="hide" name="kriteria"><span class="hide">{{ $krit->kriteria }}</span></p>
												<p class="hide" name="bobot"><span class="hide">{{ $krit->bobot }}</span>{{ $krit->bobot }}</p>
												<p class="hide" name="tipe"><span class="hide">{{ $krit->tipe }}</span>{{ $krit->tipe }}</p>
												<button class="btn btn-default" style="border: 0;" name="editkriteria">Ubah Kriteria</button>
											</div>
										</li>
										<li>
										    <form action="{{ action('KriteriaController@destroy',['id'=>$krit->id]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
													<button class="btn btn-default" type="submit" style="border: 0;">
														<center>Hapus Kriteria</center>
													</button>
											</form>
										</li>
									</ul>
							</div>
							@endif
				            <table class="table table-bordered table-hover">
				                <thead>
				                	<tr>
				                		<th>Nilai Kriteria</th>
				                		<th>Bobot</th>
				                		@if(Auth::user()->level != "Kepaladesa")
				                			<th></th>
				                		@endif
				                	</tr>
				                </thead>
				                <tbody>
				                	@foreach($vari as $no => $varz)
						                @if($varz->kriteria_id == $krit->id)
						                	<tr id="{{ $varz->id }}">
						                		<td name="variabel">{{ $varz->variabel }}</td>
						                		<td name="bobott"><span class="hide">{{ $varz->bobot }}</span>{{ $varz->bobot }}</td>
						                		<td class="hide" name="kriteriaa"><span class="hide">{{ $krit->id }}</span>{{ $krit->id }}</td>
						                		@if(Auth::user()->level != "Kepaladesa")
						                		<td>
						                			<button type="button" name="variabel" class="btn btn-warning btn-xs">
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
						                		@endif
						                	</tr>
						                @endif
					                @endforeach
				                </tbody>
				            </table>
				        </div>
					</li>
				@endforeach
			</div>
		</div>		
	</div>

	@if(Auth::user()->level != "Kepaladesa")
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title" style="text-align: center;">
					Tambah Kriteria
				</h2>
			</div>
			<div class="panel-body">
				{!! Form::model($kriteria,array('action' => 'KriteriaController@store', 'role'=>'form', 'class'=>'form-horizontal')) !!}
					<div class="form-group{{ $errors->has('kriteria') ? ' has-error' : '' }}">
						{!! Form::label('kriteria', 'Kriteria', ['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-8">
							{!! Form::text('kriteria', null, ['class'=>'form-control','placeholder'=>'Kriteria']) !!}
							{!! $errors->first('kriteria', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="form-group{{ $errors->has('bobot_id') ? ' has-error' : '' }}">
						{!! Form::label('bobot_id', 'Bobot Kriteria', ['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-8">
							{!! Form::number('bobot_id', null, ['class'=>'form-control', 'max'=>'10', 'min'=>'0', 'placeholder'=>'Bobot Kriteria']) !!}
								<small><i>*skor bobot dapat diisi dari 0 s.d. 10</i></small>
							{!! $errors->first('kriteria', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

							
					<div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
						{!! Form::label('tipe', 'Jenis Atribut', ['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-8">
							{{ Form::select('tipe', array('Biaya' => 'Biaya', 'Keuntungan' => 'Keuntungan'), null, array('class'=>'form-control','placeholder' =>'--Jenis Atribut--' )) }}
							{!! $errors->first('tipe', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
							
					<div class="col-md-12"><hr></div>

					<div class="form-group{{ $errors->has('variabel2') ? ' has-error' : '' }}">
						{!! Form::label('variabel2', 'Nilai Kriteria', ['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-8">
							{!! Form::text('variabel2', null, ['class'=>'form-control','placeholder'=>'Nilai Kriteria']) !!}
							{!! $errors->first('variabel2', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
								    
					<div class="form-group{{ $errors->has('bobot2') ? ' has-error' : '' }}">
						{!! Form::label('bobot2', 'Bobot Nilai Kriteria', ['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-8">
							{!! Form::number('bobot2', null, ['class'=>'form-control', 'max'=>'10', 'min'=>'0', 'placeholder'=>'Bobot Nilai Kriteria']) !!}
								<small><i>*skor bobot dapat diisi dari 0 s.d. 10<br><br></i></small>
							{!! $errors->first('bobot2', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="form-group"> 
			            <div class="col-md-6 col-md-offset-3"> 
			                <button type="submit" class="btn btn-primary"> 
			                    Simpan 
			                </button> 
			            </div> 
			        </div>
		                    
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@endif
@endsection


@section('modal')
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

						    <label class="col-md-3 control-label">Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::text('variabel', null, ['class'=>'form-control','placeholder'=>'Nilai Kriteria']) !!}<br>
						    </div>

						    <input type="hidden" name="kriteria_id" class="form-control" value=""><br>

						    <label class="col-md-3 control-label">Bobot Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::number('bobot', null, ['class'=>'form-control', 'max'=>'10', 'min'=>'0','placeholder'=>'Bobot Nilai Kriteria']) !!}
								<small><i>*skor bobot dapat diisi dari 0 s.d. 10<br></i></small>
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

<!-- EDIT VARIABEL -->
    <div id="vari" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            	@foreach($vari as $no => $varz)
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

						    <label class="col-md-3 control-label">Nilai Kriteria</label>
						    <div class="col-md-8">
						    	<input type="text" name="variabel" class="form-control" value=""><br>
						    </div>

						    <input type="hidden" name="kriteria_id" class="form-control" value="">

						    <label class="col-md-3 control-label">Bobot Nilai Kriteria</label>
						    <div class="col-md-8">
						    	{!! Form::number('bobot', null, ['class'=>'form-control', 'max'=>'10', 'min'=>'0','placeholder'=>'Bobot Nilai Kriteria']) !!}
								<small><i>*skor bobot dapat diisi dari 0 s.d. 10<br></i></small>
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

<!-- EDIT KRITERIA -->
    <div id="editkriteria" class="modal fade" role="dialog" >
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
                        <h4 class="modal-title">Ubah Kriteria</h4>
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
						    	{!! Form::number('bobot', null, ['class'=>'form-control', 'max'=>'10', 'min'=>'0','placeholder'=>'Bobot Nilai Kriteria']) !!}
								<small><i>*skor bobot dapat diisi dari 0 s.d. 10<br></i></small>
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

        // TAMBAH VARIABEL
        .on('click', 'button[name="tambahvar"]', function() {
        	var id = $(this).parents('div').first().attr('id');
           	var kriteria_id = $(this).parents('div').first().find('p[name="kriteria_id"]').find('span').text();
            $('#tambah2 input[name="id"]').val();
            $('#tambah2 input[name="kriteria_id"]').val(kriteria_id);
            $('#tambah2 input[name="variabel"]').val();
            $('#tambah2 input[name="bobot_id"]').val();
            $('#tambah2').removeClass('fade');
            $('#tambah2').show();
        })

        //KRITERIA
        .on('click', 'button[name="editkriteria"]', function() {
            var id = $(this).parents('div').first().attr('id');
            var kriteria = $(this).parents('div').first().find('p[name="kriteria"]').text();
            var bobot_id = $(this).parents('div').first().find('p[name="bobot"]').find('span').text();
            var tipe = $(this).parents('div').first().find('p[name="tipe"]').find('span').text();
            $('#editkriteria input[name="id"]').val(id);
            $('#editkriteria input[name="kriteria"]').val(kriteria);
            $('#editkriteria input[name="bobot"]').val(bobot_id);
            $('#editkriteria select[name="tipe"]').val(tipe);
            $('#editkriteria').removeClass('fade');
            $('#editkriteria').show();
        })
        
        //VARIABEL
        .on('click', 'button[name="variabel"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var variabel = $(this).parents('tr').first().find('td[name="variabel"]').text();
            var bobot_id = $(this).parents('tr').first().find('td[name="bobott"]').find('span').text();
            var kriteria_id = $(this).parents('tr').first().find('td[name="kriteriaa"]').find('span').text();
            $('#vari input[name="id"]').val(id);
            $('#vari input[name="variabel"]').val(variabel);
            $('#vari input[name="bobot"]').val(bobot_id);
            $('#vari input[name="kriteria_id"]').val(kriteria_id);
            $('#vari').removeClass('fade');
            $('#vari').show();
        })
        
        
        .on('click', 'button[name="batal"], .close-modal', function() {
            $('.modal').hide();
            
        })
        ;
		

    </script>
@endsection
