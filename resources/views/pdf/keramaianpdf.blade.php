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
          margin: 10mm auto;
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
            font-size: 13px;
          }
          table tr .text2 {
            text-align: center;
          }
          table tr .text3 {
            text-align: left;
          }
      </style>
</head> 
<body>
  <div class="page">
  <center>
      <table>
        <tr>
          <td><img src="manado.png" width="115" height="120" ></td>
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
          <td class="text"><b> NOMOR : B.05/BKBP/REK/02/I/2023 </b></td>
        </tr>
      </table>
      <br>
      <table>
        <tr>
          <td width="22">I.</td>
          <td width="570">
            Membaca surat Permohonan dari 
          </td>
        </tr>
        <tr>
          <td width="22"></td>
          <td width="570">
            Tridharma Seluruh Indonesia Komisaris Wilayah Kota Manado tanggal 26 Januari 2023.
          </td>
        </tr>
        <tr>
          <td width="22">II.</td>
          <td width="570"> Dasar:</td>
        </tr>
        <tr>
          <td width="22"></td>
          <td width="570"> <ol>
            <li align="justify"> Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah sebagaimana telah diubah dengan 
            Undang-Undang Nomor 11 Tahun 2020 tentang Cipta Kerja; </li>
            <li align="justify">Peraturan Daerah Kota Manado No. 2 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota 
              Manado; </li>
            <li align="justify">Peraturan Walikota Manado Nomor 49 Tahun 2019 tentang Kedudukan, Susunan Organisasi, Tugas dan 
              Fungi serta Tata Kerja Badan Kesatuan BangsaPolitik Kota Manado.</li>
          </ol></td>
        </tr>
        <tr>
          <td width="22">III.</td>
          <td width="570"> Berdasarkan angka I dan II tersebut di atas maka diberikan Rekomendasi pelaksanaan kegiatan kepada : </td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="22"></td>
          <td width="100">Nama</td>
          <td width="463">: {{ $keramaian->nama_pemohon }}</td>
        </tr>
        <tr>
          <td width="22"></td>
          <td width="100">Jabatan</td>
          <td width="463">: {{$keramaian->jabatan}}</td>
        </tr>
      </table>
      <br>
      <table>
        <tr>
          <td width="22"></td>
          <td width="570">Untuk melaksanakan kegiatan sebagai berikut : </td>
        </tr>
      </table>
      <table>
         <tr>
            <td width="22"></td>
            <td width="100"> Jenis Kegiatan</td>
            <td width="463">: {{$keramaian->kegiatan}}</td>
         </tr>
         <tr>
          <td width="22"></td>
          <td width="100"> Hari/Tanggal</td>
          <td width="463">: {{$keramaian->date}}</td>
       </tr>
       <tr>
        <td width="22"></td>
        <td width="100"> Durasi</td>
        <td width="463">: {{$keramaian->waktu_durasi}}</td>
     </tr>
     <tr>
      <td width="22"></td>
      <td width="100"> Tempat</td>
      <td width="463">: {{$keramaian->tempat}}</td>
   </tr>
      </table>
      <br>
      <table>
        <tr>
          <td width="22">IV.</td>
          <td width="570" align="justify">
            Setelah memeriksa permohonan Rekomendasi kegiatan dimaksud, dengan ini menyetujui permohonan 
          </td>
        </tr>
        <tr>
          <td width="22"></td>
          <td width="570">dengan tersebut dengan ketentuan harus memperhatikan dan menyelesaikan kewajiban sbb :
          </td>
        </tr>
        <tr>
          <td width="22"></td>
          <td width="570"> <ol type="a">
            <li> Mengikuti peraturan dan ketentuan sesuaiun dang-undang yang berlaku. </li>
            <li>Mengikuti protokol kesehatan sesuai anjuran pemerintah yang berlaku.  </li>
            <li>Turut memelihara keamanan, ketertiban dan kebersihan lingkungan.</li>
            <li align="justify">
              Apabila kegiatan mash berlanjut setelah jatuh tempo masa berlaku habis harap mengurus REKOMENDASI 
              BARU dan bagi yang tidak mengajukan/memperpanjang Rekomendasi dianggap kegiatan tersebut tidak ada 
              dan Badan Kesatuan Bangsa dan Politik Kota Manado tidak bertanggungjawab atas segala akibat 
              pengoperasian kegiatan tersebut.
            </li>
          </ol></td>
        </tr>
        <tr>
          <td width="22">V.</td>
          <td width="570">
            Demikian Rekomendasi in diberikan untuk digunakan seperlunya.
          </td>
        </tr>
      </table>
      <br>
      <table width="607">
        <tr>
          <td width="350"></td>
          <td class="text2"><b>Dikeluarkan di Manado <br>Pada tanggal : - <br>KEPALA BADAN KESATUAN BANGSA</td>
        </tr>
        <tr>
          <td width="350"></td>
          <td class="text2"><b> DAN POLITIK KOTA MANADO <br><br><br><br><br>MEISKE CONNY LANTU, S.E. <br>PEMBINA <br>NIP. 19680523 199101 2 003 </BR></td>
        </tr>
      </table>
      <br>
      <table width="610">
        <tr>
          <td class="text3"><b><i> Tembusan Yth:</i> 
            <ol type="1">
              <li>Walikota Manado (Sebagai Laporan)</li>
              <li> Wakil Walikota Manado</li>
              <li>Sekertaris Daerah Kota Manado</li>
            </ol></b></td>
      </tr>
      </table>
  </center>
</div>

</body>
</html>
