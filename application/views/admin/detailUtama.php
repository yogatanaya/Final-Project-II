<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail</h1>
                </div>
                <hr>
                <!-- /.col-lg-12 -->
                <div class="page-body">
                    <form class="form-inline" action="<?php echo base_url('admin/addDetail')?>" method="post" enctype="multipart/form-data" role="form" name="addDetail" id="addDetail">

            
                                <!-- Jenis Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_dokumen">Dokumen Terkait</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_dokumen">
                                            <option value="">Pilih Dokumen Unit</option>
                                            <?php foreach($tb_dokumen_baru as $b){ ?>
                                            <option value="<?php echo $b['id_dokumen']; ?>"><?php echo $b['nama_dokumen']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                   <!-- Catatan Mutu-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_catatan">Catatan Mutu</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_catatan">
                                            <option value="">Pilih Catatan Mutu</option>
                                            <?php foreach($catatan_mutu as $cm){ ?>
                                            <option value="<?php echo $cm['id_catatan']; ?>"><?php echo $cm['judul']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                              <div class="form-group">
                                <div class="col-md-9">
                                    <button class="btn btn-info btn pull-left
                                    glyphicon glyphicon-link" type="submit"></button>

                                </div>  
                            </div>
                            
                        </form>
                        <hr>
                </div>
            </div>
       


         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="kode"  data-sortable="true">Kode</th>
                        <th data-field="nomer"  data-sortable="true">Dokumen Terkait</th>
                        <th data-field="judul"  data-sortable="true">Catatan Mutu</th>
                        <th data-field="jenis_dokumen"  data-sortable="true">Jenis Dokumen</th> 
                        <th data-field="status_dokumen"  data-sortable="true">Status</th> 
                        <th data-field="entry_date"  data-sortable="true">Tanggal Pengajuan</th>
                        <th data-field="unit"  data-sortable="true">Unit</th>
                        <th data-field="nama"  data-sortable="true">Penanggung Jawab</th>
                        <th colspan="1">Aksi</th>     
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach ($internal as $d) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kode']; ?></td>
                        <td><?php echo $d['nama_dokumen']; ?></td>
                        <td><?php echo $d['judul']; ?></td>
                        <td><?php echo $d['jenis_dokumen']; ?></td>
                        <td><?php echo $d['status_dokumen']; ?></td>
                        <td><?php echo $d['entry_date']; ?></td>
                        <td><?php echo $d['unit']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td>
                            <ul style="list-style-type: none;">
                                 <li><a href="<?php echo base_url('admin/hapusTautan/'.$d['id']);?>" class="glyphicon glyphicon-remove" onclick="return confirm('Anda akan menghapus Tautan ini?');"></a>
                                 </li>
                            </ul>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>

            
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

         jQuery('option').mousedown(function(e) {
            e.preventDefault();
            jQuery(this).toggleClass('selected');
  
            jQuery(this).prop('selected', !jQuery(this).prop('selected'));
            return false;
        });
    });
    </script>
</body>

</html>
