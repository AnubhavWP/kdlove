<?php
$urlSegment = $this->uri->segment_array();
if (!empty($urlSegment)) {
    $uriString = end($urlSegment);
}
//echo $uriString;
?>

<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 log_menu">
    <ul>
        <li>Account Settings</li>
        <li><a href="<?php echo base_url('Vendor/Dashboard'); ?>" class="<?php echo ($uriString == 'Dashboard') ? 'log_active' : '' ?>"><i class="fa fa-group fa-fw"></i> Employees</a></li>
        <li><a href="<?php echo base_url('Vendor/Setting/update_business_logo'); ?>"><i class="fa fa-bookmark fa-fw"></i>Business Logo</a></li>
        <li><a href="<?php echo base_url('Vendor/Dashboard/vendor_business_information'); ?>" class="<?php echo ($uriString == 'vendor_business_information') ? 'log_active' : '' ?>"><i class="fa fa-briefcase fa-fw"></i> Business Information</a></li>
        <li><a href=""><i class="fa fa-credit-card fa-fw"></i> Billing</a></li>
        <li>Content Settings</li>
        <li><a href="<?php echo base_url('Vendor/Dashboard/review_sorting'); ?>" class="<?php echo ($uriString == 'review_sorting') ? 'log_active' : '' ?>"><i class="fa fa-star fa-fw"></i> Review Sorting</a></li>
        <li><a href="<?php echo base_url('Vendor/Dashboard/quick_leads'); ?>" class="<?php echo ($uriString == 'quick_leads') ? 'log_active' : '' ?>"><i class="fa fa-mobile fa-fw"></i> Quick Leads</a></li>


        <li><a href="<?php echo base_url('Vendor/Dashboard/review_request'); ?>" class="<?php echo ($uriString == 'review_request') ? 'log_active' : '' ?>"><i class="fa fa-envelope-o fa-fw"></i> Review Requests</a></li>
        <li>Client Settings</li>
        <li><a href="#"><i class="fa fa-phone-square fa-fw"></i> Client Responses</a></li>
        <li><a href="#"><i class="fa fa-desktop fa-fw"></i> Client Sites</a></li>
        <li><a href="#"><i class="fa fa-th-large fa-fw"></i> Products & Packages</a></li>
        <li><a href="#"><i class="fa fa-file-text fa-fw"></i> Proposals & Contracts</a></li>
        <li><a href="#"><i class="fa fa-money fa-fw"></i> Payments</a></li>
        <li><a href="#"><i class="fa fa-list-ul fa-fw"></i> </i>Qusetionnaires</a></li>
    </ul>
</div>
