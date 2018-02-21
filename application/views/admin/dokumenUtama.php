
        <div id="page-wrapper">
    
            <div class="col-lg-12">
                <h1 class="page-header">Dokumen Unit</h1>
                <div class="page-body">
                    <a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#dokumenBaru">Buat Baru</a>
                </div> 
                <hr> 
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

                              
                                <!--UNIT>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_unit">Unit/Department</label>
                                    <div class="col-md-8">
                                    <select class="form-control" name="id_unit">
                                            <option value="">Pilih Unit</option>
                                            <?php foreach($unit as $u){ ?>
                                            <option value="<?php echo $u['id_unit']; ?>"><?php echo $u['unit']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div-->

                                <!-- Jenis Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_jenis_dokumen">Jenis Dokumen</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_jenis_dokumen">
                                            <option value="">Pilih Jenis Dokumen</option>
                                            <?php foreach($tb_jenis_dokumen as $jenis){ ?>
                                            <option value="<?php echo $jenis['id_jenis_dokumen']; ?>"><?php echo $jenis['jenis_dokumen']; ?>   </option>
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
                                    <input id="nama_dokumen" name="nama_dokumen" type="text" placeholder="Nama Dokumen" class="form-control">
                                    </div>
                                </div>

                                <!-- Status Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_status_dokumen">Status Dokumen</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_status_dokumen">
                                            <option value="">Pilih Status Dokumen</option>
                                            <?php foreach($status_dokumen as $status){ ?>
                                            <option value="<?php echo $status['id_status_dokumen']; ?>"><?php echo $status['status_dokumen']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">File</label>
                                    <div class="col-md-6">
                                    <input id="file" name="file" type="file" placeholder="file" class="form-control">
                                    </div>
                                </div>

                                <!--Revisi-->
                                <div class="form-group"-->
                                    <label class="col-md-3 control-label" for="id_revisi">Revisi</label>
                                    <div class="col-md-3">
                                    <select class="form-control" name="id_revisi">
                                            <option value="">Revisi Ke-</option>
                                            <?php foreach($revisi as $r){ ?>
                                            <option value="<?php echo $r['id_revisi']; ?>"><?php echo $r['revisi']; ?>   </option>
                                            <?php } ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"-->
                                    <label class="col-md-3 control-label" for="entry_date">Tanggal</label>
                                    <div class="col-md-6">
                                    <input id="entry_date" name="entry_date" type="date"  class="form-control">
                                    </div>
                                </div>

                                <!--keterangan-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                                    </div>
                                </div>


                          

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
                        <th data-field="nama_dokumen">Judul</th>
                        <th data-field="jenis_dokumen">Jenis</th>
                        <th data-field="status_dokumen">Status</th>
                        <th data-field="unit">Unit</th>
                        <th data-field="Revisi">Revisi Ke-</th>
                        <th data-field="entry_date">Waktu</th>
                        <th data-field="keterangan">Keterangan</th>
                        <th colspan="1">Opsi</th>                           
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($tb_dokumen_baru as $baru) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $baru['nama_dokumen'];?></td>
                        <td><?php echo $baru['jenis_dokumen'];?></td>
                        <td><?php echo $baru['status_dokumen'];?></td>
                        <td><?php echo $baru['unit']; ?></td>
                        <td><?php echo $baru['revisi'];?></td>
                        <td><?php echo $baru['entry_date'];?></td>
                        <td><?php echo $baru['keterangan'];?></td>
                        <td>
                            <ul style="list-style-type: none;">
                                <li>
                                    <li><a href="<?php echo base_url('admin/download/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-download"></a></li>
                                    <li><a href="<?php echo base_url('admin/editDokumen/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-edit"></a></li>
                                     <li><a href="<?php echo base_url('admin/hapusDokumen/'.$baru['id_dokumen']);?>" class="glyphicon glyphicon-trash" onclick="return confirm('Anda akan menghapus dokumen ini?');"></a></li>
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
    });
    </script>
</body>

</html>
