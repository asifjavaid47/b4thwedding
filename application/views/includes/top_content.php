<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Wedding</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/admin/simpleSidebar.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Hello Admin
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/products">Products</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                </li>                
                <li>
                    <a href="<?php echo base_url(); ?>admin/subcategories">Sub Categories</a>
                </li>
                <li>
                    <a href="#">Business Services</a>
                </li>                
                <li>
                    <a href="#">Business Subservices</a>
                </li>                
                <li>
                    <a href="#">Slider Images</a>
                </li>
                <li>
                    <a href="#">Services Images</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    
                    
                        <div class="navbar navbar-fixed-top">
                          <div class="navbar-inner">
                            <div class="container">
                              
                              <ul class="nav" style="float:right;">
                                <li>
                                  <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                    
                    
                    
                    
                        <?php $this->load->view($main_content); ?>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>


