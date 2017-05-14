<div class="panel panel-success">

<div class="panel-heading">
	<h3 class="panel-title">Data Master - Tempat Lahir</h3>
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
			@foreach($tl as $no => $row)
			<tr>
				<td style="width: 5%">{{ $no + 1 }}</td>
				<td name="tl">{{ $row->tl }}</td>
				<td style="width: 25%">
					<button type="button" name="edit" class="btn btn-sm btn-warning btn-xs">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </button>

					<form action="{{ action('TlController@destroy',['id'=>$row->id_tl]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
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
	<?php echo str_replace('/?', '?', $tl->render()); ?>
	</div>
</div>


