@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
    <li class="active">Beranda</li> 
</ul>
@endsection

@section('section')
    {{-- HASIL SPK --}}
    <div class="col-md-12">
        @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Selamat!</strong> {{ session('sukses') }}
            </div>
        @endif
    </div>

    @if(Auth::user()->level != "Kepaladesa")
        <div class="col-md-4" style="padding: 10px; padding-bottom: 20px;">
            <center>
                <a href="{{ route('keluarga.create') }}">
                    <button type="button" class="alert alert-info" style="width: 100%; border-width: 1px ;">
                         <span class="fa fa-home fa-3x" aria-hidden="true"></span><br><br>
                         TAMBAH KELUARGA
                    </button>
                </a>
            </center>
        </div>
        <div class="col-md-4" style="padding: 10px;">
            <center>
                <a href="{{ route('penduduk.create') }}">
                    <button type="button" class="alert alert-warning" style="width: 100%; border-width: 1px ;">
                         <span class="fa fa-users fa-3x" aria-hidden="true"></span><br><br>
                        TAMBAH PENDUDUK
                    </button>
                </a>
            </center>
        </div>
        <div class="col-md-4" style="padding: 10px;">
            <center>
                <a href="{{ route('spk.create') }}">
                    <button type="button" class="alert alert-danger" style="width: 100%; border-width: 1px ;">
                         <span class="fa fa-plus-square fa-3x" aria-hidden="true"></span><br><br>
                         TAMBAH SELEKSI
                    </button>
                </a>
            </center>
        </div>
    @endif

    <div class="col-md-12">           
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title" style="text-align: center;"><b>Rekomendasi Penerima Bantuan Raskin</b></h2>
            </div>
            <div class="panel-body">
                @if(Auth::user()->level != "Kepaladesa")
                    <div class="col-md-12" id="{{ $lims->id }}">
                        <p name="lim">
                            Rekomendasi penerima bantuan raskin ditampilkan berdasarkan jumlah kuota penerima yang ditentukan. Kuota saat ini: {{ $lims->lim }} orang. <span class="hide">{{ $lims->lim }}</span> 
                            <button class="btn btn-default btn-xs" style="" name="ubahkuota">
                                <b>Klik untuk ubah kuota</b>
                            </button>
                        </p>
                        <hr>
                    </div>
                @endif
                <div class="col-md-9">
                    <a href="{{ url ('/spk/pdf') }}" target="_blank"><button class="btn btn-success"><i class="fa fa-print fa-lg" aria-hidden="true"></i> Cetak Rekomendasi</button></a>
                </div>
                <div class="col-md-3">
                    {!! Form::open(['method'=>'GET','url'=>'/home','role'=>'seleksi','class'=>'control-label']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="seleksi" placeholder="Cari...">
                            <span class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                <a href="{{ url ('/home') }}"><button class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></button></a>
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
                        {{-- <th>Hasil Akhir</th> --}}
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keluarga2 as $no => $kel2)
                        @if($kel2->vektor_s != NULL AND $kel2->shdk_id == 1)
                            <tr>
                                <td style="width: 5%">{{ $no + 1 }}</td>
                                <td>{{ $kel2->no_kk }}</td>
                                <td>{{ $kel2->nama }}</td>
                                <td>RT {{ $kel2->rt }}/RW {{ $kel2->rw }}, {{ $kel2->alamat }}</td>
                                {{-- <td>{{ $kel2->vektor_v }}</td> --}}
                                <td>
                                    <a class="btn btn-sm btn-success btn-xs" href="{{ action('SpkController@show',['id'=>$kel2->id_kk]) }}">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> lihat
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach   
                </tbody>
            </table>
            {{-- {{ $keluarga2->appends(['keluarga2' => $keluarga2->currentPage()])->links() }} --}}
        </div>
    </div>
@endsection

@section('modal')
    <!-- UBAH KUOTA -->
    <div id="kuota" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('LimController@update',$lims->id) }}"> {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Ubah Kuota Penerima Bantuan Raskin</h4>
                    </div>
                        
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label class="col-md-5 control-label" style="text-align: right;">Kuota Penerima Raskin:</label>
                            <div class="col-md-5">
                                <input type="number" name="lim" class="form-control" value="" min="1" max="{{ $jumz }}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" name="batal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
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

        $(document)
        // KUOTA
        .on('click', 'button[name="ubahkuota"]', function() {
            var id = $(this).parents('div').first().attr('id');
            var lim = $(this).parents('div').first().find('p[name="lim"]').find('span').text();
            $('#kuota input[name="id"]').val(id);
            $('#kuota input[name="lim"]').val(lim);
            $('#kuota').removeClass('fade');
            $('#kuota').show();
        })

        .on('click', 'button[name="batal"], .close-modal', function() {
            $('.modal').hide();
            
        })
        ;

    </script>
@endsection






