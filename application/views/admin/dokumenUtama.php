        <div id="page-wrapper">
             <div class="alert alert-warning">
                    Perhatian! Sebelum menghapus dokumen unit harap remove terlebih dahulu link tautan di sub menu detail pada dokumen unit</a>.
            </div>
            <div class="col-lg-12">
                <h1 class="page-header">Dokumen Unit</h1>
             
                <form class="form-inline" action="<?php echo base_url('admin/buatDokumenBaru');?>" method="post">
                     <a href="#" class="btn btn-md btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#dokumenBaru"></a>
                    <a href="#" class="btn btn-md btn-success glyphicon glyphicon-list-alt" data-toggle="modal" data-target="#formExportUnit"></a>
                
                    <select class="form-control" name="field">
                        <option selected="selected" disabled="disabled" value="">Filter By</option>
                        <option value="unit">Unit</option>
                        <option value="jenis_dokumen">Jenis Dokumen</option>
                        <option value="status_dokumen">Status Dokumen</option>
                    </select>
                    <input class="form-control" type="text" name="search" value="" placeholder="Search..." style="width: 800px;">
                    <input class="btn btn-default" type="submit" name="filter" value="Go">
                </form>
                <hr>
            </div>


            <!--Modal Export -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="formExportUnit" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Export Dokumen</h4>
                    </div>
                        <form class="form-horizontal" action="<?php echo base_url('admin/exportUnit')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Dari</label>
                                    <div class="col-md-9">
                                        <input name="dari" type="date"  class="form-control datepicker">
                                        
                                    </div>
                                    <br>
                                    <br>
                                     <label class="col-sm-3 control-label">Bulan</label>
                                    <div class="col-md-9">
                                        <input name="sampai" type="date"  class="form-control datepicker">
                                    </div>
                            </div>

                                                          

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit" name="export"> Export&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

             <!-- Modal Tambah -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="dokumenBaru" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Tambah Baru</h4>
                    </div>
                        <form class="form-horizontal" action="<?php echo base_url('admin/submitDokumen')?>" method="post" enctype="multipart/form-data" role="form" id="tambahDokumen" name="tambahDokumen">
                        <div class="modal-body">


                                <!-- Jenis Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_jenis_dokumen">Jenis Dokumen<font color="red">*</font></label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_jenis_dokumen">
                                            <option value="">Pilih Jenis Dokumen</option>
                                            <?php foreach($tb_jenis_dokumen as $jenis){ ?>
                                            <option value="<?php echo $jenis['id_jenis_dokumen']; ?>"><?php echo $jenis['jenis_dokumen']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="kode">Kode<font color="red">*</font></label>
                                    <div class="col-md-3">
                                    <input id="kode" name="kode" type="text" placeholder="kode" class="form-control">
                                    </div>
                                </div>
    
                                <!-- Judul Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nama_dokumen">Judul<font color="red">*</font></label>
                                    <div class="col-md-6">
                                    <input id="nama_dokumen" name="nama_dokumen" type="text" placeholder="Nama Dokumen" class="form-control">
                                    </div>
                                </div>

                                <!-- Status Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_status_dokumen">Status Dokumen<font color="red">*</font></label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_status_dokumen">
                                            <option value="">Pilih Status Dokumen</option>
                                            <?php foreach($status_dokumen as $status){ ?>
                                            <option value="<?php echo $status['id_status_dokumen']; ?>"><?php echo $status['status_dokumen']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <!--Revisi-->
                                <div class="form-group"-->
                                    <label class="col-md-3 control-label" for="id_revisi">Revisi<font color="red">*</font></label>
                                    <div class="col-md-3">
                                    <select class="form-control" name="id_revisi">
                                            <option value="">Revisi Ke-</option>
                                            <?php foreach($revisi as $r){ ?>
                                            <option value="<?php echo $r['id_revisi']; ?>"><?php echo $r['revisi']; ?>   </option>
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


                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">Isi<font color="red">*</font></label>
                                    <div class="col-md-6">
                                    <input id="file" name="file" type="file" placeholder="file" class="form-control">
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
                    foreach ($tb_dokumen_baru as $baru) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $baru['kode'];?></td>
                        <td><?php echo $baru['nama_dokumen'];?></td>
                        <td><?php echo $baru['jenis_dokumen'];?></td>
                        <td><?php echo $baru['status_dokumen'];?></td>
                        <td><?php echo $baru['unit']; ?></td>
                        <td><?php echo $baru['revisi'];?></td>
                        <td><?php echo $baru['entry_date'];?></td>
                        <td><?php echo $baru['keterangan'];?></td>
                        <td style="white-space: nowrap;">
                            <a href="<?php echo base_url('admin/download/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-save btn btn-sm btn-primary"></a>
                            <a href="<?php echo base_url('admin/editDokumen/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-edit btn btn-sm btn-success"></a>
                             <a href="<?php echo base_url('admin/hapusDokumen/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-trash btn btn-sm btn-danger"
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js');?>"></script>
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
