<div class="form-group{{ $errors->has('variabel') ? ' has-error' : '' }}"> 
	{!! Form::label('variabel', 'Variabel', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::text('variabel', null, ['class'=>'form-control']) !!} 
		{!! $errors->first('variabel', '<p class="help-block">:message</p>') !!} 
	</div> 
</div>

<div class="form-group{{ $errors->has('kriteria_id') ? ' has-error' : '' }}">
  {!! Form::label('kriteria_id', 'Kriteria', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
  	{!! Form::select('kriteria_id',$krit,null,['class' => 'form-control','placeholder' =>'--Kriteria--']) !!}
  	{!! $errors->first('kriteria_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('bobot_id') ? ' has-error' : '' }}">
  {!! Form::label('bobot_id', 'Bobot', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
  	{!! Form::select('bobot_id',$bob,null,['class' => 'form-control','placeholder' =>'--Bobot--']) !!}
  	{!! $errors->first('bobot_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group"> 
	<div class="col-md-4 col-md-offset-2"> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
	</div> 
</div>