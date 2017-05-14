@extends('layouts.welc')

@section('content') 
    <div class="container" style="padding-top: 100px; padding-bottom: 200px"> 
        <div class="row"> 
            <div class="col-md-12">
            <br><br>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="text-align: center;">
                                REKOMENDASI PENERIMA BANTUAN RASKIN
                            </h2>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-8">
                                <a href="{{ url ('/spk/pdf') }}" target="_blank"><button class="btn btn-primary btn-sm"><i class="fa fa-print fa-lg" aria-hidden="true"></i> Cetak Rekomendasi</button></a>
                            </div>
                            <div class="col-md-4">
                                {!! Form::open(['method'=>'GET','url'=>'/hasilseleksi','role'=>'seleksi','class'=>'control-label']) !!}
                                    <div class="input-group input-group-sm" style="float: right;">
                                        <input type="text" class="form-control" name="seleksi" placeholder="Cari..." aria-describedby="sizing-addon3">
                                        <span class="input-group-btn">
                                            <a href="{{ url ('/hasilseleksi') }}"><button class="btn btn-default btn-sm">cari</button></a>
                                            <a href="{{ url ('/hasilseleksi') }}"><button class="btn btn-info btn-sm">refresh</button></a>
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
                                            <td>{{ $kel2->vektor_v }}</td>
                                        </tr>
                                    @endif
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
                
        </div> 
    </div> 
@endsection

@section('footer')
    <!-- Footer -->
        <footer class="text-center">
            <div class="footer-below">
                <div class="container-fluid" style="background-color: rgb(217,217,217);">
                    <div class="row" style="padding-top: 25px; padding-bottom: 25px; padding-left: 60px; padding-right: 60px;">
                        <div class="navbar-header">
                            <?php $year = (new DateTime)->format("Y"); ?>
                            Copyright &copy;<?php echo $year; ?> Misdiandini Fadilla Mukti | Sistem Pendukung Keputusan Penerima Bantuan Raskin
                        </div>
                        <div class="nav navbar-top-links navbar-right">
                            <a href="{{ url('/bantuan') }}"> BANTUAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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






