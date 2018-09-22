<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>myTodo Task Manager</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css"  type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css"  type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo base_url()?>">myTodo</a>
                <div class="nav-collapse collapse">
                    <p class="navbar-text pull-right">
                        <!--RIGHT TOP CONTENT-->
                        <a href="<?php echo base_url()?>users/register">Register</a>
                    </p>
                    <ul class="nav">
                        <li><a href="<?php echo base_url()?>">Home</a></li>
                    </ul>
                </div><!--/.nav-collapse-->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <div style="margin:0 0 10px 10px;">
                        <!--SIDEBAR CONTENT-->
                        <?php $this->load->view('users/login'); ?>
                    </div>
                </div><!--/.well-->
            </div><!--/span3-->

            <div class="span9">
            <!--MAIN CONTENT-->
                <?php $this->load->view($main_content); ?>
            
            </div><!--/span-->
        </div><!--/row-->
        <hr>

        <footer>
            <p>&copy; Copyright 2018</p>
        </footer>
    </div><!--/.fluid-container-->
</body>
</html>