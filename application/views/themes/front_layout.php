<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo !empty($title) ? $title : '' ?></title>
        <meta charset="utf-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="<?php echo !empty($view_port) ? $view_port : '' ?>" content="<?php echo !empty($view_port_content) ? $view_port_content : '' ?>">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/webslidemenu.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/demo.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/parsley.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/coustmstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/bootstrap-select.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script&amp;subset=latin,latin-ext" media="all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,700" media="all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&amp;subset=latin,latin-ext" media="all" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/parsley.min.js"></script>


    </head>

    <script type="text/javascript">
        var baseUrl = "<?php echo base_url() ?>";
    </script>

    <body>
        <?php echo $this->load->section('front_header', 'sections/front_header'); ?>
        <?php echo $this->load->section('home_banner', 'sections/home_banner'); ?>
        <?php
        echo $output;

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
