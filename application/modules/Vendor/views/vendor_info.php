<!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url(); ?>assets/front/css/dropzone.min.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/basic.min.css">



<style>
    .enabled {border-radius: 52%;border: 1px solid #20B1AA;color: #fff;overflow: hidden;padding-bottom: 0;padding-right: 0;padding-top: 0;width: 45px !important;height: 45px!important;background: #20B1AA;}
    .number-step{color:#999 }
    .submit-button {
    color: #fff;
    background: #20b1aa;
    padding: 5px;
    display: block;
    margin: 30px 0px;
    font-size: 15px;
}
    
</style>

<div class="container-fluid">
    <div class="container">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
            <div class="dash_box">
                <h4>Your KDEVENTPLACE Account Information</h4>
                <hr class="separation">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no_pad">
                    <p>Complete or confirm <b>your business information</b> below, then select 'Next'. Fields with an * are required and can be edited in your account any time.</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-bootstrapWizard text-center">
                        <ul class="number-step nav nav-tabs custome">
                            <li class="enabled">1</li>
                            <li class="">2</li>
                            <li class="">3</li>
                            <li class="">4</li>
                        </ul>
                        <ul class="nav nav-tabs" role="tablist" style="display: none;">
                            <li role="presentation" class="active"><a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2"></a></li>
                            <li role="presentation" class="disabled"><a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">2</a></li>
                            <li role="presentation" class="disabled"><a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">3</a></li>
                            <li role="presentation" class="disabled"><a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">4</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php
                $vendor_id = $vendor_info->id;
                $category = '';
                $region = '';
                $plan = 'Free';
                if (!empty($vendor_info->business_category)) {
                    $category = $vendor_info->business_category->name;
                }
                if (!empty($vendor_info->region)) {
                    $region = $vendor_info->region->name;
                }
                ?>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 no_pad">
                    <form name="" action="<?php echo current_url()?>" method="post" id="vendor-attr">
                        <div class="tab-content">
                        <div class="tab-pane active" id="step2" role="tabpanel">
                            
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Plan Type :</label>
                                <div class="col-sm-8">
                                    <span><?php echo $plan ?></span>&nbsp;&nbsp;<a href="<?php echo base_url('Vendor/sign_up?pop_up=true')?>" class="">Change</a>
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Region :</label>
                                <div class="col-sm-8">
                                    <?php echo $region ?>&nbsp;&nbsp;<a href="<?php echo base_url('Vendor/sign_up?pop_up=true')?>" class="">Change</a>
                                </div>
                            </div>
                            
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Business Category :</label>
                                <div class="col-sm-8">
                                     <?php echo $category ?>&nbsp;&nbsp;<a href="<?php echo base_url('Vendor/sign_up?pop_up=true')?>" class="">Change</a>
                                </div>
                            </div>
                            
                            
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="email">Country Code :</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="country" name="country_id">
                                        <option value="1">India</option>
                                        <option value="2">China</option>
                                        <option value="3">London</option>
                                        <option value="4">Africa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Business Name :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="business_name" required="" value="<?php echo !empty($vendor_info->business_name) ? $vendor_info->business_name : ''?>" class="form-control" id="txt" placeholder="Business Name">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Business Phone :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" required="" value="<?php echo !empty($vendor_info->phone) ? $vendor_info->phone : ''?>" class="form-control" id="txt" placeholder="Business Phone">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Address1 :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="address1" class="form-control" value="<?php echo !empty($vendor_info->address1) ? $vendor_info->address1 : ''?>" id="txt" placeholder="Address1">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">Address2 :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="address2" value="<?php echo !empty($vendor_info->address2) ? $vendor_info->address2 : ''?>" class="form-control" id="txt" placeholder="Address2">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="txt">City :</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="country" name="city_id">
                                        <option value="1">India</option>
                                        <option value="2">China</option>
                                        <option value="3">London</option>
                                        <option value="4">Africa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="email">Email :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" required="" data-parsley-type ="email" value="<?php echo !empty($vendor_info->email) ? $vendor_info->email : ''?>" class="form-control" id="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="email">Password :</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" required=""  class="form-control" id="pass" placeholder="Enter password">
                                </div>
                            </div>
                            
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="email">Confirm Password :</label>
                                <div class="col-sm-8">
                                    <input type="password" required="" data-parsley-equalto="#pass"  class="form-control" id="pass" placeholder="Enter password">
                                </div>
                            </div>
                            
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="email">State Code :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="state_id" value="<?php echo !empty($vendor_info->state_id) ? $vendor_info->state_id : ''?>" class="form-control" id="email" placeholder="State Code">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="email">Zip Code :</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php echo !empty($vendor_info->zipcode) ? $vendor_info->zipcode : ''?>" name="zipcode" class="form-control" id="email" placeholder="Zip code">
                                </div>
                            </div>
                            <div class="form-group gap">
                                <label class="control-label col-sm-4 text-right" for="pass">Website text :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="website_text" value="<?php echo !empty($vendor_info->website_text) ? $vendor_info->website_text : ''?>" class="form-control" id="pass" placeholder="Website Text">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center"><a class="prev" href="#"><i class="fa fa-angle-double-left"></i> Pre</a></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center"><a class="next" href="#tab2" tab-number = "2" data-toggle="tab" data-target="#step3">Next <i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="tab-pane" id="step3" role="tabpanel">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_pad">
                                <p class="hidden">Select <b>your primary business service</b> that you provide for weddings (check up to 1), then select 'Next'</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_pad">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="vendor_area[]" value="1">Band</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="vendor_area[]" value="2">Wedding Planning</label></div>
                            </div>                           
                            <div class="clearfix"></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center"><a class="prev" tab-number = "1" href="#"><i class="fa fa-angle-double-left"></i> Pre</a></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center"><a class="next" tab-number = "3" href="#">Next <i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="tab-pane" id="step4" role="tabpanel">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_pad">
                                <p class="hidden">Select <b>your ceremony &amp; Reception Venue service</b> below, then select 'Next'. Fields with an * are required and can be edited in your account at any time.</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 opt no_pad">
                                <h4>What is the maximum capacity of your venue*?</h4>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no_pad"><input type="text"  name="maximum_capacity_venue" value="<?php echo !empty($vendor_info->maximum_capacity_venue) ? $vendor_info->maximum_capacity_venue : ''?>" class="form-control" id="capacity"></div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>What is the minimum number of guests required to book your venue*?</h4>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no_pad"><input type="text"  name="guest_required_venue" value="<?php echo !empty($vendor_info->guest_required_venue) ? $vendor_info->guest_required_venue : ''?>" class="form-control" id="capacity"></div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>How many event spaces or rooms does your venue offer*?</h4>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no_pad"><input type="text"  name="venue_rooms" value="<?php echo !empty($vendor_info->venue_rooms) ? $vendor_info->venue_rooms : ''?>" class="form-control" id="capacity"></div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>Describe your venue*? <span style="color:#999;">(select upto 3)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_detail[]" value="1">Art Gallery</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                                <div class="clearfix"></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_detail[]" value="2">Garden</label></div>
                               
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>Describe the style of your venue*? <span style="color:#999;">(select upto 3)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_style[]" value="1">Coastal</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_style[]" value="2">Vintage</label></div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>What kind of settings are available*? <span style="color:#999;">(check all that apply)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_setting[]" value="1">Covered Outdoor</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_setting[]" value="2">Indoor</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>Which of the following wedding events does your venue service*? <span style="color:#999;">(check all that apply)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="venue_services[]" value="1">Ceremony</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" value="2">Rehersal Dinner</label></div>
                                <h4>What event services do you offer*? <span style="color:#999;">(check all that apply)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="event_sevices[]" value="1">Accommodations</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="event_sevices[]" value="2">All Inclusive Packages</label></div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>What food and beverages itmes are available*? <span style="color:#999;">(check all that apply)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="foods_avaliable[]" value="1">Barware</label></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="foods_avaliable[]" value="2">Flatware</label></div>
                                <div class="clearfix"></div>
                                <div class="div"></div>
                                <h4>What transportation and access is available*? <span style="color:#999;">(check all that apply)</span></h4>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="transportation[]" value="1">Parking </label></div>
                                <div class="clearfix"></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="transportation[]" value="2">Valet</label></div>
                                <div class="clearfix"></div>                                    
                            </div>                           
                            <div class="clearfix"></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center"><a class="prev" tab-number = "2" href="#"><i class="fa fa-angle-double-left"></i> Pre</a></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center"><a class="next" tab-number = "4" href="#">Next <i class="fa fa-angle-double-right"></i></a></div>
                        </div>
                        <div class="tab-pane" id="complete" role="tabpanel">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_pad">
                                <p class="hidden">Complete or confirm your Ceremony &amp; Reception Venue pricing information below, then select 'Finish'. Fields with an * are required and can be edited in your account at any time. <i class="fa fa-question-circle"></i></p>
                            </div>                           
                            <div class="div"></div>
                            <h4>Which of the following are included in starting site free*? <span style="color:#999;">(check all that apply)</span></h4>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="starting_site_free[]" value="1">Bridal Suite</label></div>
                            <div class="clearfix"></div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="starting_site_free[]"  value="2">China</label></div>
                            <div class="clearfix"></div>                             
                            <div class="div"></div>
                            <h4>Which of the following are included in the cost of wedding catering*? <span style="color:#999;">(check all that apply)</span></h4>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="wedding_catering_cost[]" value="1">Cake Cutting</label></div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><label class="checkbox-inline"><input type="checkbox" name="wedding_catering_cost[]" value="2">Test</label></div>
                            <div class="clearfix"></div>
                            <div class="div"></div>
                            <h4>What kind of settings are available*? <span style="color:#999;">(check all that apply)</span></h4>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="dropzone1" id="attachment">
                                    <div class="dz-message">
                                        <h3 style="cursor:pointer"> Drag and Drop your files here Or Click here to upload</h3>
                                    </div>
                                </div>
                            </div>                       
                            <div class="clearfix"></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center"><a class="prev" tab-number = "3" href="#"><i class="fa fa-angle-double-left"></i> Pre</a></div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center"><input type="submit" class="submit-button"  value="Save"/></div>
                            
                        </div>
                    </div>
                        
                    </form>
                   
                </div>
            </div>
        </div>
            </div>
            
        </div>
        
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/front/js/dropzone.min.js"></script>
<script type="text/javascript">
        
    $(document).ready(function () {
        
        var file = new Dropzone("#attachment",{
			url: "<?php echo base_url('Vendor/upload_files/'.$vendor_id) ?>",
			// maxFilesize: 2,  // maximum size to uplaod 
			method:"post",
			// acceptedFiles:"image/*", // allow only images
			paramName:"userfile",
			// dictInvalidFileType:"Image files only allowed", // error message for other files on image only restriction 
			addRemoveLinks:true,
			autoProcessQueue: true
		});


		$('#status').click(function(){
			if($(this).val()=='Enable'){
				file.processQueue();	
				// $('.alert-success').show();
				// $('.alert-danger').hide();		
			
			}
			// else{
			// 	$('.alert-success').hide();
			// 	$('.alert-danger').show();
			// }
		});
                
        //Upload file onchange 

        file.on("sending",function(a,b,c){
                a.token=Math.random();
                c.append("token",a.token); //Random Token generated for every files 
        });


// delete on upload 

        file.on("removedfile",function(a){
                var token=a.token;
                $.ajax({
                        type:"post",
                        data:{token:token},
                        url:"<?php echo base_url('Vendor/delete') ?>",
                        cache:false,
                        dataType: 'json',
                        success: function(res){
                            alert('Selected file removed !');
                            return false;
//                            var response = $.parseJSON(res);
//                            console.log(res);
//                            if(response.deleted === 'true'){
//                                 alert('Selected file removed !');		
//                            }else{
//                                alert('Opps! Something went wrong.');	
//                            }
                        }
                });
        });
        
        
        $(".next").click(function (e) {
            e.preventDefault();
            var tabCount = $(this).attr('tab-number');
            var chk = $('#vendor-attr').parsley().isValid()
             if(chk){
                  $("ul.number-step li").each(function() {
                    var a = $(this).text();
                    if (a === tabCount ) {
                      $(this).addClass("enabled");
                      $(this).prev().removeClass("enabled");
                    } 
            });
            
             var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);  
          }else{
              $('#vendor-attr').submit();
              return false;
          }
        });
        
        
//            $('.vendor-pr').on('click', function(e) {
//             e.preventDefault();
//             var chk = isvalidForm();
//             if(chk){
//                var $active = $('.wizard .nav-tabs li.active');
//                $active.next().removeClass('disabled');
//                nextTab($active);  
//             }else{
//                 $('#form-vendor').parsley().validate();
//             }
//        });
        
        $(".prev").click(function (e) {
            e.preventDefault();
             var tabCount = $(this).attr('tab-number');
             $("ul.number-step li").each(function() {
                    var a = $(this).text();
                    if (a === tabCount ) {
                      $(this).addClass("enabled");
                      $(this).next().removeClass("enabled");
                    } 
            });
            
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
    
    
    
</script>