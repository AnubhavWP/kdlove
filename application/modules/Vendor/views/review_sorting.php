<?php
if (!empty($current_plan) && $current_plan == 'Lite') {
    ?>

    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
        <div class="review">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center blink">
                <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                <h4>This feature is not available with your current membership. </h4>
                <a href="#">View membership options </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left no_pad" style="margin:25px 0px;">
                <h4><b>Review Sorting</b></h4>
                <p>Change the default sorting of your reviews on your Storefront</p>
                <div class="div"></div>
                <div class="form-group">
                    <label class="control-label col-sm-4 no_pad" for="email">Sort Reviews By :</label>
                    <div class="col-sm-6 no_pad">
                        <select class="form-control" id="sel1" disabled="">
                            <option>Rating : Highest</option>
                            <option>Event Date : Newest</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }else{
    
} ?>