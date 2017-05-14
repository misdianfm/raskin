{{-- <div class="form-group col-md-10{{ $errors->has('kk_id') ? ' has-error' : '' }}"> 
	{!! Form::label('kk_id', 'Nomor KK', ['class'=>'col-md-3 control-label required']) !!}
      <div class="col-md-8">
        {!! Form::select('kk_id',$keluarga,null,['class' => 'form-control','placeholder' =>'--Nomor KK--']) !!}
         
        {!! $errors->first('kk_id', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
        <br>
	</div>
	<br> 
</div> --}}


<div class="form-group col-md-10{{ $errors->has('kk_id') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Nomor KK</label>
	<select class="form-control col-md-8" name="kk_id">
		<option value="" selected disabled>-- Pilih Nomor KK --</option>
		@foreach($keluarga2 as $keles)
			<option value="{{$keles->id_kk}}">{{$keles->no_kk}} - {{$keles->nama}}</option>
		@endforeach
	</select>
	<br>{!! $errors->first('kk_id', '<p class="help-block" style="color: rgb(244, 100, 95); display: inline;">:message</p>') !!}
</div>


@foreach($kriteria as $krit)
<div class="form-group col-md-10{{ $errors->has('variabel_id.'.$krit->id) ? ' has-error' : '' }}">
	<b>{{ $krit->kriteria }}</b><br>
	@foreach($variz as $vari)
		@if($vari->kriteria_id == $krit->id)
		{!! Form::radio('variabel_id['.$krit->id.']',$vari->id) !!} {{ $vari->variabel }}
		<br>
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
