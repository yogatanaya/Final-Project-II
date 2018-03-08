<div id="page-wrapper">
    
            <div class="col-lg-12">
                <h1 class="page-header">Peraturan Eksternal</h1>
                <div class="page-body">
                <a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#peraturanBaru">Buat Baru</a>
                </div>
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
                        <form class="form-horizontal" action="<?php echo base_url('admin/submitPeraturan')?>" method="post" enctype="multipart/form-data" role="form" id="tambahPeraturan" name="tambahPeraturan">
                        <div class="modal-body">

                            
                                <!-- Jenis Dokumen-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_instansi">Instansi</label>
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
                                    <label class="col-md-3 control-label" for="judul">Judul</label>
                                    <div class="col-md-6">
                                    <input id="judul" name="judul" type="text" placeholder="Judul Peraturan" class="form-control">
                                    </div>
                                </div>

                                <!--Tahun-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="tahun">Tahun</label>
                                    <div class="col-md-6">
                                    <input id="tahun" name="tahun" type="text" placeholder="Tahun Terbit" class="form-control">
                                    </div>
                                </div>

                                <!-- Regulator-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_regulator">Regulator</label>
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
                                    <label class="col-md-3 control-label" for="file">File</label>
                                    <div class="col-md-6">
                                    <input id="file" name="file" type="file" placeholder="file" class="form-control">
                                    </div>
                                </div>

                                <!--Tanggal Terbit>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="entry_date">Tanggal Terbit</label>
                                    <div class="col-md-6">
                                    <input id="entry_date" name="entry_date" type="date"  class="form-control">
                                    </div>
                                </div-->

                                <!--Masa Berlaku-->
                                <div class="form-group"-->
                                    <label class="col-md-3 control-label" for="masa_berlaku">Masa Berlaku</label>
                                    <div class="col-md-6">
                                    <input id="masa_berlaku" name="masa_berlaku" type="date"  class="form-control">
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
                        <th data-field="nomer"  data-sortable="true">Instansi</th>
                        <th data-field="judul"  data-sortable="true">Judul</th>
                        <th data-field="tahun"  data-sortable="true">Tahun</th>
                        <th data-field="regulator"  data-sortable="true">Regulator</th>
                        <th data-field="unit"  data-sortable="true">Unit Terkait</th>
                        <th data-field="nama_admin"  data-sortable="true">Penanggung Jawab</th>
                        <th data-field="entry_date"  data-sortable="true">Tanggal Terbit</th>
                        <th data-field="masa_berlaku"  data-sortable="true">Masa Berlaku</th>
                        <th colspan="1">Opsi</th>                       
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
                        <td>
                             <ul style="list-style-type: none;">
                                <li>
                                    <li><a href="<?php echo base_url('admin/downloadPeraturan/'.$p['id_peraturan']);?>" class="glyphicon glyphicon-download"></a></li>
                                    <li><a href="<?php echo base_url('admin/editPeraturan/'.$p['id_peraturan']);?>" class="glyphicon glyphicon-edit"></a></li>
                                     <li><a href="<?php echo base_url('admin/hapusPeraturan/'.$p['id_peraturan']);?>" class="glyphicon glyphicon-trash"  onclick="return confirm('Anda akan menghapus dokumen ini?');"></a></li>

                                </li>
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
