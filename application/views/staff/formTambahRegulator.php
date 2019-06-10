<div id="page-wrapper">
   	<div class="col-lg-12">
        <h1 class="page-header">Regulator</h1>
    </div>
     <!-- /.row -->
        <div class="row">
             <form class="form-inline" action="<?php echo base_url('staff/addRegulator')?>" method="post" enctype="multipart/form-data" role="form">
                
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="kode">Regulator</label>
                            <div class="col-md-6">
                                <input id="regulator" name="regulator" type="text" placeholder="Regulator" class="form-control" style="width: 300px">
                            </div>
                    </div>
    
                                                          
                     
                    <button class="btn btn-info glyphicon glyphicon-plus" type="submit"></button>
                         
            </form>
        </div>


        <hr>
        
         <table width="100%" class="table">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="kode">regulator</th>
                        <th colspan="1">Aksi</th>                         
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($regulator as $r) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $r['regulator'];?></td>
                        <td>
                            <ul style="list-style-type: none;">
                                    <li><a href="<?php echo base_url('staff/hapusRegulator/'.$r['id_regulator']);?>" class="glyphicon glyphicon-remove" onclick="return confirm('Anda akan menghapus regulator ini?');"></a>
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
