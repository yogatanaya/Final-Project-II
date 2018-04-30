<div id="page-wrapper">
    
            <div class="col-lg-12">
                <h1 class="page-header">Peraturan Eksternal</h1>
                <div class="page-body">
                <a href="#" class="btn btn-md btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#peraturanBaru"></a>
                </div>
                <hr>
                <form class="form-inline" action="<?php echo base_url('staff/buatPeraturan');?>" method="post">
                    <select class="form-control" name="field">
                        <option selected="selected" disabled="disabled" value="">Filter By</option>
                        <option value="unit">Unit</option>
                        <option value="instansi">Instansi</option>
                        <option value="tahun">Tahun</option>
                        <option value="regulator">Regulator</option>
                    </select>
                    <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                    <input class="btn btn-default" type="submit" name="filter" value="Go">
                </form>
                <hr>
            </div>


            <!--MODAL TAMBAH-->

            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="peraturanBaru" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Tambah Baru</h4>
                    </div>
                        <form class="form-horizontal" action="<?php echo base_url('staff/submitPeraturan')?>" method="post" enctype="multipart/form-data" role="form" id="tambahPeraturan" name="tambahPeraturan">
                        <div class="modal-body">

                              

                                <!-- Jenis Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_instansi">Instansi<font color="red">*</font></label></label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_instansi">
                                            <option value="">Pilih Nomor Instansi</option>
                                            <?php foreach($tb_instansi as $i){ ?>
                                            <option value="<?php echo $i['id_instansi']; ?>"><?php echo $i['instansi']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            
    
                                <!-- Judul Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="judul">Judul<font color="red">*</font></label></label>
                                    <div class="col-md-6">
                                    <input id="judul" name="judul" type="text" placeholder="Judul Peraturan" class="form-control">
                                    </div>
                                </div>

                                <!--Tahun-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="tahun">Tahun<font color="red">*</font></label></label>
                                    <div class="col-md-6">
                                    <input id="tahun" name="tahun" type="text" placeholder="Tahun Terbit" class="form-control">
                                    </div>
                                </div>

                                <!-- Regulator-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_regulator">Regulator<font color="red">*</font></label></label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_regulator">
                                            <option value="">Pilih Regulator</option>
                                            <?php foreach($regulator as $rg){ ?>
                                            <option value="<?php echo $rg['id_regulator']; ?>"><?php echo $rg['regulator']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">File<font color="red">*</font></label></label>
                                    <div class="col-md-6">
                                    <input name="file"  type="file" placeholder="file" class="form-control">
                                    </div>
                                </div>


                                <!--Masa Berlaku-->
                                <div class="form-group"-->
                                    <label class="col-md-3 control-label" for="masa_berlaku">Masa Berlaku<font color="red">*</font></label></label>
                                    <div class="col-md-6">
                                    <input id="masa_berlaku" name="masa_berlaku" type="date"  class="form-control datepicker">
                                    </div>
                                </div>


                                 <font color="red">&nbsp;*&nbsp;</font>=&nbsp;Wajib Diisi

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
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
                        <th data-field="entry_date"  data-sortable="true">Tanggal Terbit</th>
                        <th data-field="masa_berlaku"  data-sortable="true">Masa Berlaku</th>
                        <th colspan="1">Aksi</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach ($tb_peraturan as $p) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p['instansi']; ?></td>
                        <td><?php echo $p['judul']; ?></td>
                        <td><?php echo $p['tahun']; ?></td>
                        <td><?php echo $p['regulator']; ?></td>
                        <td><?php echo $p['unit']; ?></td>
                        <td><?php echo $p['nama']; ?></td>
                        <td><?php echo $p['entry_date']; ?></td>
                        <td><?php echo $p['masa_berlaku']; ?></td>
                        <td style="white-space: nowrap;">
                            
                            <a href="<?php echo base_url('staff/downloadPeraturan/'.$p['id_peraturan']);?>" class="glyphicon glyphicon-save btn btn-sm btn-primary"></a>
                            <a href="<?php echo base_url('staff/editPeraturan/'.$p['id_peraturan']);?>" class="glyphicon glyphicon-edit btn btn-sm btn-success"></a>
                                
                            </ul>        
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
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
