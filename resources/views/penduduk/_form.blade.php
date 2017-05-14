<style type="text/css">
  input[type="radio"]:checked ~ .reveal-if-active {
    opacity: 1;
    overflow: visible;
  }
  .reveal-if-active {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transform: scale(0.8);
    transition: 0.5s;
    input[type="radio"]:checked ~ &{
      opacity: 1;
      overflow: visible;
      transform: scale(1);
    }
  }
</style>


<div class="col-md-12">
  <div class="col-md-4">
    <!-- NO KK -->
    <div class="form-group{{ $errors->has('kk_id') ? ' has-error' : '' }}">
      {!! Form::label('kk_id', 'No KK', ['class'=>'col-md-12 control-label required', 'style'=>'text-align: left']) !!}
      <div class="col-md-12">
        {!! Form::select('kk_id',$keluarga,null,['class' => 'form-control','placeholder' =>'--Nomor KK--']) !!}
        {!! $errors->first('kk_id', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

      <!-- NIK -->
    <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
        {!! Form::label('nik', 'NIK', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!} 
        <div class="col-md-12"> 
          {!! Form::text('nik', null, ['class'=>'form-control','placeholder'=>'Nomor Induk Kependudukan']) !!}
          {!! $errors->first('nik', '<p class="help-block">:message</p>') !!}
        </div> 
    </div>

    <!-- NAMA -->
    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
      {!! Form::label('nama', 'Nama', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!} 
      <div class="col-md-12"> 
        {!! Form::text('nama', null, ['class'=>'form-control','placeholder'=>'Nama Lengkap']) !!} 
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!} 
      </div> 
    </div>

      <!-- JENIS KELAMIN -->
    <div class="form-group{{ $errors->has('jk_id') ? ' has-error' : '' }}">
      {!! Form::label('jk_id', 'Jenis Kelamin', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
      <div class="col-md-12">
            @foreach($jks as $jk)
                <label>
                  {!! Form::radio('jk_id',$jk->id_jk) !!} {{ $jk->jk }}
                </label><br>
            @endforeach
          {!! $errors->first('jk_id', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <!-- TEMPAT LAHIR -->
    <div class="form-group{{ $errors->has('tl_id') ? ' has-error' : '' }}">
      {!! Form::label('tl_id', 'Tempat Lahir', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
        <div class="col-md-12">
          {!! Form::select('tl_id',$tl,null,['class' => 'form-control','placeholder' =>'--Tempat Lahir--']) !!}
          {!! $errors->first('tl_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
      
    <!-- TANGGAL LAHIR -->
    <div class="form-group{{ $errors->has('tl_id') ? ' has-error' : '' }}">
      {!! Form::label('tlahir', 'Tanggal Lahir', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
        <div class="col-md-12">
          {!! Form::text('tlahir', null, array('id' => 'datepicker','class' => 'form-control','placeholder' =>'Tanggal Lahir')) !!}
          {!! $errors->first('tlahir', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
  </div>

  <div class="col-md-4">
    <!-- GOLONGAN DARAH -->
    <div class="form-group{{ $errors->has('goldar_id') ? ' has-error' : '' }}">
      {!! Form::label('goldar_id', 'Golongan Darah', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
      <div class="col-md-12">
        {!! Form::select('goldar_id',$goldars,null,['class' => 'form-control','placeholder' =>'--Golongan Darah--']) !!}
        {!! $errors->first('goldar_id', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <!-- AGAMA -->
    <div class="form-group{{ $errors->has('agama_id') ? ' has-error' : '' }}">
      {!! Form::label('agama_id', 'Agama', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
      <div class="col-md-12">
          {!! Form::select('agama_id',$agama,null,['class' => 'form-control','placeholder' =>'--Agama--']) !!}
          {!! $errors->first('agama_id', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <!-- PENDIDIKAN -->
    <div class="form-group{{ $errors->has('pendidikan_id') ? ' has-error' : '' }}">
      {!! Form::label('pendidikan_id', 'Pendidikan', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
      <div class="col-md-12">
          {!! Form::select('pendidikan_id',$pendidikan,null,['class' => 'form-control','placeholder' =>'--Pendidikan--']) !!}
          {!! $errors->first('pendidikan_id', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <!-- PEKERJAAN -->
    <div class="form-group{{ $errors->has('pekerjaan_id') ? ' has-error' : '' }}">
      {!! Form::label('pekerjaan_id', 'Pekerjaan', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!}
      <div class="col-md-12">
          {!! Form::select('pekerjaan_id',$pekerjaan,null,['class' => 'form-control','placeholder' =>'--Pekerjaan--']) !!}
          {!! $errors->first('pekerjaan_id', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <!-- STATUS KAWIN -->
    <div class="form-group{{ $errors->has('status_kawin') ? ' has-error' : '' }}"> 
      {!! Form::label('status_kawin', 'Status Kawin', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!} 
        <div class="col-md-12">
            <label>
              {!! Form::radio('status_kawin','Belum Kawin') !!}  Belum Kawin
            </label><br>
            <label>
              {!! Form::radio('status_kawin','Kawin') !!}  Kawin
            </label><br>
            <label>
              {!! Form::radio('status_kawin','Cerai Hidup') !!}  Cerai Hidup
            </label><br>
            <label>
              {!! Form::radio('status_kawin','Cerai Mati') !!}  Cerai Mati
            </label><br>
            {!! $errors->first('status_kawin', '<p class="help-block">:message</p>') !!} 
        </div> 
    </div>
  </div>
    
  <div class="col-md-4">
    
  <!-- AKTA LAHIR -->
  <div class="form-group{{ $errors->has('akta_lahir') ? ' has-error' : '' }}"> 
    <br>{!! Form::label('akta_lahir', 'Akta Lahir', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!} 
    <div class="col-md-12">
      <label>
        {!! Form::radio('akta_lahir','Ada') !!} Ada
        <!-- NO AKTA LAHIR -->
          <div class="{{ $errors->has('akta_lahir_no') ? ' has-error' : '' }} reveal-if-active" id="ada">
                {!! Form::label('akta_lahir_no', 'Nomor Akta Lahir', ['class'=>'col-md-12']) !!} 
                <div class="col-md-12"> 
                      {!! Form::text('akta_lahir_no', null, ['class'=>'form-control','placeholder'=>'Nomor Akta Lahir']) !!} 
                      {!! $errors->first('akta_lahir_no', '<p class="help-block">:message</p>') !!} 
                </div>
              </div> 
      </label>
      <label>
            {!! Form::radio('akta_lahir','Tidak Ada') !!} Tidak Ada
      </label>
      {!! $errors->first('akta_lahir', '<p class="help-block">:message</p>') !!} 
    </div> 
  </div>
      
    <!-- AKTA KAWIN -->
  <div class="form-group{{ $errors->has('akta_kawin') ? ' has-error' : '' }}"> 
      {!! Form::label('akta_kawin', 'Akta Kawin', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!} 
      <div class="col-md-12">
          <label>
              {!! Form::radio('akta_kawin','Ada') !!} Ada
              <!-- NO AKTA LAHIR -->
              <div class="{{ $errors->has('akta_kawin_no') ? ' has-error' : '' }} reveal-if-active" id="ada">
                {!! Form::label('akta_kawin_no', 'Nomor Akta Kawin', ['class'=>'col-md-12']) !!} 
                <div class="col-md-12"> 
                    {!! Form::text('akta_kawin_no', null, ['class'=>'form-control','placeholder'=>'Nomor Akta Kawin']) !!} 
                    {!! $errors->first('akta_kawin_no', '<p class="help-block">:message</p>') !!} 
                </div> 
              </div>
          </label>
          <label>
              {!! Form::radio('akta_kawin','Tidak Ada') !!} Tidak Ada
          </label><br>
        {!! $errors->first('akta_kawin', '<p class="help-block">:message</p>') !!} 
      </div> 
  </div>

      <!-- AKTA CERAI -->
  <div class="form-group{{ $errors->has('akta_cerai') ? ' has-error' : '' }}"> 
      {!! Form::label('akta_cerai', 'Akta Cerai', ['class'=>'col-md-12 control-label', 'style'=>'text-align: left']) !!} 
      <div class="col-md-12">
        <label>
            {!! Form::radio('akta_cerai','Ada') !!} Ada
              <!-- NO AKTA LAHIR -->
              <div class="{{ $errors->has('akta_cerai_no') ? ' has-error' : '' }} reveal-if-active" id="ada">
                {!! Form::label('akta_cerai_no', 'Nomor Akta Cerai', ['class'=>'col-md-12']) !!} 
                <div class="col-md-12"> 
                    {!! Form::text('akta_cerai_no', null, ['class'=>'form-control','placeholder'=>'Nomor Akta Cerai']) !!} 
                    {!! $errors->first('akta_cerai_no', '<p class="help-block">:message</p>') !!} 
                </div> 
              </div>
          </label>
          <label>
              {!! Form::radio('akta_cerai','Tidak Ada') !!} Tidak Ada
          </label>
        {!! $errors->first('akta_cerai', '<p class="help-block">:message</p>') !!} 
        </div> 
    </div>
</div>

<div class="col-md-12">
    <br><hr>
    <!-- STATUS HUBUNGAN DALAM KELUARGA -->
    <div class="form-group{{ $errors->has('shdk_id') ? ' has-error' : '' }} col-md-4">
        {!! Form::label('shdk_id', 'SHDK', ['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
          {!! Form::select('shdk_id',$shdk,null,['class' => 'form-control','placeholder' =>'--SHDK--']) !!}
          {!! $errors->first('shdk_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
  <!-- NAMA AYAH -->
  <div class="form-group{{ $errors->has('nama_ayah') ? ' has-error' : '' }} col-md-4"> 
      {!! Form::label('nama_ayah', 'Nama Ayah', ['class'=>'col-md-4 control-label']) !!} 
      <div class="col-md-8"> 
        {!! Form::text('nama_ayah', null, ['class'=>'form-control','placeholder'=>'Nama Ayah']) !!} 
        {!! $errors->first('nama_ayah', '<p class="help-block">:message</p>') !!} 
      </div> 
  </div>

  <!-- NAMA IBU -->
  <div class="form-group{{ $errors->has('nama_ibu') ? ' has-error' : '' }} col-md-4"> 
      {!! Form::label('nama_ibu', 'Nama Ibu', ['class'=>'col-md-4 control-label']) !!} 
      <div class="col-md-8"> 
          {!! Form::text('nama_ibu', null, ['class'=>'form-control','placeholder'=>'Nama Ibu']) !!} 
          {!! $errors->first('nama_ibu', '<p class="help-block">:message</p>') !!} 
      </div> 
  </div>
</div>

<div class="col-md-12"><hr></div>
<div class="form-group col-md-10">
  <div class="col-md-2 col-md-offset-10">
    <button type="submit" class="btn btn-primary" name="simpan" >Simpan</button>
  </div>
</div>


@section('script')

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      yearRange: '1930:+0',
    });
  } );


  </script>
@endsection