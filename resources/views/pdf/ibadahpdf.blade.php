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
            text-align: justify;
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
            <td class="text"><b><u> SURAT KETERANGAN TELAH MELAPOR </u></b></td>
        </tr>
        <tr>
          <td class="text"><b> NOMOR : B.05/BKBP/REK/02/I/2023 </b></td>
        </tr>
      </table>
      <table width="610">
        <tr>
          <td class="text3">
            &emsp; Berdasarkan Surat Keterangan Kepala Kantor Kementerian Agama Kota Manado Perihal Tanda Daftar Rumah Ibadah {{$ibadah->nama_RmIbadah}} Nomor (Nomor) Tanggal (tanggal) dan 
            Berdasarkan Surat Permohonan {{$ibadah->nama_ketua}}, Nomor : (nomor) Tanggal (tanggal), maka dengan 
            ini Kepala Badan Kesatuan Bangsa dan Politik Kota Manado menerangkan bahwa:
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="130">Nama</td>
          <td width="463">: &emsp;{{$ibadah->nama_RmIbadah}}</td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="130">Nama Pengurus</td>
          <td width="100">:&emsp;- Ketua</td>
          <td width="358"> : {{$ibadah->nama_ketua}}</td>
        </tr>
        <tr>
          <td width="130"></td>
          <td width="100">&emsp; - Sekertaris</td>
          <td width="358">: {{$ibadah->nama_sekertaris}}</td>
        </tr>
        <tr>
          <td width="130"></td>
          <td width="100">&emsp; - Bendahara</td>
          <td width="358"> : {{$ibadah->nama_bendahara}}</td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="130">Alamat</td>
          <td width="463">: &emsp;{{$ibadah->alamat}}</td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="130">Periode Kepengurusan</td>
          <td width="100">:&emsp;- Ketua</td>
          <td width="358"> : Pdt. Kelvin Situmorang</td>
        </tr>
        <tr>
          <td width="130"></td>
          <td width="100">&emsp; - Sekertaris</td>
          <td width="358">: Pdtm. Tessa</td>
        </tr>
        <tr>
          <td width="130"></td>
          <td width="100">&emsp; - Bendahara</td>
          <td width="358"> : Pdt. Kelvin Situmorang</td>
        </tr>
      </table>
      <table>
        <tr>
          <td width="130">Sifat Kekhususan</td>
          <td width="463">: &emsp;Rumah Ibadah</td>
        </tr>
      </table>
            <table>
        <tr>
          <td width="130">Nomor Telepon</td>
          <td width="100">:&emsp;- Ketua</td>
          <td width="358"> : {{$ibadah->no_hp}} </td>
        </tr>
        <tr>
          <td width="130"></td>
          <td width="100">&emsp; - Sekertaris</td>
          <td width="358">: </td>
        </tr>
        <tr>
          <td width="130"></td>
          <td width="100">&emsp; - Bendahara</td>
          <td width="358"> : </td>
        </tr>
      </table>
      <table width="610">
        <tr>
          <td class="text3">
            &emsp; Telah melapor keberadaannya kepada Pemerintah Kota Manado melalui Badan Kesatuan Bangsa dan Politik Kota Manado dengan melampirkan persyaratan yang telah ditetapkan oleh Badan Kesatuan Bangsa dan Politik Kota Manado.
          </td>
          </tr>
          <tr>
          <td class="text3"> Demikian Surat Keterangan in diberikan agar dipergunakan sebagaimana mestinya. </td>
        </tr>
      </table>
      <br>
      <table width="607">
        <tr>
          <td width="350"></td>
          <td class="text2"><b>Manado, 13 Januari 2024 <br>KEPALA BADAN KESATUAN BANGSA</td>
        </tr>
        <tr>
          <td width="350"></td>
          <td class="text2"><b> DAN POLITIK KOTA MANADO <br><br><br><br><br>MEISKE CONNY LANTU, S.E. <br>PEMBINA <br>NIP. 19680523 199101 2 003 </BR></td>
        </tr>
      </table>
  </center>
</div>
</body>
</html>
