<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo!empty($title) ? $title : '' ?></title>
        <meta charset="utf-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="<?php echo!empty($view_port) ? $view_port : '' ?>" content="<?php echo!empty($view_port_content) ? $view_port_content : '' ?>">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/webslidemenu.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/demo.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/parsley.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script&amp;subset=latin,latin-ext" media="all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,700" media="all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&amp;subset=latin,latin-ext" media="all" rel="stylesheet" type="text/css" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/parsley.min.js"></script>
    </head>

    <script type="text/javascript">
        var baseUrl = "<?php echo base_url() ?>";
    </script>

    <body>
        <nav class="navbar navbar-fixed-left navbar-minimal" role="navigation">
            <div class="navbar-toggler">
                <span class="menu-icon"></span>
            </div>
            <ul class=" navbar-menu">
                <li>Account Settings</li>
                <li><a href="#"><i class="fa fa-group fa-fw"></i> Employees</a></li>
                <li><a href="#"><i class="fa fa-credit-card fa-fw"></i> Billing</a></li>
                <li><a href="#"><i class="fa fa-briefcase fa-fw"></i> Business Information</a></li>
                <li><a href="#"><i class="fa fa-bookmark fa-fw"></i> Business Logo</a></li>
                <li>Content Settings</li>
                <li><a href="#"><i class="fa fa-star fa-fw"></i> Review Sorting</a></li>
                <li>Client Setting</li>
                <li><a href="#"><i class="fa fa-envelope-o fa-fw"></i> Review Requests</a></li>
                <li><a href="#"><i class="fa fa-phone-square fa-fw"></i> Client Response</a></li>
                <li><a href="#"><i class="fa fa-mobile fa-fw"></i> Quick Leads</a></li>
                <li><a href="#"><i class="fa fa-desktop fa-fw"></i> Client Sites</a></li>
                <li><a href="#"><i class="fa fa-th-large fa-fw"></i> Products &amp; Packages</a></li>
                <li><a href="#"><i class="fa fa-file-text fa-fw"></i> Proposals &amp; Contracts</a></li>
                <li><a href="#"><i class="fa fa-money fa-fw"></i> Payments</a></li>
                <li><a href="#"><i class="fa fa-list-ul fa-fw"></i> Questionnaires</a></li>
                <li><a href="<?php echo base_url('Vendor/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a></li>
            </ul>
        </nav>
        <?php echo $this->load->section('front_header', 'sections/front_header'); ?>
        <div class="container-fluid">
            <div class="container log_box">
                <?php echo $this->load->section('home_banner', 'sections/side_menu'); ?>
                <?php echo $output; ?>
            </div>
                
        </div>
        
        <?php

        if ($this->session->userdata('message_type') != '') {
            $this->session->unset_userdata('message_type');
        }
        if ($this->session->userdata('message') != '') {
            $this->session->unset_userdata('message');
        }
        $this->session->set_userdata('message', '');
        $this->session->set_userdata('message_type', '');
        ?>
        <?php echo $this->load->section('footer', 'sections/footer'); ?>
    </body>
</html>
