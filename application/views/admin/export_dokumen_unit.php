<h4>Dokumen Unit</h4>

<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

<table border="1" cellpadding="15">
<tr>
  <th>No.</th>
  <th>Kode</th>
  <th>Judul</th>
  <th>Jenis</th>
  <th>Status</th>
  <th>Unit Terkait</th>
  <th>Revisi Ke-</th>
  <th>Waktu</th>
</tr>
<?php
if( ! empty($tb_dokumen_baru)){
  $no=1; // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($tb_dokumen_baru as $dok){ // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$no++;"</td>";
    echo "<td>".$dok->kode."</td>";
    echo "<td>".$dok->nama_dokumen."</td>";
    echo "<td>".$dok->jenis_dokumen."</td>";
    echo "<td>".$dok->status_dokumen."</td>";
    echo "<td>".$dok->unit."</td>";
    echo "<td>".$dok->revisi."</td>";
    echo "<td>".$dok->entry_date."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>