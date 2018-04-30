<div id="page-wrapper">
   	<div class="col-lg-12">
        <h1 class="page-header">Edit Catatan Mutu</h1>
    </div>
     <!-- /.row -->
            <div class="row">
                 <?php foreach($catatan_mutu as $edit) { ?>

                <form class="form-horizontal" action="<?php echo base_url('admin/updateCatatan')?>" method="post" enctype="multipart/form-data" role="form" name="formEditCatatan" id="formEditCatatan">

                            <div class="form-group">
                                <input type="hidden" name="id_catatan" value="<?php echo $edit->id_catatan;?>">
                            </div>
                            
                         
                                <!-- Judul -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="judul">Judul</label>
                                    <div class="col-md-6">
                                    <input id="judul" name="judul" type="text" value="<?php echo $edit->judul; ?>" class="form-control">
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_status_cm">Status</label>
                                    <div class="col-md-6">
                                    <select name="id_status_cm" class="form-control">
                                        <?php foreach ($status_cm as $s) { ?>
                                        <option <?php if($s->id_status_cm == $edit->id_status_cm ){ echo 'selected="selected"'; } ?> value="<?php echo $s->id_status_cm ?>"><?php echo $s->status_cm ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="masa_berlaku">Masa Berlaku</label>
                                    <div class="col-md-6">
                                    <input id="masa_berlaku" name="masa_berlaku" type="date"  class="form-control datepicker" value="<?php echo $edit->masa_berlaku; ?>">
                                    </div>
                                </div>

                                <!--keterangan-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                                    </div>
                                </div>

                                <!--Lokasi Simpan-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="lokasi_simpan">Lokasi Simpan</label>
                                    <div class="col-md-6">
                                    <input id="lokasi_simpan" name="lokasi_simpan" type="text" value="<?php echo $edit->lokasi_simpan; ?>" class="form-control">
                                    </div>
                                </div>

                                <!--metode-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_metode">Metode</label>
                                    <div class="col-md-6">
                                    <select name="id_metode" class="form-control">
                                        <?php foreach ($metode as $m) { ?>
                                        <option <?php if($m->id_metode == $edit->id_metode ){ echo 'selected="selected"'; } ?> value="<?php echo $m->id_metode ?>"><?php echo $m->metode ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                
                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">File</label>
                                    <div class="col-md-6">
                                    <?php echo $edit->file; ?>
                                    <input id="file" name="file" type="file" placeholder="file" class="form-control">
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
</div>
   <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

     <script type="text/javascript" src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.min.js');?>"></script>
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
     <script type="text/javascript">
     $(function(){
      $(".datepicker").datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
      });
     });
    </script>
</body>

</html>
