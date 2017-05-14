@extends('layouts.welc')

@section('jekweri')
<script src="{{url('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("div").click(function(){
            $("p").toggle();
        });
    });
</script>
@endsection

@section('content') 
<div class="container-fluid" style="padding-top: 60px;  background-color: #2c3e50; " >
    <div class="col-md-8 col-md-offset-2" style="color: #ffffff; font-family: Lora,Baskerville,Georgia,Times,serif;">
    <br><br>
        <h1>Menu Bantuan</h1>
        <h3>Sistem Pendukung Keputusan Penerima Bantuan Raskin</h3>
        <br>
        <a href="{{ url('/') }}">
            <button type="button" class="btn btn-lg" style="border-color: #ffffff; color: #ffffff; background-color: transparent;">
                Kembali ke Beranda
            </button>
        </a>
    <br><br>
    </div>
</div>
 {{-- #149c82#d5f1f6 --}}
<div class="container-fluid huruf" style="padding-top: 50px;">
    <div class="row"> 
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default"  style="text-align: center;">
                <ul class="list-group">
                @if(Auth::guest())
                    @include('bantuan._guest')
                @elseif(Auth::user()->level == "Kepaladesa")
                    @include('bantuan._kepaladesa')
                @else
                    @include('bantuan._adm')
                @endif
                </ul>
            </div>
            
        </div>
        <div class="col-md-1"></div>
    </div> 
<br><br><br><br><br>
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

    
