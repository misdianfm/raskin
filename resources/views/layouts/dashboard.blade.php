@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/') }}">SPK Penerima Bantuan Raskin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff;">
                    {{Auth::user()->name}}
                   <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('/pengaturan') }}"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
                        </li>
                        <li><a href="{{ url('/bantuan') }}"><i class="fa fa-question-circle fa-fw"></i> Bantuan</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search" hidden="">
                            <div>
                                <center>
                                    <img src="{{url('images/seleksi.JPG')}}" width="220px" height="80px;">
                                </center>
                            </div>
                            
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/home') ? 'class="active"' : '') }}>
                            <a href="{{ url ('home') }}"><i class="glyphicon glyphicon-home"> </i> Beranda</a>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> SPK<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url ('/spk') }}">Kriteria</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/perhitunganspk') }}">Perhitungan</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/seleksi') }}">Hasil Seleksi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Kependudukan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url ('/keluarga') }}">Keluarga</a>
                                </li>
                                <li>
                                    <a href="{{ url ('/penduduk') }}">Penduduk</a>
                                </li>
                                @if(Auth::user()->level != "Kepaladesa")
                                <li>
                                    <a href="{{ url ('/kependudukan') }}">Data Master Kependudukan <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level"><a href="{{ url ('/kependudukan') }}" class="hide"></a>
                                        <li>
                                            <a href="{{ url ('/kependudukan/') }}"><span class="fa fa-caret-right"></span> Tempat Lahir</a>
                                        </li>
                                        <li>
                                            <a href="{{ url ('/kependudukan/') }}"><span class="fa fa-caret-right"></span> Agama</a>
                                        </li>
                                        <li>
                                            <a href="{{ url ('/kependudukan/#pendidikan') }}"><span class="fa fa-caret-right"></span> Pendidikan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url ('/kependudukan/#pekerjaan') }}"><span class="fa fa-caret-right"></span> Pekerjaan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url ('/kependudukan/#shdk') }}"><span class="fa fa-caret-right"></span> Status Hubungan Dalam Keluarga</a>
                                        </li>
                                        <li>
                                            <a href="{{ url ('/kependudukan/#rt') }}"><span class="fa fa-caret-right"></span> RT</a>
                                        </li>
                                        <li>
                                            <a href="{{ url ('/kependudukan/#rw') }}"><span class="fa fa-caret-right"></span> RW</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                @endif
                            </ul>
                        </li>
                        @if(Auth::user()->level == "Superadmin")
                        <li>
                            <a href="{{ url ('/user') }}"><i class="fa fa-users"></i> Kelola Pengguna</span></a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h5 class="page-header">@yield('page_heading')</h5>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row"> 
                <div class="col-lg-12" style="padding-bottom: 100px;"> 
				    @yield('section')
                </div>
            </div>
            <!-- /#page-wrapper -->
            <div class="row col-lg-12">
                <div id="footer">
                    <center>
                        <br>
                        <i>Copyright &copy; <?php echo date('Y'); ?> by Misdiandini Fadilla Mukti & Desa Pasir Wetan.<br/><br/></i>
                    </center>
                </div>
            </div>
            
        </div>

        <!-- footer -->
        <!-- Footer -->
        <!-- <footer class="text-center">
            <div class="footer-below">
                <div class="container-fluid" style="background-color: rgb(217,217,217);">
                    <div class="row" style="padding: 25px;">
                        <div>
                            
                        </div>
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
        </footer> -->
    </div>
@stop

