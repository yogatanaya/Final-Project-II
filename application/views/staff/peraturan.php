
        <div id="page-wrapper">
    
            <div class="col-lg-12">
                    <h1 class="page-header">Peraturan Eksternal</h1>
            </div>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="nomer"  data-sortable="true">Instansi</th>
                        <th data-field="judul"  data-sortable="true">Judul</th>
                        <th data-field="tahun"  data-sortable="true">Tahun</th>
                        <th data-field="regulator"  data-sortable="true">Regulator</th>
                        <th data-field="unit"  data-sortable="true">Unit Terkait</th>
                        <th data-field="nama_admin"  data-sortable="true">Penanggung Jawab</th>
                        <th data-field="entry_date"  data-sortable="true">Waktu</th>
                        <th data-field="masa_berlaku"  data-sortable="true">Tanggal Terbit</th>
                        <th colspan="1">Opsi</th>                       
                    </tr>
                </thead>
            </table>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
