
        <div id="page-wrapper">
    
            <div class="col-lg-12">
                    <h1 class="page-header">Catatan Mutu</h1>
            </div>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="judul">Judul</th>
                        <th data-field="status_cm">Status</th>
                        <th data-field="masa_simpan">Masa Berlaku</th>
                        <th data-field="lokasi_simpan">Lokasi Simpan</th>
                        <th data-field="metode">Metode</th>
                        <th data-field="entry_date">Waktu</th>
                        <th data-field="keterangan">Keterangan</th>
                        <th data-field="nama_admin">Penanggung Jawab</th>
                        <th colspan="1">Opsi</th>                        
                    </tr>
                </thead>
            </table>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper --><th data-field="judul">Judul</th>
                    <th data-field="status_cm">Status</th>
                    <th data-field="masa_simpan">Masa Berlaku</th>
                    <th data-field="lokasi_simpan">Lokasi Simpan</th>
                    <th data-field="metode">Metode</th>
                    <th data-field="entry_date">Waktu</th>
                    <th data-field="keterangan">Keterangan</th>
                    <th data-field="nama_admin">Penanggung Jawab</th>
                    <th colspan="1">Opsi</th>

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
