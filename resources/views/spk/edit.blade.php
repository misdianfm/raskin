@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Beranda</a></li>
	<li><a href="{{ url('/seleksi') }}">Seleksi</a></li> 
    <li class="active">Ubah Seleksi</li> 
	</ul>
@endsection

@section('section')
	<div class="col-md-7">
		<div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title" style="text-align: center;"><b>Ubah Seleksi</b></h2>
            </div>
            <div class="panel-body">
            	<div> 
					{!! Form::model($spk,array('action' => ['SpkController@update','id'=>$kelz->id_kk])) !!}
						<input type="hidden" name="_method" value="PUT">
	
						<div class="form-group col-md-10{{ $errors->has('kk_id') ? ' has-error' : '' }}">
					    	{!! Form::label('kk_id', 'Nomor KK', ['class'=>'col-md-3 control-label']) !!} 
						    <div class="col-md-8"> 
						        {!! Form::text('kk_id', $kelz->no_kk, ['class'=>'form-control', 'readonly']) !!} 
						        {!! $errors->first('kk_id', '<p class="help-block">:message</p>') !!} 
						    </div>
					    </div>

						@foreach($kriteria as $krit)
							<div class="form-group col-md-10{{ $errors->has('variabel_id.'.$krit->id) ? ' has-error' : '' }}">
								{{ $krit->kriteria }}<br>
								@foreach($variz as $vari)
									@if($vari->kriteria_id == $krit->id)
										@if(in_array($vari->id, $spk))
											{!! Form::radio('variabel_id['.$krit->id.']',$vari->id, true) !!} {{ $vari->variabel }}
											<br>
										@else
											{!! Form::radio('variabel_id['.$krit->id.']',$vari->id) !!} {{ $vari->variabel }}
											<br>
										@endif
									@endif
								@endforeach
								{!! $errors->first('variabel_id.'.$krit->id, '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}<br>
							</div>
						@endforeach

						<div class="form-group col-md-10">
							<div class="col-md-9"></div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary" name="simpan" >Simpan</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
            </div>
        </div>
	</div>

	
@endsection


