<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <litle></litle>
    <style>
        .page {
          width: 210mm;
          min-height: 297mm;
          padding: 15mm;
          margin: 15mm auto;
          border: 1px #D3D3D3 solid;
          border-radius: 5px;
          background: white;
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
          position: relative;
        }

          table tr td {
            font-size: 13px;
          }
          table tr .text {
            text-align: center;
            font-size: 17px;
          }
          table tr .text2 {
            text-align: center;
          }
          table tr .text3 {
            text-align: left;
          }
          table tr .text4 {
            text-align: center;
            font-size: 15px;
          }
      </style>
</head> 
<body>
  <div class="page">
  <center>
      <table>
        <tr>
          <td><img src="manado.png" width="100" height="110" ></td>
          <td>
            <center>
              <font size="4"><b> PEMERINTAH KOTA MANADO </b></font><br>
              <font size="5"><b> BADAN KESATUAN BANGSA DAN POLIIK </b></font><br>
              <font size="2"><b> Jl. Balai Kota No. 1 Tikala Ares Manado </b></font>
            </center>
          </td>
        </tr>
        <tr>
            <td colspan="10"><hr></td>
        </tr>
      </table>
      <table width="610"> 
        <tr>
            <td class="text"><b><u> REKOMENDASI </u></b></td>
        </tr>
        <tr>
          <td class="text4"> Nomor : B.05/BKBP/REK/02/I/2023</td>
        </tr>
      </table>
      <br>
      <table border="1">
        <tr align="justify">
          <td width="70">Membaca :</td>
          <td width="525">
          Surat dari : <b>{{$penelitian->nama_pemohon}}</b> Nomor: 123. Tanggal: 2024-01-26. Perihal: Rekomendasi Penelitian.  
          </td>
        </tr>
      </table>
      <table border="1">
        <tr align="justify">
          <td width="70">Mengingat : </td>
          <td width="525"> <ol>
            <li> 
              Undang-Undang No. 23 Tahun 2014 tentang Pemerintahan Daerah sebagaimana telah diubah beberapa kali terakhir dengan Undang-Undang No. 9 Tahun 2015 tentang perubahan Kedua atas Undang0Undang No. 23 Tahun 2014 tentang Pemerintahan Daerah. 
            </li>
            <li> 
              Peraturan Menteri Dalam Negeri No. 7 Tahun 2014 tentang Perubahan Atas Peraturan Menteri dalam Negeri Republik Indonesia No. 64 Tahun 2011 tentang Pedoman Penerbitan Rekomendasi Penelitian.
            </li>
            <li>
              Peraturan Daerah Kota Manado No. 1 Tahun 2019 tentang Perubahan Atas Peraturan Daerah Kota Manado No. 2 Tahun 2016 tentang Pembentukan dan susunan Perangkat Daerah Kota Manado. 
            </li>
            <li>
              Peraturan Walikota Manado No. 51 Tahun 2022 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Perangkat Daerah.
            </li>
            </ol></td>
        </tr>
      </table>
      <table width="607">
        <tr>
          <td>Merekomendasikan Bahwa:</td>
        </tr>
      </table>
      <table widht="607">
        <tr>
          <td width="100"></td>
          <td width="120"> <b>Nama</b></td>
          <td width="365"><b>: {{$penelitian->nama_pemohon}}</b></td>
        </tr>
        <tr>
          <td width="100"></td>
          <td width="120"> <b>NIM</b></td>
          <td width="365"><b>: {{$penelitian->nim}}</b></td>
        </tr>
        <tr>
          <td width="100"></td>
          <td width="120"> <b>Lokasi</b></td>
          <td width="365"><b>: {{$penelitian->lokasi}}</b></td>
        </tr>
        <tr>
          <td width="100"></td>
          <td width="120"> <b>Waktu (Lamanya)</b></td>
          <td width="365"><b>: {{$penelitian->waktu}}</b></td>
        </tr>
        <tr>
          <td width="100"></td>
          <td width="120"> <b>Penanggung Jawab</b></td>
          <td width="365"><b>: {{$penelitian->penanggung_jawab}}</b></td>
        </tr>
      </table>
    </table>
    <table width="607">
      <tr>
        <td>Demikian Rekomendasi Penelitian ini diberikan kepada yang bersangkutan dengan ketentuan sebagai berikut:</td>
      </tr>
    </table>
    <table>
      <tr>
        <td width="600" align="justify"> <ol>
          <li> 
          Menjaga keamanan dan ketertiban serta menghormati tata tertib yang berlaku selama mengadakan penelitian.
          </li>
          <li> 
          Tidak dibenarkan melaksanakan kegiatan menyimpang dari maksud diatas  
          </li>
          <li>Selesai mengadakan penelitian agar melapor kembali dan menyerahkan hasil penelitian secara tertulis kepada Badan Kesatuan Bangsa dan Politik Kota Manado.</li>
          <li>Kepada pejabat yang berwenang kiranya dapat memberikan bantuan seperlunya.</li>
          <li>Rekomendasi penelitian ini akan dicabut dan dinyatakan tidak berlaku lagi, apabila ternyata pemegang surat rekomendasi penelitian ini tidak mentaati / mengindahkan ketentuan tersebut diatas.</li>
        </ol></td>
      </tr>
    </table>
    <table widht="607">
      <tr>
        <td width="170"></td>
        <td width="120"> <b>Dikeluarkan di </b></td>
        <td width="295"><b>: Manado</b></td>
      </tr>
      <tr>
        <td width="170"></td>
        <td width="120"> <b>Pada Tanggal</b></td>
        <td width="295"><b>: 2 Januari 2024</b></td>
      </tr>
    </table>
      <br>
      <table width="607">
        <tr>
          <td width="350"></td>
          <td class="text2"><b>KEPALA BADAN KESATUAN BANGSA</td>
        </tr>
        <tr>
          <td width="350"></td>
          <td class="text2"><b> DAN POLITIK KOTA MANADO <br><br><br><br><br>MEISKE CONNY LANTU, S.E. <br>PEMBINA <br>NIP. 19680523 199101 2 003 </BR></td>
        </tr>
      </table>
      <br>
      <table width="610">
        <tr>
          <td class="text3"><b><i>Tembusan Yth:</i> 
            <ol type="1">
              <li>Walikota Manado (Sebagai Laporan);</li>
              <li> Wakil Walikota Manado;</li>
              <li>Sekertaris Daerah Kota Manado;</li>
              <li>Camat dan Lurah Setempat;</li>
              <li>Yang bersangkutan;</li>
            </ol></b></td>
      </tr>
      </table>
  </center>
</div>

</body>
</html>
