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
            font-size: 17px;
          }
          table tr .text2 {
            text-align: center;
          }
          table tr .text3 {
            text-align: justify;
          }
          table tr .text4 {
            text-align:center;
            font-size: 15px;
          }
      </style>
</head> 
<body>
  <div class="page">
  <center>
      <table>
        <tr>
          <td> <img src="{{ asset('img/logo1.png') }}" width="115" height="120" alt="logo"></td>
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
            <td class="text"><b><u> Tanda Penerimaan Laporan Keberadaan Organisasi </u></b></td>
        </tr>
        <tr>
          <td class="text4"><b> NOMOR : B.05/BKBP/REK/02/I/2023 </b></td>
        </tr>
      </table>
      <table width="610">
        <tr>
          <td class="text3">
            &emsp; Dalam Rangka pelaksanaan Undang-undang Nomor 16 Tahun 2017 tentang Penetapan 
            Peraturan Pemerintah Pengganti Undang-undang Nomor 2 Tahun 2017 tentang perubahan atas 
            Undang-Undang Nomor 17 Tahun 2013 tentang Organisasi Kemasyarakatan menjadi Undang-undang dan peraturan Menteri Dalam Negeri Republik Indonesia Nomor 57 Tahun 2017 Tentang 
            Pendaftaran dan Pengelolaan Sistem Informasi Organisasi Masyarakat. Dengan ini menerangkan 
            bahwa pada hari selasa tanggal {{$ormas->created_at}} juli tahun dua ribu dua puluh tiga, telah 
            melaporkan keberadaan Organisasi/Perkumpulan kepada Badan Kesatuan Bangsa dan Politik Kota 
            Manado yaitu :          
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="30"></td>
          <td width="130">Nama Organisasi</td>
          <td width="430"><b>: &emsp; {{$ormas->nama_ormas}}</b></td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="30"></td>
          <td width="130">Nama Pengurus</td>
          <td width="100"><b>:&emsp;- Ketua</b></td>
          <td width="325"><b> : {{$ormas->nama_ketua}}</b></td>
        </tr>
        <tr>
          <td width="30"></td>
          <td width="130"></td>
          <td width="100"><b> &emsp; - Sekertaris</b></td>
          <td width="325"><b>: {{$ormas->nama_sek}}</b></td>
        </tr>
        <tr>
          <td width="30"></td>
          <td width="130"></td>
          <td width="100"><b>&emsp; - Bendahara</b></td>
          <td width="325"> <b>: {{$ormas->nama_bend}}</b></td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="30"></td>
          <td width="130"> Periode Kepengurusan</td>
          <td width="430"><b>: &emsp;2021-2024</b></td>
        </tr>
        <tr>
          <td width="30"></td>
          <td width="130"> Bidang Kegiatan</td>
          <td width="430"><b>: &emsp;{{ $ormas->bid }}</b></td>
        </tr>
        <tr>
          <td width="30"></td>
          <td width="130"> Domisili Sekertariat</td>
          <td width="430"><b>: &emsp;{{$ormas->alamat_domisili}}</b></td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="30"></td>
          <td width="130">Kontak Person</td>
          <td width="100"><b>:&emsp;- Ketua</b></td>
          <td width="325"><b> : {{$ormas->no_hp}}</b></td>
        </tr>
        <tr>
          <td width="30"></td>
          <td width="130"></td>
          <td width="100"><b> &emsp; - Sekertaris</b></td>
          <td width="325"><b>: {{$ormas->no_hp2}}</b></td>
        </tr>
        <tr>
          <td width="30"></td>
          <td width="130"></td>
          <td width="100"><b>&emsp; - Bendahara</b></td>
          <td width="325"> <b>: {{$ormas->no_hp3}}</b></td>
        </tr>
      </table>
      <table width="610">
        <tr>
          <td class="text3">
            &emsp; Dengan Melampirkan dokumen berupa salinan Surat Keputusan Menteri Hukum dan Hak 
            Asasi Manusia Republik Indonesia Nomor M.HH-05.OT.0101 Tahun 2010 tentang Organisasi dan Tata Kerja Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia dan melampirkan dokumen lainnya sesuai dengan persyaratan yang telah ditentukan oleh Badan Kesatuan Bangsa dan Politik Kota Manado sesuai dengan peraturan perundang-undangan yang berlaku.          
          </td>
          </tr>
      </table>
      <br>
      <br>
      <table width="607">
        <tr>
          <td width="350"></td>
          <td class="text2"><b>Manado, {{ $dateconfig->translatedFormat('d F Y') }} <br>KEPALA BADAN KESATUAN BANGSA</td>
        </tr>
        <tr>
          <td width="350"></td>
          <td class="text2"><b> DAN POLITIK KOTA MANADO <br><br><br><br><br><br>MEISKE CONNY LANTU, S.E. <br>PEMBINA <br>NIP. 19680523 199101 2 003 </BR></td>
        </tr>
      </table>
  </center>
</div>
</body>
</html>
