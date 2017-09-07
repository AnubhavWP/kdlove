<footer>
    <div class="container footer">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-left first">
                <h5><b>Connect With Us :</b></h5>
                <ul>
                    <li><a href="#">Media Partnership</a></li>
                    <li><a href="#">Vendor Directory</a></li>
                    <li><a href="#">Couple's Choice Awards<sup>®</sup></a></li>
                    <li><a href="#">Bride's Choice Awards<sup>®</sup></a></li>
                    <li><a href="#">Mobile</a></li>
                </ul>
                <ul>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/face.png"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/twit.png"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/goo.png"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 second">
                <h5><b>Wedding Resources :</b></h5>
                <ul>
                    <li><a href="#">Project Wedding</a></li>
                    <li><a href="#">KDEVENTPLACE Blog</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 third">
                <h5><b>Legal :</b></h5>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Terms of Purchase</a></li>
                    <li><a href="#">Privacy Policy<sup>®</sup></a></li>
                    <li><a href="#">Community Guidelines<sup>®</sup></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fourth">
                <h5><b>Connect With Us</b></h5>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Press Center</a></li>
                    <li><a href="#">Help<sup>®</sup></a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center"><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/help.png"></a></div>
        <div class="clearfix"></div>
        <p class="text-center">Copyright © 2006-2017. KDEVENTPLACE Inc., All Rights Reserved.</p>
    </div>
</footer>


<!--<script type="text/javascript" src="<?php // echo base_url();  ?>assets/front/js/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/webslidemenu.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">

    function toggleChevron(e) {
        $(e.target)
                .prev('.panel-heading')
                .find("i")
                .toggleClass('rotate-icon');
        $('.panel-body.animated').toggleClass('zoomIn zoomOut');
    }

    $(document).ready(function (ev) {
        $('#custom_carousel').on('slide.bs.carousel', function (evt) {
            $('#custom_carousel .controls li.active').removeClass('active');
            $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
        });
        
        $('#fullscreen').tooltip();

        $('#accordion').on('hide.bs.collapse', toggleChevron);
        $('#accordion').on('show.bs.collapse', toggleChevron);

        $('.navbar-toggler').on('click', function (event) {
            event.preventDefault();
            $(this).closest('.navbar-minimal').toggleClass('open');
        })
    });
</script>