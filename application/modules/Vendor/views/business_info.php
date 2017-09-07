<?php 
//dump($vendor_info);
//dump($business_category);
?>
<form name="" method="post" action="<?php echo current_url()?>">
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"><div class="business">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4>General Information</h4>
            <div class="form-group gap">
                <label class="control-label col-sm-4 no_pad" for="txt">Business Name* :</label>
                <div class="col-sm-8">
                    <input type="txt" class="form-control" name="business_name" id="txt" placeholder="Business Name" value="<?php echo !empty($vendor_info->business_name) ? $vendor_info->business_name : ''?>">
                </div>
            </div>
            <div class="form-group gap">
                <label class="control-label col-sm-4 no_pad" for="txt">Business Phone :</label>
                <div class="col-sm-8">
                    <input type="txt" class="form-control" name="phone" id="txt" placeholder="Business Phone" value="<?php echo !empty($vendor_info->phone) ? $vendor_info->phone : ''?>">
                </div>
            </div>             
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="checkbox-inline" style="margin-bottom:0px;"><input type="checkbox" name="service_lqbtq" value="1"><b>Service LGBTQ Weddings / Ceremonies</b></label>
            <p style="color:#999">By checking this, your business will be listed in the GayWeddings.com directory powered by WeddingWire.</p>
            <h4>Request to Add/Remove Business Category:</h4>
            <p>Check the categories you'd like to add and uncheck the ones you'd like to remove from your account. A WeddingWire representative may contact you to confirm these changes.</p>
        </div>
        
        <?php
        if (!empty($business_category)) {
            foreach ($business_category as $key => $cat) {
                if(!empty($vendor_info->business_category) && $vendor_info->business_category->id == $key){
                    $chk = 'checked';
                }else{
                    $chk = '';
                }
                ?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="business_cat[]" value="<?php echo $key; ?>" <?php echo $chk; ?>><?php echo ucfirst($cat); ?></label></div>
            <?php }
        } ?>
        
        <div class="clearfix"></div>
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center"><input type="submit" value="Save" class="prev"></div>
        
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center"><a class="next" href="#">Cancel </a></div></div>
</div>
</form>