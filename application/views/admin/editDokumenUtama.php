<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Dokumen Unit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                 <?php foreach($tb_dokumen_baru as $data) { ?>

                <form class="form-horizontal" action="<?php echo base_url('admin/updateDokumen')?>" method="post" enctype="multipart/form-data" role="form" name="formEditDokumen" id="formEditDokumen">

                            <div class="form-group">
                                <input type="hidden" name="id_dokumen" value="<?php echo $data->id_dokumen;?>">
                            </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="kode">Kode</label>
                                    <div class="col-md-3">
                                    <input id="kode" name="kode" type="text" class="form-control" value="<?php echo $data->kode;?>">
                                    </div>
                                </div>
                            
                            
                                <!-- Jenis Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_jenis_dokumen">Jenis Dokumen</label>
                                    <div class="col-md-6">
                                    <select name="id_jenis_dokumen" class="form-control">
                                        <?php foreach ($tb_jenis_dokumen as $jenis) { ?>
                                        <option <?php if($jenis->id_jenis_dokumen == $data->id_jenis_dokumen ){ echo 'selected="selected"'; } ?> value="<?php echo $jenis->id_jenis_dokumen ?>"><?php echo $jenis->jenis_dokumen ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <!--div class="form-group">
                                    <label class="col-md-3 control-label" for="kode">Kode</label>
                                    <div class="col-md-3">
                                    <input id="kode" name="kode" type="text" placeholder="kode" class="form-control" disabled>
                                    </div>
                                </div-->
    
                                <!-- Judul Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nama_dokumen">Judul</label>
                                    <div class="col-md-6">
                                    <input id="nama_dokumen" name="nama_dokumen" type="text" value="<?php echo $data->nama_dokumen; ?>" class="form-control">
                                    </div>
                                </div>

                                <!-- Status Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_status_dokumen">Status Dokumen</label>
                                    <div class="col-md-6">
                                        <select name="id_status_dokumen" class="form-control">
                                            <?php foreach ($status_dokumen as $status) { ?>
                                            <option <?php if($status->id_status_dokumen == $data->id_status_dokumen ){ echo 'selected="selected"'; } ?> value="<?php echo $status->id_status_dokumen ?>"><?php echo $status->status_dokumen ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">File</label>
                                    <div class="col-md-6">
                                    <?php echo $data->file; ?>
                                    <input id="file" name="file" type="file" placeholder="file" class="form-control">
                                    </div>
                                </div>

                                <!--Revisi-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_revisi">Revisi</label>
                                    <div class="col-md-3">
                                    <select name="id_revisi" class="form-control">
                                        <?php foreach ($revisi as $r) { ?>
                                        <option <?php if($r->id_revisi == $data->id_revisi ){ echo 'selected="selected"'; } ?> value="<?php echo $r->id_revisi ?>"><?php echo $r->revisi ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <!--keterangan-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                                    </div>
                                </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-md-9">
                                    <button class="btn btn-info btn pull-left" type="submit"> Simpan</button>

                                </div>  
                            </div>
                         
                            
                              <?php }?>
                           
                        </form>
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
