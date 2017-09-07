<style>
    .validation_error{
        color:red;
        font-size: 15px;
        font-weight: 600;
    }
</style>
<div class="container">
    <section>
        <div class="wizard">
            <div class="validation_error">
                <?php echo validation_errors(); ?>
            </div>
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab"></span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab"></span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab"></span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab"></span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab"></span>
                        </a>
                    </li>
                </ul>
            </div>

            <!--<form id="form-vendor" action="<?php echo current_url()?>" data-parsley-validate="" method="post">-->
                <?php echo form_open(current_url(),array(
                                    'id' => 'form-vendor'
                    )); ?>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3 class="text-center">Introducing  WeddingWire Availability</h3>
                        <p class="text-center">Our pilot for wedding pros!</p>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <h1 class="text-center"><i class="fa fa-calendar iconcolor fa-3x"></i></h1>
                                <p class="text-center midfont">1.Set your<br/> availability</p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <h1 class="text-center"><i class="fa fa-calendar-check-o iconcolor fa-3x"></i></h1>
                                <p class="text-center midfont">2.Couples find you<br/> based on your <br/>availability</p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <h1 class="text-center"><i class="fa fa-line-chart iconcolor fa-3x"></i></h1>
                                <p class="text-center midfont">3.You get qualified <br/>leads</p>
                            </div>
                        </div>
                        <ul class="list-inline text-center">
                            <li><button type="button" class="btn btn-primary next-step btnmid automargin">Next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3 class="text-center">Tell us your booking goals and we'll<br/> help keep you on track!</h3>
                        <p class="text-center">Our pilot for wedding pros!</p>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 ">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 midfont">2017 Goal for Weddings</div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><input type="text" class="wizrdinput" required=""  value="<?php echo !empty($vendor_info->wedding_goal1) ? $vendor_info->wedding_goal1 : ''?>" name="wedding_goal1">
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 midfont">2018 Goal for Weddings</div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><input type="text" class="wizrdinput" name="wedding_goal2" value="<?php echo !empty($vendor_info->wedding_goal2) ? $vendor_info->wedding_goal2 : ''?>"></div>

                        </div>
                        <div class="clearfix"></div>
                        <ul class="list-inline text-center">
                            <li><button type="button" class="btn btn-default prev-step btnmid automargin">Back</button></li>
                            <li><button type="button" class="btn btn-primary  btnmid automargin vendor-pr">Next</button></li>
                        </ul>
                        <!--<p class="text-center"><a href="#">Skip</a></p>-->
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3 class="text-center">Select the days you're <br/>Avaliable for weddings</h3>
                        <div class="clearfix"></div>
                        <div class="dyas">
                            <ul>
                                <?php
                                $days = !empty($vendor_info->days_avalible_wedding) ? $vendor_info->days_avalible_wedding : '';
                                $d = explode('-',$days);
                                
                                $weekdays = $this->config->item('weekdays');
                                if (!empty($weekdays)) {
                                    foreach ($weekdays as $key => $day) {
                                        if(in_array($key, $d)){
                                            $sel = 'checked';
                                        }else{
                                            $sel = 'unchecked';
                                        }
                                        ?>
                                        <li><p class="text-center midfont"><?php echo substr($day,0,3);?></p>
                                            <div class="checkbox">
                                                <label style="font-size: 2.5em">
                                                    <input type="checkbox" name="days_avalible_wedding[]" <?php echo $sel; ?> value="<?php echo $key ?>">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>


                        <div class="clearfix"></div>
                        <ul class="list-inline  text-center">
                            <li><button type="button" class="btn btn-default prev-step btnmid automargin">Back</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full   btnmid automargin vendor-pr">Next</button></li>
                        </ul>
                        <p class="text-center"><a href="#">Skip</a></p>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step4">
                        <h3 class="text-center">How many weddings can you<br/> accommodate each day ?</h3>
                        <div class="clearfix"></div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-0">
                            <select class="form-control" name="wedding_accomadation">
                                <option value="">Select</option>
                                <option value="1" <?php echo $vendor_info->wedding_accomadation == '1' ? 'selected' : ''?>>1</option>
                                <option value="2" <?php echo $vendor_info->wedding_accomadation == '2' ? 'selected' : ''?>>2</option>
                                <option value="3" <?php echo $vendor_info->wedding_accomadation == '3' ? 'selected' : ''?>>3</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="list-inline  text-center">
                            <li><button type="button" class="btn btn-default prev-step btnmid automargin">Back</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full   btnmid automargin vendor-pr">Next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3 class="text-center">Save time with <br/>Automatic Updates!</h3>
                        <p class="midfont">How it works?</p>
                        <ol>
                            <li>A confirmation email was sent to you.</li>
                            <li>You will need to activate your WeddingWire account by clicking on the link in the email.</li>
                            <li>After confirming your account, you will be able to login with your email address and complete the sign up process.</li>
                        </ol>
                        <div class="clearfix"></div>
                        <div class="innerbgwizard">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p><i class="fa fa-user-plus fa-3x"></i> &nbsp; &nbsp;add bookings from your Google Calendar by inviting your unique availability email address to your events!</p>
                            </div>

                        </div>
                        <p class="text-center">To disable Automatic Updates visit your Availability Preferences</p>

                        <div class="clearfix"></div>
                        <ul class="list-inline  text-center">
                            <li><button type="button" class="btn btn-default prev-step btnmid automargin">Back</button></li>
                            <li><button type="submit" class="btn btn-default btnmid automargin">Save</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>

<script type="text/javascript">
    
    $(document).ready(function () {
        
        $('.nav-tabs > li a[title]').tooltip();
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {
             e.preventDefault();
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);  
        });
        
        
            $('.vendor-pr').on('click', function(e) {
             e.preventDefault();
             var chk = isvalidForm();
             if(chk){
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);  
             }else{
                 $('#form-vendor').parsley().validate();
             }
        });
        
        $(".prev-step").click(function (e) {

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
    
    function isvalidForm(){
        var a = $('#form-vendor').parsley().isValid()
        if(a){
            return true;
        }else{
            return false;
        }
    }
    
</script>