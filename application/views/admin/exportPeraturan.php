<h4>Export Peraturan</h4>

<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=Peraturan Eksternal.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

<table border="1" cellpadding="15">
<tr>
  <th align="center">No.</th>
  <th data-field="nomer"  data-sortable="true">Instansi</th>
  <th data-field="judul"  data-sortable="true">Judul</th>
  <th data-field="tahun"  data-sortable="true">Tahun</th>
  <th data-field="regulator"  data-sortable="true">Regulator</th>
  <th data-field="unit"  data-sortable="true">Unit Terkait</th>
  <th data-field="nama_admin"  data-sortable="true">Penanggung Jawab</th>
  <th data-field="entry_date"  data-sortable="true">Tanggal Terbit</th>
  <th data-field="masa_berlaku"  data-sortable="true">Masa Berlaku</th>
</tr>
<?php
if( ! empty($tb_peraturan)){
  $no=1; // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($tb_peraturan as $p){ // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$no++;"</td>";
    echo "<td>".$p['instansi']."</td>";
    echo "<td>".$p['judul']."</td>";
    echo "<td>".$p['tahun']."</td>";
    echo "<td>".$p['regulator']."</td>";
    echo "<td>".$p['unit']."</td>";
    echo "<td>".$p['nama']."</td>";
    echo "<td>".$p['masa_berlaku']."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>