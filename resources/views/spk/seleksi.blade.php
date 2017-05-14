@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
    <li><a href="{{ url('/home') }}">Beranda</a></li> 
    <li class="active">Seleksi SPK</li> 
</ul>
@endsection

@section('section')
    <div class="col-md-12" style="padding-top: 10px;">
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
                <h2 class="panel-title" style="text-align: center;"><b>Hasil Ranking Seleksi Raskin</b></h2>
            </div>
            <div class="panel-body">
                <div class="col-md-9">
                    @if(Auth::user()->level != "Kepaladesa")
                        <a href="{{ route('spk.create') }}">
                            <button type="button" class=" btn btn-primary">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Seleksi Raskin
                            </button>
                        </a>
                    @endif
                    {{-- <a href="{{ url ('/spk/pdf') }}" target="_blank"><button class="btn btn-success"><i class="fa fa-print fa-lg" aria-hidden="true"></i> Cetak Seleksi</button></a> --}}
                </div>
                <div class="col-md-3">
                    {!! Form::open(['method'=>'GET','url'=>'/seleksi','role'=>'search','class'=>'control-label']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari...">
                            <span class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                <a href="{{ url ('/seleksi') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
                            </span>
                        </div>
                    {!! Form::close() !!}
                </div>
                            
                </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Hasil Akhir</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keluarga as $no => $kel)
                                @if($kel->shdk_id == 1)
                                    <tr>
                                        <td style="width: 5%">{{ $no + 1 }}</td>
                                        <td>{{ $kel->no_kk }}</td>
                                        <td>{{ $kel->nama }}</td>
                                        <td>{{ $kel->rt }}/{{ $kel->rw }}, {{ $kel->alamat }}</td>
                                        <td>
                                            @if($kel->vektor_v == NULL)
                                                0
                                            @else
                                                {{ $kel->vektor_v }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success btn-xs" href="{{ action('SpkController@show',['id'=>$kel->id_kk]) }}">
                                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> lihat
                                            </a>
                                            @if(Auth::user()->level != "Kepaladesa")
                                                <a class="btn btn-sm btn-warning btn-xs" href="{{ action('SpkController@edit',['id'=>$kel->id_kk]) }}">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ubah
                                                </a>

                                                <form action="{{ action('SpkController@destroy', ['id'=>$kel->id_kk]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-xs" type="submit">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach   
                        </tbody>
                    </table>
                    {{ $keluarga->appends(['keluarga' => $keluarga->currentPage()])->links() }}
                </div> 
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

    </script>
@endsection






