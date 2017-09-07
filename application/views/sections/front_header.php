<div class="container-fluid no_pad">
    <div class="wsmenucontainer clearfix">
        <div class="overlapblackbg"></div>
        <div class="wsmobileheader clearfix">
            <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
            <a class="smallogo" href="<?php echo base_url('vendor') ?>"><img src="<?php echo base_url(); ?>assets/front/images/logo.png" width="87" alt="" /></a>
            <a class="callusicon" href="tel:123456789"><span class="fa fa-phone"></span></a>
        </div>
        <div class="headerfull">
            <div class="wsmain">
                <div class="smllogo"><a href="<?php echo base_url('vendor') ?>"><img src="<?php echo base_url(); ?>assets/front/images/logo.png" alt=""/></a></div>
                <nav class="wsmenu clearfix">
                    <ul class="mobile-sub wsmenu-list">
                        <li>
                            <a class="active" href="#"></i>Advertising <span class="arrow"></span></a>
                            <ul class="wsmenu-submenu">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Storefront </a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Search Engine optimization</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"></i>Clients <span class="arrow"></span></a>
                            <ul class="wsmenu-submenu">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Inquiries </a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Contracts</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Questionnaires</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Payments</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Task</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Reviews <span class="arrow"></span></a>
                            <ul class="wsmenu-submenu">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Review Management </a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Awards</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Networking <span class="arrow"></span></a>
                            <ul class="wsmenu-submenu">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Local Networking </a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Refferal Leads</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Endorsements</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Webniars</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a></li>
                        <?php if(!$this->Vendor_model->logged_in()){?>
                        <li><a href="<?php echo base_url('Vendor/login');?>">Login</a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url('Vendor/sign_up');?>">Join</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('message_type')) {
    ?>
    <div class="alert alert-<?= $this->session->userdata('message_type'); ?> fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="fa-fw fa fa-<?= $this->session->userdata('message_type'); ?> "></i>
        <strong><?php echo ucfirst($this->session->userdata('message_type')); ?></strong>
        <?= $this->session->userdata('message'); ?>
    </div>
<?php } ?>