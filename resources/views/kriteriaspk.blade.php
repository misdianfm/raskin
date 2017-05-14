@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Beranda</a></li> 
	<li class="active">Kriteria SPK</li> 
</ul>
@endsection

@section('section') 
	<div class="container" style="padding-bottom: 100px;">

		<div class="row" > 
			<div class="col-md-8" style="background-color: rgb(245, 245, 245);border-bottom-color: rgb(221, 221, 221);">
				<div class="page-header">
				  <h3 style="text-align: center;">Kriteria SPK</h3>
				</div> 
				
				@foreach($kriteria as $krit)
				<div class="col-md-10" >
					<div class="panel panel-success">
					  <!-- Default panel contents -->
					  <div class="panel-heading">
					  		<h2 class="panel-title" style="text-align: center;">
								<b>{{ $krit->kriteria }}</b>
							</h2>
					  </div>

					  <!-- List group -->
					  <ul class="list-group">
					  	@foreach($vari as $no => $varz)
						  	@if($varz->kriteria_id == $krit->id)
						    <li class="list-group-item">
						    	<b>{{ $varz->variabel }}</b> - <i>{{ $varz->bobot->nama_bobot }} ({{ $varz->bobot->bobot }})</i>
						    </li>
						    @endif
					    @endforeach
					  </ul>
					</div>
				</div>
				@endforeach
			</div>	
		</div> 
	</div> 
@endsection



