@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
    <li class="active">Kelola Pengguna</li> 
</ul>
@endsection

@section('section')
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
    @endif
    </div>

    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title" style="text-align: center;"><b>Kelola Pengguna</b></h2>
            </div>

            <div class="panel-body">
                <div class="col-md-9">
                    <a href="{{ url('/register') }}">
                        <button type="button" class=" btn btn-primary">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Pengguna
                    </button>
                    </a></div>
                <div class="col-md-3">
                    {!! Form::open(['method'=>'GET','url'=>'/user','role'=>'search','class'=>'control-label']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari...">
                            <span class="input-group-btn">
                            <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            <a href="{{ route('user.index') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
                            </span>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level Pengguna</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengguna as $no => $peng)
                    <tr>
                        <td style="width: 5%">{{ $no + 1 }}</td>
                        <td>{{ $peng->name }}</td>
                        <td>{{ $peng->username }}</td>
                        <td>{{ $peng->email }}</td>
                        <td><b>{{ $peng->level }}</b></td>
                        <td>
                            <a class="btn btn-sm btn-warning btn-xs" href="{{ action('UserController@edit', ['id'=>$peng->id]) }}">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ubah
                            </a>
                            @if($peng->level != "Superadmin")
                                <form action="{{ action('UserController@destroy', ['id'=>$peng->id]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-xs" type="submit">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus
                                    </button>
                                </form>

                                <form method="POST" action="{{ action('UserController@resetpassword',$peng->id) }}" onsubmit="return confirmReset()" style="display: inline">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="put">
                                        <button class="btn btn-success btn-xs" type="submit">
                                            <span class="fa fa-recycle" aria-hidden="true"></span> reset password
                                        </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach     
                </tbody>
            </table>          
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

        function confirmReset() {
        var result = confirm('Apakah Anda yakin akan reset password akun ini?');

        if (result) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection


