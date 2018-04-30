 <div id="page-wrapper">
    <div class="alert alert-warning">
                    Perhatian! Sebelum menghapus dokumen unit harap remove terlebih dahulu link tautan di sub menu detail pada dokumen unit</a>.
    </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
            </div>
                           </div>
                <!-- /.col-lg-12 -->

            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_baru; ?></div>
                                    <div>Baru</div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_revisi; ?></div>
                                    <div>Revisi</div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_setuju; ?></div>
                                    <div>Setuju</div>
                                </div>
                            </div>
                        </div>
                   
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-open fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_unit; ?></div>
                                    <div>Unit Terkait</div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                    <h1 class="page-header">Approved Documents</h1>
            </div>

               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="kode">Kode</th>
                        <th data-field="nama_dokumen">Judul</th>
                        <th data-field="jenis_dokumen">Jenis</th>
                        <th data-field="status_dokumen">Status</th>
                        <th data-field="unit">Unit</th>
                        <th data-field="Revisi">Revisi Ke-</th>
                        <th data-field="entry_date">Waktu</th>
                        <th data-field="keterangan">Keterangan</th>
                        <th colspan="1">Aksi</th>                         
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($tb_dokumen_baru as $setuju) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $setuju['kode'];?></td>
                        <td><?php echo $setuju['nama_dokumen'];?></td>
                        <td><?php echo $setuju['jenis_dokumen'];?></td>
                        <td><?php echo $setuju['status_dokumen'];?></td>
                        <td><?php echo $setuju['unit']; ?></td>
                        <td><?php echo $setuju['revisi'];?></td>
                        <td><?php echo $setuju['entry_date'];?></td>
                        <td><?php echo $setuju['keterangan'];?></td>
                        <td style="white-space: nowrap;">
                            
                            <a href="<?php echo base_url('admin/download/'.$setuju['id_dokumen']);?>" class="glyphicon glyphicon-save btn btn-sm btn-primary"></a>
                            <a href="<?php echo base_url('admin/hapusDokumen/'.$setuju['id_dokumen']);?>" class="glyphicon glyphicon-trash btn btn-sm btn-success"
                                         onclick="return confirm('Anda akan menghapus dokumen ini?')"></a>
                                     
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
    });
    </script>
</body>
