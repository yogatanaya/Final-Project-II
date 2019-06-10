<div id="page-wrapper">
   	<div class="col-lg-12">
        <h1 class="page-header">Bantuan</h1>
    </div>
     <!-- /.row -->
        <div class="row">
                <img src="<?php echo base_url('assets/img/help-admin.png');?>"/>
            <div class="panel-body">
                <h2 class="page-header">Keterangan</h2>
                <ol>
                    <li>Tombol untuk membuat Dokumen Daru</li>
                    <li>Tombol untuk membuat Laporan Bulanan</li>
                    <li>Tombol untuk memilih kategori pencarian dokumen</li>
                    <li>Tombol untuk memasukan kata kunci pencarian</li>
                    <li>Tombol untuk melakukan pencarian</li>
                    <li>Tombol <i>Download</i> Dokumen</li>
                    <li>Tombol untuk melakukan sunting dokumen</li>
                    <li>Tombol untuk menghapus dokumen</li>

                </ol>
                <p>Catatan:</p>
                <p>Berlaku untuk Peraturan Eksternal, Internal dan Catatan Mutu</p>
                <p>Dokumen tidak bisa terhapus apabila diantara Dokumen Terkait dan Catatan Mutu saling terkait pada sub menu detail</p>
            </div>
            <hr>
                <img src="<?php echo base_url('assets/img/detail.png');?>"/>
            <h2 class="page-header">Keterangan</h2>
            <div class="panel-body">
                <ol>
                    <li>Tombol untuk memilih Dokumen Terkait</li>
                    <li>Tombol untuk memilih Catatan Cutu</li>
                    <li>Tombol untuk menghubungkan kedua dokumen</li>
                    <li>Tombol untuk menghapus keterkaitan antar dokumen</li>
                  
                </ol>
            </div>
        </div>
      


        
</div>
   <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js');?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js');?>"></script>
    <script src="<?php echo base_url('assets/data/morris-data.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js');?>"></script>

      <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
