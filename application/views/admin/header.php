<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/ap.ico');?>">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/vendor/morrisjs/morris.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

     <!-- DataTables CSS -->
    <link href="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css');?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.css');?>" rel="stylesheet">

    <!--DatePicker-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datepicker/css/bootstrap-datepicker.min.css');?>">
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--UI Dropdown-->
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">i&nbsp;Document</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         Hai, <?php echo $this->session->userdata('nama');?>&nbsp;<i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('admin/formUbahPassword');?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?php echo base_url('admin/formRegistrasi');?>"><i class="fa fa-users fa-fw"></i> Register</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('auth/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>

                         <li><a href="<?php echo base_url('admin/bantuan');?>"><i class="fa fa-question-circle"></i> Bantuan</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-lock"></i> Dokumen Unit<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('admin/buatDokumenBaru');?>">Utama</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/buatCatatanMutu');?>">Catatan Mutu</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/detailUtama');?>">Detail</a>
                                </li>
                                <!--li>
                                    <a href="<?php echo base_url('admin/berkasUnit');?>">Berkas</a>
                                </li-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/buatPeraturan');?>"><i class="fa fa-file"></i> Peraturan Eksternal <!--span class="fa arrow"></span--></a>
                            <!--ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('admin/berkasEksternal');?>">Berkas</a>
                                </li>
                            </ul-->
                        </li>
                       
                      
                        <li>
                            <a href="#"><i class="fa fa-cogs"></i> Lainnya<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('admin/formTambahRegulator');?>">Regulator Baru</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/formTambahJenis');?>">Jenis Dokumen Baru</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/formTambahInstansi');?>">Instansi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
