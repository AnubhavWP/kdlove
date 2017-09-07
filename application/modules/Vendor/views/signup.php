
<?php
$show_pop = '';
$show_pop = $this->input->get('pop_up', TRUE);

$vendor_id = !empty($vendor_info->id) ? $vendor_info->id : '';
$popup = $this->session->userdata('vendor_pop');

if(!empty($popup) && $show_pop == 'false'){
    $popHmtl = "";
}elseif (!empty($popup) && $show_pop == 'true') {
    $popHmtl = "data-backdrop='static' data-keyboard='false'";
}
else{
     $popHmtl = "data-backdrop='static' data-keyboard='false'";
}

?>

<div class="modal fade" id="myModal" role="dialog" <?php echo $popHmtl; ?>>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
            </div>
            <div class="modal-body ramu">
                <h2>Welcome to Kdlove Event,<span>the best place to power your business</span></h2>
                <form id="vendor_pop_form" method="post" action="<?php echo current_url()?>">
                    <div class="col-md-12"><label>Select Your business Category</label></div>
                    <div class="col-md-12">
                        <select class="selectpicker" name="business_catgory">
                            <?php
                            if (!empty($categories)) {
                                foreach ($categories as $key => $cat) {
                                    ?>
                                    <option value="<?php echo $key; ?>"><?php echo $cat; ?></option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12"><label>Select Your Region</label></div>
                    <div class="col-md-12">
                        <select class="selectpicker" name="region">
                            <?php
                            if (!empty($regions)) {
                                foreach ($regions as $k => $r) {
                                    ?>
                                    <option value="<?php echo $k; ?>"><?php echo $r; ?></option>
                                <?php }
                            }
                            ?>
                        </select>  
                    </div>
                    <input type="submit" id="save" value="See Plans & Pricing" class="next" style="margin: 16px 20px 8px 11px !important; display: initial !important; float: right !important;"/>
                </form>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
</div>

<div class="container">
    <div class="bgmain">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h2>Plan &amp; Pricing <span>Rates based on your selection</span></h2>
        </div>
            <?php 
            $category = '';
            $region = '';
            if(!empty($vendor_info->business_category)){
                $category = $vendor_info->business_category->name;
            }
            if(!empty($vendor_info->region)){
                $region = $vendor_info->region->name;
            }
            ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="toplist"><span><i class="fa fa-bars" aria-hidden="true"></i></span><?php echo $category;?><a href="#" class="update_pop">Change</a></div>
            <div class="toplist"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span><?php echo $region;?><a href="#" class="update_pop">Change</a></div>
        </div>




        <div class="col-xs-3 col-md-3 col-sm-3  float-shadow pl-0 pr-0">   
            <div class="price_table_container">
                <div class="price_table_heading grayhaed">Lite</div>
                <div class="price_table_body">
                    <div class="price_table_row cost warning-text"><strong>Free</strong><div class="little"></div>
                        <a href="<?php echo base_url('Vendor/vendor_plan/1/'.$vendor_id)?>" class="btn btn-warning btn-lg btn-block btnmid">Select <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>

                    <div class="price_table_row black">Unlimited User Accounts</div>
                    <div class="price_table_row black boder">100 Photos</div>
                    <div class="subheading">Advretising</div>
                    <div class="price_table_row lightgray">No Placement on WeddingWire.com Vendor Directory</div>
                    <div class="price_table_row lightgray">No Placement on WeddingWire.com Network Vendor Directory</div>
                    <div class="price_table_row lightdark">Easy-to-Use storefront Builder</div>
                    <div class="price_table_row lightgray">No Weddingwire Analytics</div>  
                    <div class="price_table_row lightgray">NO Fixed Availability</div>
                    <div class="price_table_row lightgray">No Removal of Compettor Ads</div> 
                    <div class="price_table_row lightgray">No Storefront Enhancements </div>   
                    <div class="price_table_row lightdark">5 Photos one Albume Limit </div> 
                    <div class="price_table_row lightdark">Local Events</div>   
                    <div class="price_table_row lightgray">No Local Details</div> 
                </div>

            </div>
        </div>

        <div class="col-xs-3 col-md-3 col-sm-3  float-shadow pl-0 pr-0">   
            <div class="price_table_container">
                <div class="price_table_heading green">Professional</div>
                <div class="price_table_body">
                    <div class="price_table_row cost primary-text"><strong>$ 85</strong><span>/MONTH</span><div class="little"></div>
                        <a href="#" class="btn btn-warning btn-lg btn-block btnmid">Select <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>

                    <div class="price_table_row black">Unlimited User Accounts</div>
                    <div class="price_table_row black boder">500 Photos</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Guaranteed Placement on WeddingWire.com Vendor Directory</div>
                    <div class="price_table_row lightdark">Guaranteed Placement on WeddingWire.com Network Vendor Directory</div>
                    <div class="price_table_row lightdark">Easy-to-Use storefront Builder</div>
                    <div class="price_table_row lightdark">Weddingwire Analytics</div> 
                    <div class="price_table_row lightdark"> NO Fixed Availability</div>  
                    <div class="price_table_row lightdark">Removal of Compettor Ads</div>  
                    <div class="price_table_row lightdark">Storefront Enhancements </div>  
                    <div class="price_table_row lightdark">500 Photos</div> 
                    <div class="price_table_row lightdark">Local Events</div> 
                    <div class="price_table_row lightdark">No Local Details</div> 
                </div>

            </div>
        </div>

        <div class="col-xs-3 col-md-3 col-sm-3  float-shadow pl-0 pr-0">   
            <div class="recommended yellow"><strong> Most Popular</strong></div>  
            <div class="price_table_container">
                <div class="price_table_heading yellow">Featured Ad</div>
                <div class="price_table_body">
                    <div class="price_table_row cost success-text"><strong>$ 140</strong><span>/MONTH</span><div class="little">limited Avilability</div>
                        <a href="#" class="btn btn-warning btn-lg btn-block btnmid">Select <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                    <div class="price_table_row black">Unlimited User Accounts</div>
                    <div class="price_table_row black boder">1000 Photos</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">First Page Ad on WeddingWire.com Vendor Directory</div>
                    <div class="price_table_row lightdark">First Page Ad on WeddingWire.com Network Vendor Directory</div>
                    <div class="price_table_row lightdark">Easy-to-Use storefront Builder</div>
                    <div class="price_table_row lightdark">Weddingwire Analytics</div>   
                    <div class="price_table_row lightdark"> NO Fixed Availability</div> 
                    <div class="price_table_row lightdark">Removal of Compettor Ads</div>
                    <div class="price_table_row lightdark">Storefront Enhancements </div> 
                    <div class="price_table_row lightdark">1000 Photos</div> 
                    <div class="price_table_row lightdark">Local Events</div>  
                    <div class="price_table_row lightdark">No Local Details</div>
                </div>

            </div>
        </div>

        <div class="col-xs-3 col-md-3 col-sm-3 float-shadow pl-0 pr-0">   
            <div class="price_table_container">
                <div class="price_table_heading darkyellow">Spotlight Ad</div>

                <div class="price_table_body">
                    <div class="price_table_row cost info-text"><strong>1 Spot Left</strong><div class="little"></div>
                        <a href="#" class="btn btn-warning btn-lg btn-block btnmid">Learn More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                    <div class="price_table_row black">Unlimited User Accounts</div>
                    <div class="price_table_row black boder">1000 Photos</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Best Possible, Top Category Ad on  WeddingWire.com Vendor Directory</div>
                    <div class="price_table_row lightdark">Best Possible, Top Category Ad on  WeddingWire.com Network Vendor Directory</div>
                    <div class="price_table_row lightdark">Easy-to-Use storefront Builder</div>
                    <div class="price_table_row lightdark">Weddingwire Analytics</div>  
                    <div class="price_table_row lightdark">Fixed Availability</div>   
                    <div class="price_table_row lightdark">Removal of Compettor Ads</div>
                    <div class="price_table_row lightdark">Storefront Enhancements </div>
                    <div class="price_table_row lightdark">1000 Photos</div>
                    <div class="price_table_row lightdark">Local Events</div>
                    <div class="price_table_row lightdark">No Local Details</div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 co0l-xs-12 centerheading">Plus free features listed below:</div>
        <div class="col-xs-3 col-md-3 col-sm-3  float-shadow pl-0 pr-0">   
            <div class="price_table_container mt-0">
                <div class="price_table_body">
                    <div class="subheading">Sale</div>
                    <div class="price_table_row lightdark">Contact Form + Inquries</div>
                    <div class="price_table_row lightdark">Booking Managment</div>
                    <div class="price_table_row lightgray">No Online Contracts</div>
                    <div class="price_table_row lightgray">No Digital Contract Signing</div>  
                    <div class="price_table_row lightgray">No ePayment $ elnvoices</div>
                    <div class="price_table_row lightgray">No Secure Client Transactions</div> 
                    <div class="price_table_row lightgray">No Event Questionnaries</div>   
                    <div class="price_table_row lightgray">No Lead + Task Managment</div> 
                    <div class="subheading">Marketing</div>
                    <div class="price_table_row lightgray">No Video Builder</div>   
                    <div class="price_table_row lightgray">No SEO Optimization</div> 
                    <div class="subheading">Site</div>
                    <div class="price_table_row lightgray">No Branded Client Sites</div> 
                    <div class="price_table_row lightdark">Website Widgets</div>
                    <div class="subheading">Reputation</div> 
                    <div class="price_table_row lightgray">Review Collection Tool</div>
                    <div class="price_table_row lightgray">No Review Sorting</div>
                    <div class="price_table_row lightgray">No Review Incentive Program</div>
                    <div class="price_table_row lightgray">Award &amp; Badges</div>
                    <div class="price_table_row lightgray">Pro Endorsement Tool</div>
                    <div class="price_table_row lightgray">No Review &amp; Endorsement Highlight</div>  
                    <div class="subheading">Networking</div>
                    <div class="price_table_row lightgray">Peer Networking Tool</div>
                    <div class="price_table_row lightgray">No Preferred Pros</div>
                    <div class="price_table_row lightgray">Referral Leads</div>
                    <div class="subheading">Support Feature</div>
                    <div class="price_table_row lightgray">No Access to Monthly Webinars</div>
                    <div class="price_table_row lightgray">9am-6pm ET Email Supprot</div>
                    <div class="price_table_row lightgray">No Expert Phone Support</div>
                    <div class="price_table_row lightgray">No Dedicated Coustmer Success Representative</div>
                    <div class="price_table_heading grayhaed">Lite</div>
                    <div class="price_table_row cost warning-text"><strong>Free</strong><div class="little"></div>
                        <a href="<?php echo base_url('Vendor/vendor_plan/1/'.$vendor_id)?>" class="btn btn-warning btn-lg btn-block btnmid">Select <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                </div>

            </div>
        </div>

        <div class="col-xs-3 col-md-3 col-sm-3  float-shadow pl-0 pr-0">   
            <div class="price_table_container mt-0">
                <div class="price_table_body">
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Contact Form + Inquries</div>
                    <div class="price_table_row lightdark">Booking Managment</div>
                    <div class="price_table_row lightdark">Online Contracts</div>
                    <div class="price_table_row lightdark">Digital Contract Signing ( web + Mobile)</div> 
                    <div class="price_table_row lightdark">ePayment $ elnvoices</div>  
                    <div class="price_table_row lightdark">Secure Client Transactions</div>  
                    <div class="price_table_row lightdark">Event Questionnaries </div>  
                    <div class="price_table_row lightdark">Lead + Task Managment</div> 
                    <div class="subheading"></div>  
                    <div class="price_table_row lightdark">Video Builder</div> 
                    <div class="price_table_row lightdark">SEO Optimization</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Branded Client Sites</div> 
                    <div class="price_table_row lightdark">Website Widgets</div>   
                    <div class="subheading"></div> 
                    <div class="price_table_row lightdark">Review Collection Tool</div>
                    <div class="price_table_row lightdark">Review Sorting</div>
                    <div class="price_table_row lightdark">Review Incentive Program</div>
                    <div class="price_table_row lightdark">Award &amp; Badges</div>
                    <div class="price_table_row lightdark">Pro Endorsement Tool</div>
                    <div class="price_table_row lightdark">Review &amp; Endorsement Highlight</div>  
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Peer Networking Tool</div>
                    <div class="price_table_row lightdark">No Preferred Pros</div>
                    <div class="price_table_row lightdark">Referral Leads</div>  
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">No Access to Monthly Webinars</div>
                    <div class="price_table_row lightdark">24/7 Email Supprot</div>
                    <div class="price_table_row lightdark">No Expert Phone Support</div>
                    <div class="price_table_row lightdark">No Dedicated Coustmer Success Representative</div>  
                    <div class="price_table_heading green">Professional</div>
                    <div class="price_table_row cost warning-text"><strong>$85</strong><span>/mo</span><div class="little"></div>
                        <a href="#" class="btn btn-warning btn-lg btn-block btnmid">Select <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                </div>

            </div>
        </div>

        <div class="col-xs-3 col-md-3 col-sm-3  float-shadow pl-0 pr-0">   
            <div class="price_table_container mt-0">
                <div class="price_table_body">
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Contact Form + Inquries</div>
                    <div class="price_table_row lightdark">Booking Managment</div>
                    <div class="price_table_row lightdark">Online Contracts</div>
                    <div class="price_table_row lightdark">Digital Contract Signing ( web + Mobile)</div>   
                    <div class="price_table_row lightdark">ePayment $ elnvoices</div> 
                    <div class="price_table_row lightdark">Secure Client Transactions</div>
                    <div class="price_table_row lightdark">Event Questionnaries</div> 
                    <div class="price_table_row lightdark">Lead + Task Managment</div> 
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Video Builder</div> 
                    <div class="price_table_row lightdark">SEO Optimization</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Branded Client Sites</div> 
                    <div class="price_table_row lightdark">Website Widgets  </div>
                    <div class="subheading"></div> 
                    <div class="price_table_row lightdark">Review Collection Tool</div>
                    <div class="price_table_row lightdark">Review Sorting</div>
                    <div class="price_table_row lightdark">Review Incentive Program</div>
                    <div class="price_table_row lightdark">Award &amp; Badges</div>
                    <div class="price_table_row lightdark">Pro Endorsement Tool</div>
                    <div class="price_table_row lightdark">Review &amp; Endorsement Highlight</div> 
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Peer Networking Tool</div>
                    <div class="price_table_row lightdark">No Preferred Pros</div>
                    <div class="price_table_row lightdark">Referral Leads</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">No Access to Monthly Webinars</div>
                    <div class="price_table_row lightdark">24/7 Email Supprot</div>
                    <div class="price_table_row lightdark">No Expert Phone Support</div>
                    <div class="price_table_row lightdark">No Dedicated Coustmer Success Representative</div>
                    <div class="price_table_heading yellow">Featured Ad</div>
                    <div class="price_table_row cost warning-text"><strong>$140</strong><span>/mo</span><br><div class="little">limited Avilability</div>
                        <a href="#" class="btn btn-warning btn-lg btn-block btnmid">Select <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div> 
                </div>

            </div>
        </div>

        <div class="col-xs-3 col-md-3 col-sm-3 float-shadow pl-0 pr-0">   
            <div class="price_table_container mt-0">
                <div class="price_table_body">
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Contact Form + Inquries</div>
                    <div class="price_table_row lightdark">Booking Managment</div>
                    <div class="price_table_row lightdark">Online Contracts</div>
                    <div class="price_table_row lightdark">Digital Contract Signing ( web + Mobile)</div>  
                    <div class="price_table_row lightdark">ePayment $ elnvoices</div>   
                    <div class="price_table_row lightdark">Secure Client Transactions</div>
                    <div class="price_table_row lightdark">Event Questionnaries</div>
                    <div class="price_table_row lightdark">Lead + Task Managment</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Video Builder</div> 
                    <div class="price_table_row lightdark">SEO Optimization</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Branded Client Sites</div> 
                    <div class="price_table_row lightdark">Website Widgets</div> 
                    <div class="subheading"></div> 
                    <div class="price_table_row lightdark">Review Collection Tool</div>
                    <div class="price_table_row lightdark">Review Sorting</div>
                    <div class="price_table_row lightdark">Review Incentive Program</div>
                    <div class="price_table_row lightdark">Award &amp; Badges</div>
                    <div class="price_table_row lightdark">Pro Endorsement Tool</div>
                    <div class="price_table_row lightdark">Review &amp; Endorsement Highlight</div>
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">Peer Networking Tool</div>
                    <div class="price_table_row lightdark">No Preferred Pros</div>
                    <div class="price_table_row lightdark">Referral Leads</div>  
                    <div class="subheading"></div>
                    <div class="price_table_row lightdark">No Access to Monthly Webinars</div>
                    <div class="price_table_row lightdark">24/7 Email Supprot</div>
                    <div class="price_table_row lightdark">No Expert Phone Support</div>
                    <div class="price_table_row lightdark">No Dedicated Coustmer Success Representative</div> 
                    <div class="price_table_heading darkyellow">Spotlight Ad</div>
                    <div class="price_table_row cost warning-text"><strong>Free</strong><div class="little"></div>
                        <a href="#" class="btn btn-warning btn-lg btn-block btnmid">Learn More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
                </div>

            </div>
        </div>


    </div>
    <div class="little"></div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
        <div class="tablefooter"> <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-lg-offset-3 col-md-offset-3 col-xs-offset-0 col-sm-offset-0">
                <div class="col-lg-6">Question</div>  
                <div class="col-lg-6"><a href="#" class="btn btn-warning btn-lg btn-block btnmid1">Contact Your Local Rep <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div></div></div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript">

 $(document).ready(function() {
    <?php if(!$popup || $show_pop === 'true') {?>
        $('#myModal').modal({
             show: true,
        });
    <?php } ?>
   
   $('#save').click(function(e){
      e.preventDefault();
      $('#vendor_pop_form').submit();
   });
   
   
    $('.update_pop').click(function(e){
        e.preventDefault();
       $('#myModal').attr('data-backdrop','static');
       $('#myModal').attr('data-keyboard','false');
       $('#myModal').modal('show');
   });
   
 });

</script>