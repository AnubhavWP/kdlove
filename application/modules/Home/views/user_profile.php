<?php 
$first_name = isset($user_info['first_name'])?$user_info['first_name']:"";
$last_name = isset($user_info['last_name'])?$user_info['last_name']:"";
$age = isset($user_info['age'])?$user_info['age']:"";
$address = isset($user_info['address'])?$user_info['address']:"";
$email = isset($user_info['email'])?$user_info['email']:"";
$username = isset($user_info['username'])?$user_info['username']:"";

$fiance_first_name= isset($user_info['fiance_first_name'])?$user_info['fiance_first_name']:"";
$fiance_last_name= isset($user_info['fiance_last_name'])?$user_info['fiance_last_name']:"";
$zipcode= isset($user_info['zipcode'])?$user_info['zipcode']:"";
$apartment= isset($user_info['apartment'])?$user_info['apartment']:"";
$city = isset($user_info['city'])?$user_info['city']:"";


$wedding_city = isset($wedding_details['wedding_city'])?$wedding_details['wedding_city']:"";
$wedding_date = isset($wedding_details['wedding_date'])?$wedding_details['wedding_date']:"";
$guest = isset($wedding_details['guest_count'])?$wedding_details['guest_count']:"";
$budget = isset($wedding_details['budget'])?$wedding_details['budget']:"";


?>


            <div class="layout__container js-blur js-overflow">
               <div class="container">
                  <h2 class="text-center">Account Settings</h2>
                  <hr>
                  <div class="col-xs-4">
                     <!-- required for floating -->
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs tabs-left acc">
                        <li><a href="#">Your Profile</a></li>
                        <li class="active"><a href="#home" data-toggle="tab">Personal Details</a></li>
                        <li><a href="#profile" data-toggle="tab">Wedding Details</a></li>
                        <li><a href="#messages" data-toggle="tab">Account Management</a></li>
                        <li><a href="#">Email Preference</a></li>
                     </ul>
                  </div>
                  <div class="col-xs-8">
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane active" id="home">
                  <?php echo form_open('front/edit_profile  ',array(
                  'class' => 'form-horizontal'
                  )); ?>
                           <h3>Personal Details</h3>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_first_name">First Name</label>
                                 <input class="form-control" data-change="false" type="text"  name="first_name" value="<?php echo $first_name; ?>" id="member_first_name">
                                  <div style="color:red;"><?php echo form_error('first_name');?></div>    
                              </div>
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_last_name">Last Name</label>
                                 <input class="form-control" data-change="false" type="text" value="<?php echo $last_name; ?>" name="last_name" id="member_last_name">
                                 <div style="color:red;"><?php echo form_error('last_name');?></div> 
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_fiance_first_name">Fiance's First Name</label>
                                 <input class="form-control" data-change="false" type="text" value="<?php echo $fiance_first_name; ?>" name="fiance_first_name" id="member_fiance_first_name">
                                 <div style="color:red;"><?php echo form_error('fiance_first_name');?></div> 
                              </div>
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_fiance_last_name">Fiance's Last Name</label>
                                 <input class="form-control" data-change="false" type="text" value="<?php echo $fiance_last_name; ?>" name="fiance_last_name" id="member_fiance_last_name">
                                 <div style="color:red;"><?php echo form_error('fiance_last_name');?></div> 
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_username">Username</label>
                                 <input class="form-control" data-change="required" type="text" value="<?php echo $username;?>" name="username" id="member_username">
                                 <div style="color:red;"><?php echo form_error('username');?></div> 
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_home_address_address_1">Street Address</label>
                                 <input class="form-control" data-change="false" type="text" name="address" value="<?php echo $address; ?>" id="member_home_address_address_1">
                                 <div style="color:red;"><?php echo form_error('address');?></div> 
                              </div>
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_home_address_address_2">APT/SUITE/BLDG</label>
                                 <input class="form-control" data-change="false" type="text" value="<?php echo $apartment; ?>" name="apartment" id="member_home_address_address_2">
                                 <div style="color:red;"><?php echo form_error('apartment');?></div> 
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <div class="type-ahead">
                                    <label class="label1" for="member_home_address_location">Home City + State</label>
                                    <input class="form-control" data-search="cities" data-change="false" value="<?php echo $city;?>" placeholder="City, State" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="city" id="member_home_address_location">
                                    <div style="color:red;"><?php echo form_error('city');?></div> 
                                    <ul class="dropdown-menu search-list" role="menu"></ul>
                                 </div>
                              </div>
                              <div class="col-md-6 margin-bottom-30">
                                 <label class="label1" for="member_home_address_zip">ZIP CODE</label>
                                 <input class="form-control" data-change="false" type="text" value="<?php echo $zipcode; ?>" name="zipcode" id="member_home_address_zip">
                                 <div style="color:red;"><?php echo form_error('zipcode');?></div> 
                              </div>
                           </div>
                           <h3>Wedding Details</h3>
                           <hr>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <div class="form-group">
                                   <label class="label1" for="sel1">Event Days</label>
                                   <select name="event_days" class="form-control" id="sel1">
                                      <option value="">select days</option> 
                                     <option value="1">1</option> 
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                   </select>

                                 </div>
                              </div>
                              <div class="col-md-6 ">
                                 <div class="type-ahead">
                                    <label class="label1" for="member_wedding_location">Wedding City + State</label>
                                    <input class="form-control" data-search="cities" data-change="false" value="<?php echo $wedding_city; ?>" placeholder="City, State" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" value="Noida, Uttar Pradesh" name="wedding_city" id="member_wedding_location">
                                     <div style="color:red;"><?php echo form_error('wedding_city');?></div>    
                                    <ul class="dropdown-menu search-list" role="menu"></ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_wedding_date">Wedding Date</label>
                               
                                       <input class="form-control" type="text" name="wedding_date" value="<?php echo $wedding_date; ?>" id="datepicker" style="width:100%">  
                                      <div style="color:red;"><?php echo form_error('wedding_date');?></div>   
                                 </div>
                              <div class="col-md-6 "><div class="form-group">
                                   <label class="label1" for="sel1">Wedding Budget:</label>
                              <input class="form-control" type="text" name="budget" value="<?php echo $budget; ?>" style="width:100%">  
                              <div style="color:red;"><?php echo form_error('budget');?></div>   
                                 </div>
                              </div>
                           </div>
                           <div class="row account-settings-number-of-guests">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_number_of_guests">Number of Wedding Guests</label>
                              <input class="form-control" type="text" name="guest" value="<?php echo $guest; ?>"  style="width:100%">  
                             <div style="color:red;"><?php echo form_error('guest');?></div>  
                              </div>
                           </div>
                           <hr>
                           <h3>Wedding Theme</h3>
                           <hr>

                            <?php foreach($wedding_theme as $theme){ ?>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" name="wedding_theme" value="<?php echo $theme['id']; ?>">
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                      <?php echo $theme['name']; ?>
                                    </label>
                                </div>
                              </div>
                              <?php }?>
                          
                              
                             <input class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-4 col-lg-offset-4 bttn2" type ="submit" value = "submit"/>

                          
                             <?php echo form_close();?>
                            <div class="space"></div>
                       
                           </div>


                        <div class="tab-pane" id="profile">
                            <h3>Personal Details</h3>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_first_name">First Name</label>
                                 <input class="form-control" data-change="false" type="text" value="Akash " name="member[first_name]" id="member_first_name">
                              </div>
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_last_name">Last Name</label>
                                 <input class="form-control" data-change="false" type="text" value="kumar" name="member[last_name]" id="member_last_name">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_fiance_first_name">Fiance's First Name</label>
                                 <input class="form-control" data-change="false" type="text" value="akash" name="member[fiance_first_name]" id="member_fiance_first_name">
                              </div>
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_fiance_last_name">Fiance's Last Name</label>
                                 <input class="form-control" data-change="false" type="text" value="kumar" name="member[fiance_last_name]" id="member_fiance_last_name">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_username">Username</label>
                                 <input class="form-control" data-change="required" type="text" value="knottiee500f9e2093174cb" name="member[username]" id="member_username">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_home_address_address_1">Street Address</label>
                                 <input class="form-control" data-change="false" type="text" name="member[home_address][address_1]" id="member_home_address_address_1">
                              </div>
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_home_address_address_2">APT/SUITE/BLDG</label>
                                 <input class="form-control" data-change="false" type="text" name="member[home_address][address_2]" id="member_home_address_address_2">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <div class="type-ahead">
                                    <label class="label1" for="member_home_address_location">Home City + State</label>
                                    <input class="form-control" data-search="cities" data-change="false" placeholder="City, State" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="member[home_address][location]" id="member_home_address_location">
                                    <ul class="dropdown-menu search-list" role="menu"></ul>
                                 </div>
                              </div>
                              <div class="col-md-6 margin-bottom-30">
                                 <label class="label1" for="member_home_address_zip">ZIP CODE</label>
                                 <input class="form-control" data-change="false" type="text" name="member[home_address][zip]" id="member_home_address_zip">
                              </div>
                           </div>
                           <h3>Wedding Details</h3>
                           <hr>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <div class="form-group">
                                   <label class="label1" for="sel1">Select list:</label>
                                   <select class="form-control" id="sel1">
                                     <option>1</option>
                                     <option>2</option>
                                     <option>3</option>
                                     <option>4</option>
                                   </select>
                                 </div>
                              </div>
                              <div class="col-md-6 ">
                                 <div class="type-ahead">
                                    <label class="label1" for="member_wedding_location">Wedding City + State</label>
                                    <input class="form-control" data-search="cities" data-change="false" placeholder="City, State" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" value="Noida, Uttar Pradesh" name="member[wedding_location]" id="member_wedding_location">
                                    <ul class="dropdown-menu search-list" role="menu"></ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_wedding_date">Wedding Date</label>
                               
                                       <input class="form-control" type="text" id="datepicker" style="width:100%">  
                                 </div>
                              <div class="col-md-6 "><div class="form-group">
                                   <label class="label1" for="sel1">Wedding Budget:</label>
                                   <select class="form-control" id="sel1">
                                     <option>1</option>
                                     <option>2</option>
                                     <option>3</option>
                                     <option>4</option>
                                   </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row account-settings-number-of-guests">
                              <div class="col-md-6 ">
                                 <label class="label1" for="member_number_of_guests">Number of Wedding Guests</label>
                               <select class="form-control" id="sel1">
                                     <option>1</option>
                                     <option>2</option>
                                     <option>3</option>
                                     <option>4</option>
                                   </select>
                              </div>
                           </div>
                           <hr>
                           <h3>Wedding Theme</h3>
                           <hr>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                         Alternative
                                    </label>
                                </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Art Deco
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Bohemian
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Country
                                    </label>
                                </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        DIY
                                    </label>
                                </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Glamorous
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Modern
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Natural
                                    </label>
                                </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Nautical
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Preppy
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Retro
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Romantic
                                    </label>
                                </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Rustic
                                    </label>
                                </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Southern
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Vintage
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="checkbox">
                                    <label style="font-size: 1em; line-height: 35px;">
                                        <input type="checkbox" value="" checked>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                        Whimsical
                                    </label>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <hr>
                                 <h3>Wedding Theme</h3>
                              <hr>
                               <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr1"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr2"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr3"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr4"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr5"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr6"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr7"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr8"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr9"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr10"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>             
                              <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr11"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>  
                             <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr12"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>  
                             <div class="checkbox color">
                                 <label style="font-size: .8em; padding-left:0px;">
                                     <input type="checkbox" value="" checked>
                                     <span class="cr clr13"><i class="cr-icon fa fa-check"></i></span>
                                 </label>
                             </div>  
                             <div class="clearfix"></div> 
                             <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-4 col-lg-offset-4 bttn2"><a href="#">Save Changes</a></div> 
                             <div class="space"></div> 
                        </div>


                        <div class="tab-pane" id="messages">
                           <h3>Update Your Email</h3>
                            <div class="form-group edit_email_link">
                           <span><?php echo $email; ?></span>
                            
                           </div>
                           <?php echo form_open('front/update_email  ',array(
                          'class' => 'form-horizontal'
                          )); ?>
                           <div style="display:none;" class="row edit_email_show" >
                           <div class="col-md-6 margin-bottom-10">
                           <label class="label1" for="member_new_email">Email</label>
                           <div class="form-group edit_email_link" style="display: none;">
                           <span><?php echo $email; ?></span>
                           <a id="edit_email" class="content link" href="javascript:void(0)">Edit Email</a>
                           </div>
                           <input class="form-control edit_email_control" value="<?php echo $email; ?>" data-change="required,force" style="" type="text" name="email" id="member_new_email">
                           </div>
                           <div class="col-md-6 margin-bottom-30 edit_email_control" style="">
                           <label class="label1" for="member_current_password">Confirm Your Password</label>
                           <input class="form-control" data-change="required" id="confirm_your_password" type="password" name="password">
                           </div>
                           </div>

                           <div class="col-xs-12 col-sm-3 col-md-3 bttn2" id="cancel_button" href="javascript:void(0)">Cancel</div>
                           <div class="col-xs-12 col-sm-3 col-md-3 bttn2 mar" id="edit_button" href="javascript:void(0)">Edit</div>
                           <button class="col-xs-12 col-sm-3 col-md-3 bttn2" value="submit" type="submit">Save</button>

                           <?php echo form_close();?>
                           <div class="clearfix"></div>
                           <hr>
                            <h3>Update Your Password</h3>
                           <hr>
                           <?php echo form_open('front/update_password  ',array(
                          'class' => 'form-horizontal'
                          )); ?>
                           <div class="row">
                           <div class="col-md-6 margin-bottom-23">
                           <label class="label1" for="member_current_password">Current Password</label>
                           <input class="form-control" data-change="required" type="password" name="current_password" id="member_current_password">
                            <div style="color:red;"><?php echo form_error('current_password');?></div>   
                           </div>
                           </div>
                           <div class="row">
                           <div class="col-md-6 margin-bottom-30">
                           <label class="label1" for="member_new_password">New Password (6 characters required)</label>
                           <input class="form-control" data-change="required" type="password" name="password" id="member_new_password">
                           <div style="color:red;"><?php echo form_error('password');?></div>  
                           </div>
                           <div class="col-md-6 margin-bottom-30">
                           <label class="label1" for="member_new_password_confirmation">Confirm Password</label>
                           <input class="form-control" data-change="required" type="password" name="confirm_password" id="member_new_password_confirmation">
                           <div style="color:red;"><?php echo form_error('confirm_password');?></div>  
                           </div>
                           </div>
                           <hr>
                           <div class="checkbox">
                              <label style="font-size: .9em; padding-left:0px;">
                                  <input type="checkbox" value="" checked>
                                  <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                  Check this box if you prefer not to have your personal information shared with third parties for their marketing purposes. For more information, visit our <a href="#">PRIVACY POLICY</a>
                              </label>
                           </div>
                           <hr>
                            <div class="clearfix"></div>
                           <h3>Delete Your Account</h3>
                           <hr>
                           <h3>Did your plans change? <a href="#">DELETE ACCOUNT</a></h3>
                           <div class="clearfix"></div> 
                             <button type="submit" class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-4 col-lg-offset-4 bttn2">Save Changes</button> 
                             <div class="space"></div> 

                              <?php echo form_close();?>
                        </div>
                        
                        </div>                        
                     </div>
                  </div>
               </div>
            </div>


<script>

 $("#edit_button").click(function(){

        $(".edit_email_show").show(1000);
        $(".edit_email_link").hide(1000);
    });
 $("#cancel_button").click(function(){

          $(".edit_email_show").hide(1000);
        $(".edit_email_link").show(1000);

 });
</script>            