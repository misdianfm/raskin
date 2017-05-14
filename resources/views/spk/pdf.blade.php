<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Hasil Seleksi Penerima Raskin</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
  
            <div style="font-family:Arial; font-size:12px;">
                <p>
                    <center>
                        <h2>Hasil Seleksi Penerima Raskin</h2>
                        <h2>Menggunakan Metode <i>Weighted Product</i></h2>
                        <h3><i>Desa Pasir Wetan, Kecamatan Karanglewas, Banyumas</i></h3>
                    </center>
                    <hr>
                </p> 
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">Ranking</th>
                <th class="tg-3wr7">Nomor KK</th>
                <th class="tg-3wr7">Kepala Keluarga</th>
                <th class="tg-3wr7">Alamat</th>
                <th class="tg-3wr7">Hasil Akhir</th>
              </tr>
              @foreach ($spk as $no => $kel)
                  @if($kel->shdk_id == 1)
                  <tr>
                    <td class="tg-rv4w" width="5%" width="">{{ $no + 1 }}</td>
                    <td class="tg-rv4w" width="25%">{{ $kel->no_kk }}</td>
                    <td class="tg-rv4w" width="25%">{{ $kel->nama }}</td>
                    <td class="tg-rv4w" width="25%">{{ $kel->rt }}/{{ $kel->rw }}, {{ $kel->alamat }}</td>
                    <td class="tg-rv4w" width="20%" >{{ $kel->vektor_v }}</td>
                  </tr>@endif
              @endforeach
            </table>
        </body>
    </head>
</html>