<div id="page-wrapper">
   	<div class="col-lg-12">
        <h1 class="page-header">Registrasi</h1>
    </div>
     <!-- /.row -->
        <div class="row">
             <form class="form-horizontal" action="<?php echo base_url('admin/register')?>" method="post" enctype="multipart/form-data" role="form">
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Nama</label>
                        <div class="col-md-6">
                            <input id="nama" name="nama" type="text" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id_unit">Unit / Department</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="id_unit">
                                            <option value="">Pilih Unit / Department</option>
                                            <?php foreach($unit as $u){ ?>
                                            <option value="<?php echo $u['id_unit']; ?>"><?php echo $u['unit']; ?>   </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label" for="username">Username</label>
                        <div class="col-md-6">
                            <input id="username" name="username" type="text" class="form-control">
                        </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-6">
                            <input id="password" name="password" type="Password" class="form-control">
                        </div>
                </div>


                <button type="submit" class="btn btn-md btn-primary">Sign Up</button>

            </form>
        </div>

        <hr>
         <div class="row">
             <form class="form-horizontal" action="<?php echo base_url('admin/addUnit')?>" method="post" enctype="multipart/form-data" role="form">
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="unit">Unit Baru</label>
                        <div class="col-md-6">
                            <input id="unit" name="unit" type="text" class="form-control">
                        </div>
                </div>
                <button type="submit" class="btn btn-md btn-primary glyphicon glyphicon-plus"></button>

            </form>
        </div>

        <hr>
        <table width="100%" class="table">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="kode">Unit</th>
                        <th colspan="1">Aksi</th>                         
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($unit as $u) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $u['unit'];?></td>
                        <td>
                            <ul style="list-style-type: none;">
                                    <li><a href="<?php echo base_url('admin/hapusUnit/'.$u['id_unit']);?>" class="glyphicon glyphicon-remove" onclick="return confirm('Anda akan menghapus unit/department ini?');"></a>
                                 </li>
                            </ul>            
                                    
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

       
</div>
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
