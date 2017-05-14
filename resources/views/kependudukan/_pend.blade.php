@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb" id="top">
		<li><a href="{{url('/home')}}">Dashboard</a></li>
		<li class="active">Data Master Kependudukan</li>
	</ul>
@endsection

@section('section')
<div class="container" style="padding-bottom: 100px;">
	<div class="row" style="background-color: rgb(245, 245, 245); border-bottom-color: rgb(221, 221, 221);">
		<div class="col-md-12">
			<div class="col-md-12">
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
				@elseif ($errors->has('tl'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong>  {!! $errors->first('tl', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@elseif ($errors->has('agama'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong>  {!! $errors->first('agama', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@elseif ($errors->has('pendidikan'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong>  {!! $errors->first('pendidikan', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@elseif ($errors->has('pekerjaan'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong> {!! $errors->first('pekerjaan', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@elseif ($errors->has('shdk'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong> {!! $errors->first('shdk', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@elseif ($errors->has('rt'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong> {!! $errors->first('rt', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@elseif ($errors->has('rw'))
				<div class="alert alert-danger" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Gagal!</strong> {!! $errors->first('rw', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
				</div>
				@endif
			</div>

			<div class="page-header">
				 <h3 style="text-align: center;">Data Kependudukan</h3>
			</div>

<!-- TEMPAT LAHIR -->
				<div class="col-md-6" id="tempat_lahir">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Tempat Lahir</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							{!! Form::model($tl,array('action' => 'TlController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('tl', null, ['class'=>'form-control','placeholder'=>'Tambah Tempat Lahir']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tempat Lahir</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($tl as $no => $row1)
								<tr id="{{ $row1->id_tl }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="tl">{{ $row1->tl }}</td>
									<td style="width: 25%">

									<button type="button" name="edit" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>
									

										<form action="{{ action('TlController@destroy',['id'=>$row1->id_tl]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $tl->appends(['tempatlahir' => $tl->currentPage()])->links() }}
						
						</div>
					</div>
				</div>

<!-- AGAMA -->				
				<div class="col-md-6" id="agama">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Agama</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							{!! Form::model($agama,array('action' => 'AgamaController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('agama', null, ['class'=>'form-control','placeholder'=>'Tambah Agama']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Agama</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($agama as $no => $row)
								<tr id="{{ $row->id_agama }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="agama">{{ $row->agama }}</td>
									<td style="width: 25%">
										<button type="button" name="agama" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>

										<form action="{{ action('AgamaController@destroy',['id'=>$row->id_agama]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $agama->appends(['agama'=>$agama->currentPage()])->links() }}
						</div>
					</div>
				</div>

<!-- PENDIDIKAN -->
				<div class="col-md-6" id="pendidikan">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Pendidikan</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							{!! Form::model($pendidikan,array('action' => 'PendidikanController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('pendidikan', null, ['class'=>'form-control','placeholder'=>'Tambah Pendidikan']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Pendidikan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($pendidikan as $no => $pends)
								<tr id="{{ $pends->id_pendidikan }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="pendidikan">{{ $pends->pendidikan }}</td>
									<td style="width: 25%">
										<button type="button" name="pendidikan" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>

										<form action="{{ action('PendidikanController@destroy',['id'=>$pends->id_pendidikan]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $pendidikan->appends(['pendidikan'=>$pendidikan->currentPage()])->links() }}
						</div>
					</div>
				</div>

<!-- PEKERJAAN -->
				<div class="col-md-6" id="pekerjaan">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Pekerjaan</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							{!! Form::model($pekerjaan,array('action' => 'PekerjaanController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('pekerjaan', null, ['class'=>'form-control','placeholder'=>'Tambah Pekerjaan']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Pekerjaan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($pekerjaan as $no => $pek)
								<tr id="{{ $pek->id_pekerjaan }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="pekerjaan">{{ $pek->pekerjaan }}</td>
									<td style="width: 25%">
										<button type="button" name="pekerjaan" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>

										<form action="{{ action('PekerjaanController@destroy',['id'=>$pek->id_pekerjaan]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $pekerjaan->appends(['pekerjaan'=>$pekerjaan->currentPage()])->links() }}
						</div>
					</div>
				</div>

<!-- SHDK -->
				<div class="col-md-6" id="shdk">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Status Hubungan Dalam Keluarga (SHDK)</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							{!! Form::model($shdk,array('action' => 'ShdkController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('shdk', null, ['class'=>'form-control','placeholder'=>'Tambah SHDK']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>SHDK</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($shdk as $no => $shdks)
								<tr id="{{ $shdks->id_shdk }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="shdk">{{ $shdks->shdk }}</td>
									<td style="width: 25%">
										<button type="button" name="shdk" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>

										<form action="{{ action('ShdkController@destroy',['id'=>$shdks->id_shdk]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $shdk->appends(['shdk'=>$shdk->currentPage()])->links() }}
						</div>
					</div>
				</div>

<!-- RT -->
				<div class="col-md-3" id="rt">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Rukun Tetangga (RT)</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-12">
							{!! Form::model($rt,array('action' => 'RtController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('rt', null, ['class'=>'form-control','placeholder'=>'Tambah RT']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>RT</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($rt as $no => $rts)
								<tr id="{{ $rts->id_rt }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="rt">{{ $rts->rt }}</td>
									<td style="width: 40%">
										<button type="button" name="rt" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>

										<form action="{{ action('RtController@destroy',['id'=>$rts->id_rt]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $rt->appends(['rt'=>$rt->currentPage()])->links() }}
						</div>
					</div>
				</div>

<!-- RW -->
				<div class="col-md-3" id="rw">
					<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Rukun Warga (RW)</h3>
					</div>

					<div class="panel-body">
						<div class="col-md-12">
							{!! Form::model($rw,array('action' => 'RwController@store', 'role'=>'form','class'=>'control-label')) !!}
								<div class="input-group">
									{!! Form::text('rw', null, ['class'=>'form-control','placeholder'=>'Tambah RW']) !!}
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</span>
								</div>
							{!! Form::close() !!}
						</div>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>RW</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($rw as $no => $rws)
								<tr id="{{ $rws->id_rw }}">
									<td style="width: 5%">{{ $no + 1 }}</td>
									<td name="rw">{{ $rws->rw }}</td>
									<td style="width: 40%">
										<button type="button" name="rw" class="btn btn-sm btn-warning btn-xs">
					                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					                    </button>

										<form action="{{ action('RwController@destroy',['id'=>$rws->id_rw]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
						{{ $rw->appends(['rw'=>$rw->currentPage()])->links() }}

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
<!-- EDIT TEMPAT LAHIR -->
	<div id="put" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('TlController@update',$row1->id_tl) }}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_tl" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Tempat Lahir</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">Tempat Lahir</label>
						    <div class="col-md-8">
						    	<input type="text" name="tl" class="form-control" value="">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>

                    </div>

				</form>
            </div>
        </div>
    </div>

<!-- EDIT AGAMA -->
    <div id="ag" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('AgamaController@update',$row->id_agama) }}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_agama" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Agama</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">Agama</label>
						    <div class="col-md-8">
						    	<input type="text" name="agama" class="form-control" value="">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
				</form>
            </div>
        </div>
    </div>


<!-- EDIT PENDIDIKAN -->
    <div id="pendidikan" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            @foreach($pendidikan as $pends)
         <form class="form-horizontal" role="form" method="POST" action="{{ action('PendidikanController@update',$pends->id_pendidikan) }}"> {!! csrf_field() !!}
@endforeach
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_pendidikan" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Pendidikan</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">Pendidikan</label>
						    <div class="col-md-8">
						    	<input type="text" name="pendidikan" class="form-control" value="">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- EDIT PEKERJAAN -->
    <div id="pekerjaan" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('PekerjaanController@update',$pek->id_pekerjaan) }}" id="edit_{{$pek->id_pekerjaan}}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_pekerjaan" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Pekerjaan</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">Pekerjaan</label>
						    <div class="col-md-8">
						    	<input type="text" name="pekerjaan" class="form-control" value="{{$pek->pekerjaan}}">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- EDIT SHDK -->
    <div id="shdk" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('ShdkController@update',$shdks->id_shdk) }}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_shdk" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Status Hubungan Dalam Keluarga</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">SHDK</label>
						    <div class="col-md-8">
						    	<input type="text" name="shdk" class="form-control" value="{{$shdks->shdk}}">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- EDIT RT -->
    <div id="rt" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('RtController@update',$rts->id_rt) }}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_rt" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Rukun Tetangga</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">RT</label>
						    <div class="col-md-8">
						    	<input type="text" name="rt" class="form-control" value="">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
                            <i class="fa fa-btn fa-save"></i> Simpan
                        </button>
                    </div>
				</form>
            </div>
        </div>
    </div>

<!-- EDIT RW -->
    <div id="rw" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
         <form class="form-horizontal" role="form" method="POST" action="{{ action('RwController@update',$rws->id_rw) }}"> {!! csrf_field() !!}

                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id_rw" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Rukun Warga</h4>
                    </div>
						

					<div class="modal-body">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group row">
					    	<label class="col-md-3 control-label">RW</label>
						    <div class="col-md-8">
						    	<input type="text" name="rw" class="form-control" value="">
						    </div>
					    </div>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">
                            <i class="fa fa-btn fa-ban"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="simpan">
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
    	function confirmDelete() {
		var result = confirm('Apakah Anda yakin akan menghapus data ini?');

		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}

		$(document)
        
        //TEMPAT LAHIR
        .on('click', 'button[name="edit"]', function() {
            var id = $(this).parents('tr').first().attr('id'); //get id parameter
            var tl = $(this).parents('tr').first().find('td[name="tl"]').text();
            $('#put input[name="id_tl"]').val(id);
            $('#put input[name="tl"]').val(tl);
            $('#put').removeClass('fade');
            $('#put').show();
        })

        //AGAMA
        .on('click', 'button[name="agama"]', function() {
            var id = $(this).parents('tr').first().attr('id'); //get id parameter
            var agama = $(this).parents('tr').first().find('td[name="agama"]').text();
            $('#ag input[name="id_agama"]').val(id);
            $('#ag input[name="agama"]').val(agama);
            $('#ag').removeClass('fade');
            $('#ag').show();
        })
        
        //PENDIDIKAN
        .on('click', 'button[name="pendidikan"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var pendidikan = $(this).parents('tr').first().find('td[name="pendidikan"]').text();
            $('#pendidikan input[name="id_pendidikan"]').val(id);
            $('#pendidikan input[name="pendidikan"]').val(pendidikan);
            $('#pendidikan').removeClass('fade');
            $('#pendidikan').show();
        })
        
        //PEKERJAAN
        .on('click', 'button[name="pekerjaan"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var pekerjaan = $(this).parents('tr').first().find('td[name="pekerjaan"]').text();
            $('#pekerjaan input[name="id_pekerjaan"]').val(id);
            $('#pekerjaan input[name="pekerjaan"]').val(pekerjaan);
            $('#pekerjaan').removeClass('fade');
            $('#pekerjaan').show();
        })

        //SHDK
        .on('click', 'button[name="shdk"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var shdk = $(this).parents('tr').first().find('td[name="shdk"]').text();
            $('#shdk input[name="id_shdk"]').val(id);
            $('#shdk input[name="shdk"]').val(shdk);
            $('#shdk').removeClass('fade');
            $('#shdk').show();
        })

        //RT
        .on('click', 'button[name="rt"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var rt = $(this).parents('tr').first().find('td[name="rt"]').text();
            $('#rt input[name="id_rt"]').val(id);
            $('#rt input[name="rt"]').val(rt);
            $('#rt').removeClass('fade');
            $('#rt').show();
        })

        //RW
        .on('click', 'button[name="rw"]', function() {
            var id = $(this).parents('tr').first().attr('id');
            var rw = $(this).parents('tr').first().find('td[name="rw"]').text();
            $('#rw input[name="id_rw"]').val(id);
            $('#rw input[name="rw"]').val(rw);
            $('#rw').removeClass('fade');
            $('#rw').show();
        })

        .on('click', 'button[name="batal"], .close-modal', function() {
            $('.modal').hide();
            
        })
        ;
		

    </script>
@endsection
