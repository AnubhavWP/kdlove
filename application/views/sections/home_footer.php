<?php 
//dump($footer1);die;
?>

<div class="public-website-layout--footer push-mobile js-blur" data-ga-container="footer">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer__container col-sm-11 col-sm-offset-1">
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="row">

                                <div class="footer-link-list col-xs-12 col-sm-3 col-sm-push-9">
                                    <?php echo htmlspecialchars_decode($footer3[0]['description']); ?>

                                </div>

                                <div class="footer-link-list col-xs-12 col-sm-6 col-sm-pull-3 col-xs-6">
                                    <?php echo htmlspecialchars_decode($footer1[0]['description']); ?> 
                                </div>



                                <div  class="footer-link-list col-xs-12 col-sm-3 col-sm-pull-3 col-xs-6">
                                    <?php echo htmlspecialchars_decode($footer2[0]['description']); ?> 
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <?php echo htmlspecialchars_decode($footer4[0]['description']); ?>
                            <div class="mtm">
                                <div class="trustpilot-widget" data-locale="en-US"
                                     data-template-id="5419b732fbfb950b10de65e5"
                                     data-businessunit-id="4befee3200006400050c1f06"
                                     data-style-height="60px"
                                     data-style-width="100%"
                                     data-theme="dark"> </div>
                                <div class="hidden"> Our customers rate Kdknot 8.7 out of 10 on <a href="#" rel="nofollow" target="_blank">Trustpilot</a>. <span itemtype="#" itemscope class="hidden"> <span id="reviewcount" itemprop="votes"> 1096 </span> <span itemprop="itemreviewed">Kdknot.com</span> <span itemtype="#" itemscope itemprop="rating"> <span id="reviewavg" itemprop="average"> 8.7 </span> <span itemprop="best">10</span> </span> </span> </div>
                            </div>
                            <div class="text-center"> <a href="#" class="button button--white" rel="nofollow"> Meet the Team </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-worldwide">

        <div class="container mbs">
            <div class="row">
                <div class="col-xs-12">
                    <hr class="footer-separator"/>
                </div>
                <div class="footer-payment-logos col-sm-6"> <img src="<?php echo base_url(); ?>asseets/front/home/image/logo_secure_payment.png" alt="" /> <img src="<?php echo base_url(); ?>asseets/front/home/image/logo_paypal.png" alt="" /> </div>
                <div class="footer-copyright col-sm-6">Â© 2017 Kdlovestories Â· Wedding list & website</div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div> 

<!--<script src="<?php echo base_url(); ?>asseets/front/home/lolo/homejsv44b48"></script>
<script src="<?php echo base_url(); ?>asseets/front/home/js/main.min8f14.js"></script>
<script src="<?php echo base_url(); ?>asseets/front/home/js/jqueryb8ff.js"></script>
<!-- Criteo Homepage Tag -->
<!--<script type="text/javascript" src="js/ld.js" async></script>-->



<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/lolo/script.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/jsscripts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/script.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/form.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/index.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/scripts1.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>asseets/front/home/js/front/flexy-menu.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".flexy-menu").flexymenu({
            speed: 400,
            type: "vertical",
            indicator: true
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#flip").click(function () {
            $("#panel").toggle("fast");
        });
    });

    $(function () {

        var $formLogin = $('#login-form');
        var $formLost = $('#lost-form');
        var $formRegister = $('#register-form');
        var $divForms = $('#div-forms');
        var $modalAnimateTime = 300;
        var $msgAnimateTime = 150;
        var $msgShowTime = 2000;

        // $(".form").submit(function () {
        //     switch(this.id) {
        //         case "login-form":
        //             var $lg_username=$('#login_username').val();
        //             var $lg_password=$('#login_password').val();
        //             alert(lg_username);
        //             if ($lg_username == "ERROR") {
        //                 msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
        //             } else {
        //                 msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
        //             }
        //             return false;
        //             break;
        //         case "lost-form":
        //             var $ls_email=$('#lost_email').val();
        //             if ($ls_email == "ERROR") {
        //                 msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
        //             } else {
        //                 msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
        //             }
        //             return false;
        //             break;
        //         case "register-form":
        //             var $rg_username=$('#register_username').val();
        //             var $rg_email=$('#register_email').val();
        //             var $rg_password=$('#register_password').val();
        //             alert(rg_password);
        //                if ($rg_username == "ERROR") {
        //                 msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
        //             } 
        //             // else {
        //             //     msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
        //             // }
        //             return false;
        //             break;
        //         default:
        //             return false;
        //     }
        //     return false;  
        //  });
        $('#login_register_btn').click(function () {
            modalAnimate($formLogin, $formRegister)
        });
        $('#register_login_btn').click(function () {
            modalAnimate($formRegister, $formLogin);
        });
        $('#login_lost_btn').click(function () {
            modalAnimate($formLogin, $formLost);
        });
        $('#lost_login_btn').click(function () {
            modalAnimate($formLost, $formLogin);
        });
        $('#lost_register_btn').click(function () {
            modalAnimate($formLost, $formRegister);
        });
        $('#register_lost_btn').click(function () {
            modalAnimate($formRegister, $formLost);
        });

        function modalAnimate($oldForm, $newForm) {
            var $oldH = $oldForm.height();
            var $newH = $newForm.height();
            $divForms.css("height", $oldH);
            $oldForm.fadeToggle($modalAnimateTime, function () {
                $divForms.animate({height: $newH}, $modalAnimateTime, function () {
                    $newForm.fadeToggle($modalAnimateTime);
                });
            });
        }

        function msgFade($msgId, $msgText) {
            $msgId.fadeOut($msgAnimateTime, function () {
                $(this).text($msgText).fadeIn($msgAnimateTime);
            });
        }

        function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
            var $msgOld = $divTag.text();
            msgFade($textTag, $msgText);
            $divTag.addClass($divClass);
            $iconTag.removeClass("glyphicon-chevron-right");
            $iconTag.addClass($iconClass + " " + $divClass);
            setTimeout(function () {
                msgFade($textTag, $msgOld);
                $divTag.removeClass($divClass);
                $iconTag.addClass("glyphicon-chevron-right");
                $iconTag.removeClass($iconClass + " " + $divClass);
            }, $msgShowTime);
        }
    });
</script>

<script>
    $(document).ready(function () {
        $(".bg-promo__left").show();
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 30) {
                    $(".bg-promo__left, .bg-promo__right").css("position", "fixed");
                }
                if ($(this).scrollTop() == 0) {
                    $(".bg-promo__left, .bg-promo__right").css("position", "absolute");

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".mfp-close").click(function () {
            $(".suggested-modal").hide();
        });
    });
</script>

<script>
    $(document).ready(function () {
        var ckbox = $("input[name='checklist']");
        var chkId = '';
        $('.chk').on('click', function (e) {
            e.preventDefault();

            if (ckbox.is(':checked')) {
                $("input[name='checklist']:checked").each(function () {
                    chkId = $(this).val() + ",";
                    chkId = chkId.slice(0, -1);
                });

                //  alert ( $(this).val() ); // return all values of checkboxes checked
                //alert(chkId); // return value of checkbox checked

                $.ajax({
                    url: '<?php echo base_url(); ?>front/user_checklist',
                    type: 'POST',
                    data: {
                        check_val_id: chkId
                    },
                    async: 'true',
                    cache: 'false',
                    success: function (data) {

                        //  console.log(data);
                    }
                });

                return false;
            }
        });
    });
</script>


<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language: 'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language: 'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
</body>
</html>