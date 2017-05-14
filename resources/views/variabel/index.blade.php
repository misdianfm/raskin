@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Dashboard</a></li> 
	<li class="active">Kriteria SPK</li> 
</ul>
@endsection

@section('section') 
	<div class="container"> 
		<div class="row"  style="background-color: rgb(245, 245, 245); border-bottom-color: rgb(221, 221, 221);"> 
			<div class="col-md-12">
			<br>
			
			<br><hr>
				<div class="col-md-12" >
					<div class="panel panel-default">
					  <div class="panel-body">
					  APA
					  
					  	<table class="table table-striped">
							@foreach($vari as $no => $varz)
								<tr>
									<td colspan="3">Kriteria{{ $varz->kriteria->kriteria }}</td>
								</tr>
								<tr>
									<td>No{{ $no + 1 }}</td>
									<td>Vari{{ $varz->variabel }}</td>
									<td>Bobot{{ $varz->bobot->nama_bobot }} ({{ $varz->bobot->bobot }})</td>
								</tr>
								@endforeach
							
						</table>
					  </div>
					</div>
				</div>
			</div>
			
				
		</div> 
	</div> 
@endsection



