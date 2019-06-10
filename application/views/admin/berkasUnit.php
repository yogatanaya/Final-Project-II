<div id="page-wrapper">
   	<div class="col-lg-12">
        <h1 class="page-header">Berkas Unit</h1>
    </div>
     <!-- /.row -->
        <div class="row">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="kode">File</th>
                        <th colspan="1">Aksi</th>                         
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($tb_dokumen_baru as $b) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $b['file'];?></td>
                        <td style="white-space: nowrap;">
                            <a href="<?=base_url('./files/'.$b['file'])?>" target="_blank" class="glyphicon glyphicon-save"></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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
