<?php
//dump($user_data);die;
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
                            if ($key == $user_data->type) {
                                $sel = "selected";
                            } else {
                                $sel = "";
                            }
                            ?>
                            <option value="<?php echo $key ?>" <?php echo $sel; ?>><?php echo $value ?></option>
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
                <input type="text" class="form-control" name="first_name" id="txt" required="" value="<?php echo!empty($user_data->first_name) ? $user_data->first_name : '' ?>" placeholder="First Name">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">Last Name* :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="last_name" id="txt" required="" value="<?php echo!empty($user_data->last_name) ? $user_data->last_name : '' ?>" placeholder="Last Name">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">Email Address* :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="email" required="" data-parsley-type = "email" value="<?php echo!empty($user_data->email) ? $user_data->email : '' ?>" id="txt" placeholder="Email Address">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="txt">Title :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="title" id="txt" value="<?php echo!empty($user_data->title) ? $user_data->title : '' ?>" placeholder="Title">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="email">Screen Name :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="seceret_name" id="email" value="<?php echo!empty($user_data->seceret_name) ? $user_data->seceret_name : '' ?>" placeholder="Screen Name">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="email">Password* :</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" required="" value="<?php echo!empty($user_data->password) ? $user_data->password : '' ?>" id="epass" placeholder="Password">
            </div>
        </div>
        <div class="form-group gap">
            <label class="control-label col-sm-4 text-right col-sm-offset-1 col-md-offset-1 col-lg-offset-1" for="pass">Retype Password* :</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" data-parsley-equalto="#epass" required="" value=""  placeholder="Retype Password">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="div"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <h4 class="text-left">Email Settings</h4>
            <p class="text-left"><b>Email Signature:</b> Customize the fields you would like to include in your signature below. Blank fields will not be visible to clients.</p>
        </div>
        <?php
        if (!empty($user_data->email_signature)) {
            $email_signature = explode('-', $user_data->email_signature);
//            dump($email_signature);
        }
        ?>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" value="<?php echo!empty($email_signature[0]) ? $email_signature[0] : '' ?>" id="pass" placeholder="Best">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" value="<?php echo !empty($email_signature[1]) ? $email_signature[1] : '' ?>" placeholder="First &amp; Last Name">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" value="<?php echo!empty($email_signature[2]) ? $email_signature[2] : '' ?>" placeholder="Bamco Hall">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" value="<?php echo!empty($email_signature[3]) ? $email_signature[3] : '' ?>" placeholder="Website URL">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" value="<?php echo!empty($email_signature[4]) ? $email_signature[4] : '' ?>" placeholder="Phone Number">
            </div>
        </div>
        <div class="form-group gap">
            <div class="col-sm-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                <input type="text" class="form-control" name="email_signature[]" id="pass" value="<?php echo!empty($email_signature[5]) ? $email_signature[5] : '' ?>" placeholder="Email Address">
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
                    <td><input type="checkbox" value="1" name="review_notification" <?php echo $user_data->review_notification == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>My Endorsements</td>
                    <td>You recieve an endorsements from a pro.</td>
                    <td><input type="checkbox" value="1" <?php echo $user_data->endorsement_notificaiton == '1' ? 'checked' : '' ?> name="endorsement_notificaiton" data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>My Associations</td>
                    <td>An Association wants to connect with your business.</td>
                    <td><input type="checkbox" value="1" name="assocation_notificaiton" <?php echo $user_data->assocation_notificaiton == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Account Updates</td>
                    <td>Receive monthly information about your WeddingWire account & activity.</td>
                    <td><input type="checkbox" value="1" name="monthly_activity_notification" <?php echo $user_data->monthly_activity_notification == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <th scope="col">More Informations</th>
                    <th scope="col">Send information on...</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                <tr>
                    <td>Reviews Reminders</td>
                    <td>Getting your past clients to review your services.</td>
                    <td><input type="checkbox" value="1"  name="reveiw_reminder_notification" <?php echo $user_data->reveiw_reminder_notification == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Pro Education</td>
                    <td>Newsletter, online webinars & monthly insights with the latest online trends, <br>strategies to grow your business, and tips on how to reach more engaged couples.</td>
                    <td><input type="checkbox" name="pro_education" value="1" <?php echo $user_data->pro_education == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>KDEVENTPLACE Updates</td>
                    <td>Whats happenings at KDEVENTPLACE - new products, updates to your account, webinars, <br>awards programs and more.</td>
                    <td><input type="checkbox" name="kdevent_updates" value="1" <?php echo $user_data->kdevent_updates == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Local Events</td>
                    <td>Local events and others educational opportunities available in your area.</td>
                    <td><input type="checkbox" name="local_events" value="1" <?php echo $user_data->local_events == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Network updates</td>
                    <td>News across the KDEVENTPLACE Network - including Project Wedding, <br>Weddingbee new Partnerships, and more.</td>
                    <td><input type="checkbox" name="network_update" value="1" <?php echo $user_data->network_update == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>KDEVENTPLACE Discounts</td>
                    <td>Exclusive member discounts only available across the KDEVENTPLACE Network.</td>
                    <td><input type="checkbox" name="kd_discount" value="1" <?php echo $user_data->kd_discount == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Welcome Emails</td>
                    <td>Tips and Suggestions to make the most of your new KDEVENTPLACE account.</td>
                    <td><input type="checkbox" name="welcome_email" value="1" <?php echo $user_data->welcome_email == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Partner Offers</td>
                    <td>Receive monthly partner offers and deals exclusive to KDEVENTPLACE members.</td>
                    <td><input type="checkbox" <?php echo $user_data->partner_offers == '1' ? 'checked' : '' ?> value="1" name="partner_offers" data-toggle="toggle"></td>
                </tr>
                <tr>
                    <td>Feedback Opportunities</td>
                    <td>Online and in-person survey and research opportunities to help <br>KDEVENTPLACE better understand your business needs.</td>
                    <td text-align="right"><input type="checkbox" value="1" name="facebook_opprunities" <?php echo $user_data->facebook_opprunities == '1' ? 'checked' : '' ?> data-toggle="toggle"></td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 text-center"><input type="submit" value="Save" class="next"></div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 text-center"><a class="next" href="#">Cancel</a></div>
    </div>
</form>

