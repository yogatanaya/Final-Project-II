<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Peraturan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                 <?php foreach($tb_peraturan as $edit) { ?>

                <form class="form-horizontal" action="<?php echo base_url('staff/updatePeraturan')?>" method="post" enctype="multipart/form-data" role="form" name="formEditDokumen" id="formEditDokumen">

                            <div class="form-group">
                                <input type="hidden" name="id_peraturan" value="<?php echo $edit->id_peraturan;?>">
                            </div>

                             <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_instansi">Instansi</label>
                                    <div class="col-md-6">
                                    <select name="id_instansi" class="form-control">
                                        <?php foreach ($tb_instansi as $i) { ?>
                                        <option <?php if($i->id_instansi == $edit->id_instansi ){ echo 'selected="selected"'; } ?> value="<?php echo $i->id_instansi ?>"><?php echo $i->instansi ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            
    
                                <!-- Judul Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="judul">Judul</label>
                                    <div class="col-md-6">
                                    <input id="judul" name="judul" type="text" value="<?php echo $edit->judul; ?>" class="form-control">
                                    </div>
                                </div>

                                <!--Tahun-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="tahun">Tahun</label>
                                    <div class="col-md-6">
                                    <input id="tahun" name="tahun" type="text" value="<?php echo $edit->tahun; ?>" class="form-control">
                                    </div>
                                </div>

                                <!-- Regulator-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_regulator">Regulator</label>
                                    <div class="col-md-6">
                                    <select name="id_regulator" class="form-control">
                                        <?php foreach ($regulator as $r) { ?>
                                        <option <?php if($r->id_regulator == $edit->id_regulator ){ echo 'selected="selected"'; } ?> value="<?php echo $r->id_regulator ?>"><?php echo $r->regulator ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">File</label>
                                    <div class="col-md-6">
                                    <?php echo $edit->file; ?>
                                    <input id="file" name="file" type="file" class="form-control"
                                    >
                                    </div>
                                </div>


                                <!--Masa Berlaku-->
                                <div class="form-group"-->
                                    <label class="col-md-3 control-label" for="masa_berlaku">Masa Berlaku</label>
                                    <div class="col-md-6">
                                    <input id="masa_berlaku" name="masa_berlaku" type="date"  class="form-control datepicker" value="<?php echo $edit->masa_berlaku; ?>">
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
