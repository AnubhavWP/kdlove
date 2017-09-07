
<link rel="shortcut icon" href="<?php echo base_url() . 'assets/img/favicon.png' ?>">


<style>.myButton {
    -moz-box-shadow: 0px 10px 22px -7px #3e7327;
    -webkit-box-shadow: 0px 10px 22px -7px #3e7327;
    box-shadow: 0px 10px 22px -7px #3e7327;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
    background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
    background-color:#77b55a;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    border-radius:2px;
    border:1px solid #4b8f29;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:28px;
    font-weight:bold;
    padding:8px 76px;
    text-decoration:none;
    text-shadow:0px 1px 0px #5b8a3c;
}
.myButton:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
    background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
    background-color:#72b352;
}
.myButton:active {
    position:relative;
    top:1px;
}
</style>

<?php 

$first_name = isset($profile_details['first_name'])?$profile_details['first_name']:"";
$fiance_first_name = isset($profile_details['fiance_first_name'])?$profile_details['fiance_first_name']:"";
?>
    <div class="layout__container js-blur js-overflow">
     
    <div class="dir-home-promoted" style="background-color: #ccc"> 
        <!-- slider for background -->
        <!--<div class="slider slider--directory swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide"> <img class="slide__photo visible-xs" src="<?php echo base_url();?>assets/image/14272124431.jpg" alt=""> <img class="slide__photo hidden-xs" src="<?php echo base_url();?>assets/image/1427212443.jpg" alt=""> </div>
            </div>
          </div>
        </div>-->
        
        
      </div>
<div class="container-fluid">
<div class="row">
<div class="col-xs-12">
<div class="row">
<div class="col-md-3 col-lg-3 col-sm-4 p-10">
<div class="content">
        <ul class="flexy-menu orange">
            <li class="active"><a href="#"><i class="icon-heart"></i>Home</a></li>
            <li><a href="<?php echo base_url(); ?>front/user_checklist">Checklist</a></li>
            <li><a href="#">Budgeter</a></li>
            <li><a href="#">Wedding Website</a></li>
            <li><a href="<?php echo base_url(); ?>planning/guest_list_event">Guest List Manager</a></li>
            <li><a href="#">Registery</a></li>
            <li><a href="#">Conversations</a></li>
            <li><a href="#">Favorites</a></li>
            <li><a href="<?php echo base_url(); ?>front/edit_profile">Account Settings</a></li>
        </ul>
    </div>
</div>
<div class="col-md-9 col-lg-9  col-sm-8 p-10">

	
<div class="leftlist">
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 p-10">
<div class="whitethumd text-center">
<h3><?php echo $first_name;?> & <?php echo $fiance_first_name;?><br/><small>Summer, 2018 in Noida, UP</small></h3>
<!-- <img src="<?php echo base_url();?>assets/image/circle.png" class=" bigimage"> -->

<div class="control-group hidden-phone ">
                                
   
    <div class="controls" >
    <div style="width:40%" id="cropContaineroutput"></div>
    <input type="hidden" name="image"  id="cropOutput" style="width:100%; padding:5px 4%; margin:20px auto; display:block; border: 1px solid #CCC;" />
    </div>
</div>

<h3 class="mb-10 mt-10">7%</h3><small>complete!</small>
<br/><br/>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-0 col-lg-offset-1 col-md-offset-1 col-sm-offset-0">
<div class="autoheightdiv">
<div class="topheadingdashboard">WEDDING WEBSITE</div>
<div class="smallimg">
<img src="<?php echo base_url();?>assets/image/site.png" class=" img-responsive mb-10 mt-10">
</div>
<p><strong>Start your wedding website</strong><br/>
theknot.com/us/Akash-and-test</p>
<div class="dashbtn">Publish</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-0 col-lg-offset-1 col-md-offset-1 col-sm-offset-0">
<div class="autoheightdiv">
<div class="topheadingdashboard">WEDDING WEBSITE</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="smallimg">
<img src="<?php echo base_url();?>assets/image/photo.png" class=" img-responsive mb-10 mt-10">
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="smallimg">
<img src="<?php echo base_url();?>assets/image/vendor.png" class=" img-responsive mb-10 mt-10">
</div>
</div>
<p><strong>Manage Vendors</strong><br/></p>
<div class="dashbtn">Browse Photography</div>
</div>
</div>
</div>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 p-10">
<div class="whitethumd text-center">
<h2>14<br/>Months to go!</h2>
<img src="<?php echo base_url();?>assets/image/check.png" class=" bigimage">
<h4>Did you create a weather "plan b"?</h4>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="dashbtn">Browse Photography</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="bgcolorbtn">Browse Photography</div>
</div></div>
</div>
<div class="clearfix"></div>
</div>
	

<!-- Pagination backup when there is no js !-->

</div>


</div>
</div>
</div>
</div>
      

<script>

   var croppicContaineroutputOptions = {
       uploadUrl: '<?php echo base_url() . "front/img_save_to_file" ?>',
       cropUrl: '<?php echo base_url() . "front/img_crop_to_file" ?>',
       outputUrlId: 'cropOutput',
       modal: false,
       loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
       onBeforeImgUpload: function () { console.log('onBeforeImgUpload')},
       onAfterImgUpload: function () {console.log('onAfterImgUpload')},
       onImgDrag: function () {console.log('onImgDrag')},
       onImgZoom: function () {console.log('onImgZoom')},
       onBeforeImgCrop: function () {console.log('onBeforeImgCrop')},
       onAfterImgCrop: function () {console.log('onAfterImgCrop')},
       onReset: function () {console.log('onReset')},
       onError: function (errormessage) {console.log('onError:' + errormessage)}
   }

   var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);


</script>

    
    
      