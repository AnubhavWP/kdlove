<style>
    .repeted{width:100%; display:block; height:auto; overflow:hidden; clear:both; margin: 10px 0px; border-bottom:1px solid #ccc}    
    .popover{
            top: 82px;
    right: 16px;
    display: block;
    left: 425px !important;
    }
</style>
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
    <div class="general">
        <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9 text-left main"><h4><b>Employees</b></h4></div>
        <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 text-center"><a class="employee" href="<?php echo base_url('Vendor/Dashboard/add_employee');?>">Add New Employee</a></div>
        <div class="div"></div>
        <?php
        $popcontent = "";
        if (!empty($vendor_info->users)) {
            foreach ($vendor_info->users as $users) {
                 $popcontent = "<div class='btn-group'>
                        <a class='btn btn-default' href=". base_url('Vendor/Dashboard/UpdateVendorEmployee/'.$users->id).">Edit</a>
                        <a class='btn btn-default' href=". base_url('Vendor/Dashboard/DeleteVendorEmployee/'.$users->id)."><i class='fa fa-1x fa-trash-o' aria-hidden='true'></i></a>
                </div>";
                ?>
                <div class="repeted">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="media">
                            <div class="media-left">
                                <img src="<?php echo base_url(); ?>assets/front/images/user.png" class="media-object" style="width:60px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo!empty($users->first_name) ? $users->first_name : '' ?> <?php echo!empty($users->last_name) ? $users->last_name : '' ?><span style="color:#999;"><?php echo!empty($users->type) ? ucfirst($users->type) : '' ?></span></h4>
                                <p><a href="#"><?php echo!empty($users->email) ? $users->email : '' ?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-5 col-md-5 col-lg-5 login_detail">
                        <p>last login:&nbsp;&nbsp;<?php echo!empty($users->last_login) ? date('S d Y at h:i A', strtotime($users->last_login)) : '<span style="color:#20b1aa">Not Available</span>' ?></p>
                    </div>
                    <div class="sett_cog">
                        <a href="javascript:void(0)" data-html="true"  data-placement="left" data-toggle="popover" data-content="<?php echo $popcontent; ?>"><i class="fa fa-cog fa-2x"></i></a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="clearfix"></div>';
            echo '<p class = "alert-danger custom-padding">Record Not Found.</p>';
        }
        ?>
    </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>