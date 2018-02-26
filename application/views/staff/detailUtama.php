<div id="page-wrapper">
    
            <div class="col-lg-12">
                <h1 class="page-header">Dokumen Unit</h1>
            </div>


                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="nama_dokumen">Nama Dokumen</th>
                        <th data-field="jenis_dokumen">Catatan Mutu</th>
                        <th colspan="1">Opsi</th>                           
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($tb_dokumen_baru as $d) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $baru['nama_dokumen'];?></td>
                        <td><?php echo $baru['judul'];?></td>
                          <td>
                            <ul style="list-style-type: none;">
                                <li>
                                    <li><a href="<?php echo base_url('staff/download/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-download"></a></li>
                                    <li><a href="<?php echo base_url('staff/editDokumen/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-edit"></a></li>
                                </li>
                            </ul>            
                                    
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
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

        $('#id_catatan').multiselect({
            nonSelectedText: 'Pilih Catatan Mutu',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth:'400px'
        });
        
    });
    </script>

    

</body>
