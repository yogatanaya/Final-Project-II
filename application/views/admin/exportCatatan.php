<h4>Catatan Mutu</h4>

<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

<table border="1" cellpadding="15">
<tr>
  <th align="center">No.</th>
    <th data-field="judul">Judul</th>
    <th data-field="status_cm">Status</th>
    <th data-field="masa_simpan">Masa Berlaku</th>
    <th data-field="lokasi_simpan">Lokasi Simpan</th>
    <th data-field="metode">Metode</th>
    <th data-field="entry_date">Waktu</th>
    <th data-field="nama_admin">Penanggung Jawab</th>
</tr>
<?php
if( ! empty($catatan_mutu)){
  $no=1; // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($catatan_mutu as $cm){ // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$no++;"</td>";
    echo "<td>".$cm->judul."</td>";
    echo "<td>".$cm->status_cm."</td>";
    echo "<td>".$cm->masa_simpan."</td>";
    echo "<td>".$cm->lokasi_simpan."</td>";
    echo "<td>".$cm->metode."</td>";
    echo "<td>".$cm->entry_date."</td>";
    echo "<td>".$cm->nama."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>