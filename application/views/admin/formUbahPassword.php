<div id="page-wrapper">
   	<div class="col-lg-12">
        <h1 class="page-header">Ubah Password</h1>
    </div>
     <!-- /.row -->
        <div class="row">
             <form class="form-horizontal" action="<?php echo base_url('admin/ubahPassword')?>" method="post" enctype="multipart/form-data" role="form">
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Nama</label>
                        <div class="col-md-6">
                            <input id="nama" name="nama" type="text" class="form-control"
                            value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                        </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label" for="username">Username</label>
                        <div class="col-md-6">
                            <input id="username" name="username" type="text" class="form-control"
                            value="<?php echo $this->session->userdata('username');?>" readonly>
                        </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label" for="oldpass">Password Lama</label>
                        <div class="col-md-6">
                            <input id="oldPass" name="oldpass" type="Password" class="form-control">
                        </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label" for="newPass">Password Baru</label>
                        <div class="col-md-6">
                            <input id="newPass" name="newPass" type="Password" class="form-control">
                        </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-3 control-label" for="confirmPass">Konfirmasi Password</label>
                        <div class="col-md-6">
                            <input id="confirmPass" name="confirmPass" type="Password" class="form-control">
                        </div>
                </div>

                
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>

            </form>
        </div>


       
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
