<?php
$type = $this->config->item('employee_type');
?>
<form name="add-emp" method="post" data-parsley-validate="" action="<?php echo current_url() ?>">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="email">Type :</label>
            <div class="col-sm-4">
                <select class="form-control" name="type" required="">
                    <option value="">Select</option>
                    <?php
                    if (!empty($type)) {
                        foreach ($type as $key => $value) {
                            ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">First Name* :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="first_name" id="txt" required="" placeholder="First Name">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">Last Name* :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="last_name" id="txt" required="" placeholder="Last Name">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">Email Address* :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="email" required="" data-parsley-type = "email" id="txt" placeholder="Email Address">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">Title :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="title" id="txt" placeholder="Title">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="email">Screen Name :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="seceret_name" id="email" placeholder="Screen Name">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="email">Password* :</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" required="" id="epass" placeholder="Password">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="pass">Retype Password* :</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" data-parsley-equalto="#epass"  placeholder="Retype Password">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="div"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <h4 class="text-left">Email Settings</h4>
            <p class="text-left"><b>Email Signature:</b> Customize the fields you would like to include in your signature below. Blank fields will not be visible to clients.</p>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" placeholder="Best">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" placeholder="First &amp; Last Name">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" placeholder="Bamco Hall">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" placeholder="Website URL">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" placeholder="Phone Number">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" placeholder="Email Address">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="div"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  table-responsive">
            <h4 class="text-left"><b>Notification Preferences</b></h4>
            <table class="more_opt" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <th scope="col">My Account Notifications</th>
                   <th scope="col">Send an email notification when...</th>
                   <th scope="col">&nbsp;</th>
                 </tr>
                 <tr>
                   <td>My Reviews</td>
                   <td>You recieve a new review from a past client.</td>
                   <td><input type="checkbox" value="1" name="review_notification"  checked data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>My Endorsements</td>
                   <td>You recieve an endorsements from a pro.</td>
                   <td><input type="checkbox" value="1" checked="" name="endorsement_notificaiton" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>My Associations</td>
                   <td>An Association wants to connect with your business.</td>
                   <td><input type="checkbox" value="1" name="assocation_notificaiton" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Account Updates</td>
                   <td>Receive monthly information about your WeddingWire account & activity.</td>
                   <td><input type="checkbox" value="1" name="monthly_activity_notification" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <th scope="col">More Informations</th>
                   <th scope="col">Send information on...</th>
                   <th scope="col">&nbsp;</th>
                 </tr>
                 <tr>
                   <td>Reviews Reminders</td>
                   <td>Getting your past clients to review your services.</td>
                   <td><input type="checkbox" value="1"  name="reveiw_reminder_notification" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Pro Education</td>
                   <td>Newsletter, online webinars & monthly insights with the latest online trends, <br>strategies to grow your business, and tips on how to reach more engaged couples.</td>
                   <td><input type="checkbox" name="pro_education" value="1" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>KDEVENTPLACE Updates</td>
                   <td>Whats happenings at KDEVENTPLACE - new products, updates to your account, webinars, <br>awards programs and more.</td>
                   <td><input type="checkbox" name="kdevent_updates" value="1" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Local Events</td>
                   <td>Local events and others educational opportunities available in your area.</td>
                   <td><input type="checkbox" name="local_events" value="1" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Network updates</td>
                   <td>News across the KDEVENTPLACE Network - including Project Wedding, <br>Weddingbee new Partnerships, and more.</td>
                   <td><input type="checkbox" name="network_update" value="1" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>KDEVENTPLACE Discounts</td>
                   <td>Exclusive member discounts only available across the KDEVENTPLACE Network.</td>
                   <td><input type="checkbox" name="kd_discount" value="1" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Welcome Emails</td>
                   <td>Tips and Suggestions to make the most of your new KDEVENTPLACE account.</td>
                   <td><input type="checkbox" name="welcome_email" value="1" checked="" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Partner Offers</td>
                   <td>Receive monthly partner offers and deals exclusive to KDEVENTPLACE members.</td>
                   <td><input type="checkbox" checked="" value="1" name="partner_offers" data-toggle="toggle"></td>
                 </tr>
                 <tr>
                   <td>Feedback Opportunities</td>
                   <td>Online and in-person survey and research opportunities to help <br>KDEVENTPLACE better understand your business needs.</td>
                   <td text-align="right"><input type="checkbox" value="1" name="facebook_opprunities" checked="" data-toggle="toggle"></td>
                 </tr>
               </table>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 text-center"><input type="submit" value="Save" class="next"></div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center"><a class="next" href="#">Cancel</a></div>
    </div>
</form>

