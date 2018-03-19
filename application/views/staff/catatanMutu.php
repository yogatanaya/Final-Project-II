        <div id="page-wrapper">
    
            <div class="col-lg-12">
                <h1 class="page-header">Catatan Mutu</h1>
                <div class="page-body">
                     <a href="#" class="btn btn-md btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#modalCatatan"></a>
                </div> 
                <hr>
                <form class="form-inline" action="<?php echo base_url('staff/buatCatatanMutu');?>" method="post">
                    <select class="form-control" name="field">
                        <option selected="selected" disabled="disabled" value="">Filter By</option>
                        <option value="judul">Judul</option>
                        <option value="status_cm">Status</option>
                        <option value="masa_berlaku">Masa Berlaku</option>
                        <option value="lokasi_simpan">Lokasi</option>
                        <option value="metode">metode</option>
                    </select>
                    <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                    <input class="btn btn-default" type="submit" name="filter" value="Go">
                </form>
                <hr>
            </div>

             <!-- Modal Tambah -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalCatatan" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Tambah Baru</h4>
                    </div>
                        <form class="form-horizontal" action="<?php echo base_url('staff/submitCatatan')?>" method="post" enctype="multipart/form-data" role="form" id="modalCatatan" name="formCatatanMutu">
                        <div class="modal-body">

                        <!--div class="form-group">
                            <label class="col-md-3 control-label" for="judul">ID Catatan Mutu</label>
                                <div class="col-md-6">
                                    <input  name="id_catatan" type="text" placeholder="Nomor Unik" class="form-control">
                                </div>
                        </div-->

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="judul">Judul<font color="red">*</font></label>
                                <div class="col-md-6">
                                    <input id="judul" name="judul" type="text" placeholder="judul catatan mutu" class="form-control">
                                </div>
                        </div>


                        <!-- Status Dokumen-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="id_status_cm">Status<font color="red">*</font></label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_status_cm">
                                    <option value="">Status</option>
                                            <?php foreach($status_cm as $status){ ?>
                                    <option value="<?php echo $status['id_status_cm']; ?>"><?php echo $status['status_cm']; ?>   </option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!--Masa Berlaku-->

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="masa_berlaku">Masa Berlaku<font color="red">*</font></label>
                                <div class="col-md-6">
                                    <input id="masa_berlaku" name="masa_berlaku" type="date" placeholder="Masa Berlaku" class="form-control">
                                </div>
                        </div>
                                    
                    <!--Lokasi Simpan-->

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Lokasi Simpan<font color="red">*</font></label>
                        <div class="col-md-3">
                        <input id="lokasi_simpan" name="lokasi_simpan" type="text" placeholder="Lokasi Simpan" class="form-control">
                        </div>
                    </div>

                    <!--Metode Simpan-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="id_metode">Metode<font color="red">*</font></label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_metode">
                                <option value="">Metode</option>
                                    <?php foreach($metode as $m){ ?>
                                <option value="<?php echo $m['id_metode']; ?>"><?php echo $m['metode']; ?>   </option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                        

                    <!-- Isi Dokumen-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="file">File<font color="red">*</font></label>
                        <div class="col-md-6">
                        <input id="file" name="file" type="file" placeholder="file" class="form-control">
                        </div>
                    </div>

                    <!--keterangan-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Keterangan</label><div class="col-md-6">
                            <textarea class="form-control" rows="5" name="keterangan"></textarea>
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
                        <th data-field="judul">Judul</th>
                        <th data-field="status_cm">Status</th>
                        <th data-field="masa_simpan">Masa Berlaku</th>
                        <th data-field="lokasi_simpan">Lokasi Simpan</th>
                        <th data-field="metode">Metode</th>
                        <th data-field="entry_date">Waktu</th>
                        <th data-field="keterangan">Keterangan</th>
                        <th data-field="nama_admin">Penanggung Jawab</th>
                        <th colspan="1">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach($catatan_mutu as $c) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $c['judul']; ?></td>
                        <td><?php echo $c['status_cm']; ?></td>
                        <td><?php echo $c['masa_berlaku']; ?></td>
                        <td><?php echo $c['lokasi_simpan']; ?></td>
                        <td><?php echo $c['metode']; ?></td>
                        <td><?php echo $c['entry_date']; ?></td>
                        <td><?php echo $c['keterangan']; ?></td>
                        <td><?php echo $c['nama']; ?></td>
                        <td style="white-space: nowrap;">
                            
                            <a href="<?php echo base_url('staff/downloadCM/'.$c['id_catatan']);?>" class="glyphicon glyphicon-save btn btn-sm btn-primary"></a>
                            <a href="<?php echo base_url('staff/editCatatan/'.$c['id_catatan']);?>" class="glyphicon glyphicon-edit btn btn-sm btn-success"></a>
                                
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
