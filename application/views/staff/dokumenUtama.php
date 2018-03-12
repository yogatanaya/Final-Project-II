<div id="page-wrapper">
    
            <div class="col-lg-12">
                <h1 class="page-header">Dokumen Unit</h1>
                <div class="page-body">
                    <a href="#" class="btn btn-md btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#dokumenBaru"></a>
                </div> 
                <hr>
                 <form class="form-inline" action="<?php echo base_url('staff/buatDokumenBaru');?>" method="post">
                    <select class="form-control" name="field">
                        <option selected="selected" disabled="disabled" value="">Filter By</option>
                        <option value="unit">Unit</option>
                        <option value="jenis_dokumen">Jenis Dokumen</option>
                        <option value="status_dokumen">Status Dokumen</option>
                    </select>
                    <input class="form-control" type="text" name="search" value="" placeholder="Search...">
                    <input class="btn btn-default" type="submit" name="filter" value="Go">
                </form>
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
                        <form class="form-horizontal" action="<?php echo base_url('staff/submitDokumen')?>" method="post" enctype="multipart/form-data" role="form" id="tambahDokumen" name="tambahDokumen">
                        <div class="modal-body">


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

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="kode">Kode</label>
                                    <div class="col-md-3">
                                    <input id="kode" name="kode" type="text" placeholder="kode" class="form-control" value="Belum Disertai" readonly>
                                    </div>
                                </div>
    
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


                                <!--keterangan-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                    <div class="col-md-6">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                                    </div>
                                </div>


                                <!-- Isi Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">Isi</label>
                                    <div class="col-md-6">
                                    <input id="file" name="file" type="file" placeholder="file" class="form-control">
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
       
       


    });
    </script>

    

</body>
