<div class="panel panel-success">

<div class="panel-heading">
	<h3 class="panel-title">Data Master - Agama</h3>
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
			<tr>
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
	<?php echo str_replace('/?', '?', $agama->render()); ?>
	</div>
</div>


@section('modal')
	
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
        
        
        ;
		

    </script>
@endsection