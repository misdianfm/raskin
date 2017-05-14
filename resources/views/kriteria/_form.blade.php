<div class="form-group{{ $errors->has('kriteria') ? ' has-error' : '' }}"> 
	{!! Form::label('kriteria', 'Kriteria', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::text('kriteria', null, ['class'=>'form-control']) !!} 
		{!! $errors->first('kriteria', '<p class="help-block">:message</p>') !!} 
	</div> 
</div>

<div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }}"> 
	{!! Form::label('nilai', 'Bobot Kriteria', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		@foreach($bobots as $bobot)
  		<label>
  			{!! Form::radio('bobot_id',$bobot->id) !!}{{ $bobot->nama_bobot }}
  		</label>
  		@endforeach 
		{!! $errors->first('nilai', '<p class="help-block">:message</p>') !!} 
	</div> 
</div>

<div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}"> 
	{!! Form::label('tipe', 'Tipe Keuntungan', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-10"> 
		<label>
			{!! Form::radio('tipe','Biaya') !!}Biaya
		</label>
		<label>
			{!! Form::radio('tipe','Keuntungan') !!}Keuntungan
		</label>

		{!! $errors->first('tipe', '<p class="help-block">:message</p>') !!} 
	</div> 
</div>

<div class="form-group"> 
	<div class="col-md-4 col-md-offset-2"> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
	</div> 
</div>