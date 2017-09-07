<?php if ($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger alert-dismissable"> 
        <a href="#" class="close" data-dismiss="alert" aria-label="close">Ã—</a>
        <?= $this->session->flashdata('error') ?> </div>

<?php } else if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">Ã—</a>
        <?= $this->session->flashdata('success') ?> </div>

<?php } ?>
<!-- generic bootstrap popup -->
<div class="bgcolorgrn">
    <div class=" container-fluid hidden-sm hidden-xs">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="http://dnddemo.com/Kdlovestories/design21/logo.png"></a>
            </div>
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav">




                    <?php foreach ($header_info as $menu) {
//     dump($menu);
                        ?>
                        <li class="dropdown mega-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-check-square-o" aria-hidden="true"></i>  &nbsp; <?php echo strtoupper($menu['title']); ?>  </a>
                            <ul class="dropdown-menu mega-dropdown-menu row">

                                <div class="col-lg-12 col-md-12  col-md-12 bgimgmenu">
                                    <h2> <i class="fa fa-check-square-o" aria-hidden="true"></i><?php echo strtoupper($menu['title']); ?> </h2>
                                </div>
                                <?php
                                $id = $menu['id'];
                                $sub_meu = $this->Frontend_model->getAllValueByid($id, 'menu_id', 'sub_menu');
                                foreach ($sub_meu as $sb_menu) {
                                    if ($sb_menu['menu_id'] == '1') {
                                        $url = lcfirst($sb_menu['title']);
                                        ?>     
                                        <li class="col-sm-3">
                                            <ul>
                                                <li class="dropdown-header topbtm"><a href="<?php echo base_url(); ?>planning/<?php echo str_replace(' ', '_', $url); ?>"><i class="<?php echo $sb_menu['image_icon']; ?>" aria-hidden="true"></i> <?php echo $sb_menu['title']; ?>
                                                        <span><?php echo $sb_menu['desc']; ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php
                                    } elseif ($sb_menu['menu_id'] == '3') {
                                        ?>
                                        <li class="col-sm-3 catbg">
                                            <ul>
                                                <li class="dropdown-header">Popular Categories</li>
                                                <li><a href="#"><i class="fa fa-female"></i>&nbsp; Fashion</a></li>
                                                <li><a href="#"><i class="fa fa-female"></i>&nbsp; Reception</a></li>
                                                <li><a href="#"><i class="fa fa-cog"></i>&nbsp; Services</a></li>
                                                <li><a href="#"><i class="fa fa-home"></i>&nbsp; Accommodation</a></li>
                                                <li><a href="#"><i class="fa fa-edit"></i>&nbsp; Review</a></li>
                                            </ul>
                                            <ul>
                                                <li class="dropdown-header">Find By Location</li>
                                                <li><a href="#">Sydeny</a></li>
                                                <li><a href="#">Melbourne</a></li>
                                                <li><a href="#">Brisbane</a></li>
                                                <li><a href="#">Perth</a></li>
                                                <li><a href="#">Canbera</a></li>
                                                <li><a href="#">Hobart</a></li>
                                                <li><a href="#">Darwin</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <ul>
                                                <li class="dropdown-header ">
                                                    <i class="fa fa-female"></i>&nbsp; 
                                                    <p class="cathead"><?php echo ucfirst($sb_menu['title']); ?></p>
                                                </li>
                                                <?php
                                                $men_id = $sb_menu['id'];
                                                $category = $this->Frontend_model->get_vendorCategoryBysubmenu($men_id);
                                                foreach ($category as $cat_details) {
                                                    $id = $cat_details['id'];
                                                    echo "<li><a href='" . base_url() . "/front/vendor_category/" . $id . "'>" . $cat_details['name'] . "</a></li>";
                                                }
                                                ?>

                                            </ul>
                                        </li>

                                    <?php } else { ?>
                                        <li class="col-sm-2">
                                            <ul>
                                                <li class="dropdown-header"><i class="fa fa-gift"></i>&nbsp; <?php echo $sb_menu['title']; ?></li>
                                                <?php
                                                $m_id = $sb_menu['id'];
                                                $categories = $this->Frontend_model->get_categoryBysubmenu($m_id);
                                                foreach ($categories as $cat_details) {

                                                    echo "<li><a href='" . base_url() . "magzine/view_magzine'>" . $cat_details['category_name'] . "</a></li>";
                                                }
                                                ?>

                                            </ul>	
                                        </li>	

                                    <?php }
                                }
                                ?>

                            </ul>
                        </li>
                    <?php } ?>   

                    <!--            <li class="dropdown mega-dropdown">
                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user" aria-hidden="true"></i> &nbsp; VENDORS </a>
                                     <ul class="dropdown-menu mega-dropdown-menu row">
                                        <div class="col-lg-12 col-md-12  col-md-12 bgimgmenu">
                                           <h2> <i class="fa fa-user"></i> VENDORS</h2>
                                        </div>
                                        <li class="col-sm-3 catbg">
                                           <ul>
                                              <li class="dropdown-header">Popular Categories</li>
                                              <li><a href="#"><i class="fa fa-female"></i>&nbsp; Fashion</a></li>
                                              <li><a href="#"><i class="fa fa-female"></i>&nbsp; Reception</a></li>
                                              <li><a href="#"><i class="fa fa-cog"></i>&nbsp; Services</a></li>
                                              <li><a href="#"><i class="fa fa-home"></i>&nbsp; Accommodation</a></li>
                                              <li><a href="#"><i class="fa fa-edit"></i>&nbsp; Review</a></li>
                                           </ul>
                                           <ul>
                                              <li class="dropdown-header">Find By Location</li>
                                              <li><a href="#">Sydeny</a></li>
                                              <li><a href="#">Melbourne</a></li>
                                              <li><a href="#">Brisbane</a></li>
                                              <li><a href="#">Perth</a></li>
                                              <li><a href="#">Canbera</a></li>
                                              <li><a href="#">Hobart</a></li>
                                              <li><a href="#">Darwin</a></li>
                                           </ul>
                                        </li>
                                        <li class="col-sm-3">
                                           <ul>
                                              <li class="dropdown-header ">
                                                 <i class="fa fa-female"></i>&nbsp; 
                                                 <p class="cathead">Fashion</p>
                                              </li>
                                              <li><a href="#">Accessories</a></li>
                                              <li><a href="#">Beauty Services</a></li>
                                              <li><a href="#">Bridesmaid Dresses</a></li>
                                              <li><a href="#">Dress Designers</a></li>
                                              <li><a href="#">Flower Girls</a></li>
                                              <li><a href="#">Formal Wear</a></li>
                                              <li><a href="#">Hair and Makeup</a></li>
                                              <li><a href="#">Jewellery</a></li>
                                              <li><a href="#">Wedding Dresses</a></li>
                                              <li><a href="#">Wedding Lingerie</a></li>
                                              <li><a href="#">Wedding Shoes</a></li>
                                           </ul>
                                        </li>
                                        <li class="col-sm-3">
                                           <ul>
                                              <li class="dropdown-header"> <i class="fa fa-female"></i>&nbsp;Reception</li>
                                              <li><a href="#">Cakes</a></li>
                                              <li><a href="#">Caterers</a></li>
                                              <li><a href="#">Decorations</a></li>
                                              <li><a href="#">Ceremony & Reception Venues</a></li>
                                              <li class="dropdown-header"><i class="fa fa-home"></i>&nbsp; Accommodation</li>
                                              <li><a href="#">Guest Accommodation</a></li>
                                              <li><a href="#">Travel and Vacation</a></li>
                                              <li><a href="#">Honeymoons</a></li>
                                              <li><a href="#">Honeymoon Packages</a></li>
                                              <li class="dropdown-header"><i class="fa fa-edit"></i>&nbsp; Reviews</li>
                                              <li><a href="#">All reviews</a></li>
                                              <li><a href="#">Submit your reviews</a></li>
                                           </ul>
                                        </li>
                                        <li class="col-sm-3">
                                           <ul>
                                              <li class="dropdown-header"><i class="fa fa-cog"></i>&nbsp; Services</li>
                                              <li><a href="#">Flowers</a></li>
                                              <li><a href="#">Invitations</a></li>
                                              <li><a href="#">DJs</a></li>
                                              <li><a href="#">Musical Bands</a></li>
                                              <li><a href="#">Comedian / MC </a></li>
                                              <li><a href="#">Photography</a></li>
                                              <li><a href="#">Planners</a></li>
                                              <li><a href="#">Unique Services</a></li>
                                              <li><a href="#">Stylists</a></li>
                                              <li><a href="#">Make-up Artist</a></li>
                                              <li><a href="#">Transport & Cars</a></li>
                                              <li><a href="#">Videography</a></li>
                                           </ul>
                                        </li>
                                     </ul>
                                  </li>  -->
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gift" aria-hidden="true"></i>&nbsp; GIFT REGISTRY </a>
                        <ul class="dropdown-menu mega-dropdown-menu row">
                            <div class="col-lg-12 col-md-12  col-md-12 bgimgmenu">
                                <h2> <i class="fa fa-gift"></i> GIFT REGISTRY</h2>
                            </div>
                            <!--    <li class="col-sm-5">
                                  <ul class="col-md-6">
                                     <li class="dropdown-header"><i class="fa fa-list-alt"></i>&nbsp; Categories</li>
                                     <li><a href="#">Bed & Bath </a></li>
                                     <li><a href="#">Cash and Honeymoon Funds</a></li>
                                     <li><a href="#">Electronics </a></li>
                                     <li><a href="#">Entertaining </a></li>
                                     <li><a href="#">Fitness and Leisure </a></li>
                                  </ul>
                                  <ul class="col-md-6">
                                     <li style="height:41px"></li>
                                     <li><a href="#">Furniture </a></li>
                                     <li><a href="#">Home Appliances </a></li>
                                     <li><a href="#">Home Decor </a></li>
                                     <li><a href="#">Kitchen </a></li>
                                     <li><a href="#">Outdoor </a></li>
                                  </ul>
                                  <ul class="col-sm-12">
                                     <li class="dropdown-header"><i class="fa fa-gift"></i>&nbsp; Dummy</li>
                                     <li class="col-sm-6"><a href="#">Dummy </a></li>
                                     <li class="col-sm-6"><a href="#">Dummy </a></li>
                                     <li class="col-sm-6"><a href="#">Dummy </a></li>
                                  </ul>
                               </li> -->
                            <!--           <li class="col-sm-2">
                                         <ul>
                                            <li class="dropdown-header"><i class="fa fa-list-alt fa-user"></i>&nbsp; Choose Gift </li>
                                            <li><a href="#">Category </a></li>
                                            <li><a href="#">Store </a></li>
                                            <li><a href="#">Brand </a></li>
                                         </ul>
                                         <ul>
                                            <li class="dropdown-header"><i class="fa fa-list-alt fa-user"></i>&nbsp; Gift Registries</li>
                                            <li><a href="#">Find a couple's registry </a></li>
                                            <li><a href="#">Create a registry </a></li>
                                            <li><a href="#">FAQs</a></li>
                                         </ul>
                                      </li> -->
                            <li class="col-sm-5">
                                <ul>
                                    <li style="height:18px;"></li>
                                    <img src="<?php echo base_url(); ?>assets/image/ew-registry-menu.jpg" class="img-responsive" style="width:100%">
                                    <h5 class="text-center"><strong>Your perfect gift registry made easy!</strong></h5>
                                    <p class="text-center">The fun and easy way to create your wedding gift registry.</p>
                                    <li class="col-lg-6 col-md-6"><input type="button" class="findregistery" value="Find Registery" ></li>
                                    <li class="col-lg-6 col-md-6"><input type="button" class="createreg" value="Create Registery"></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="dropdown mega-dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user" aria-hidden="true"></i>  &nbsp;   KDSHOP  </a>
                       <ul class="dropdown-menu mega-dropdown-menu row">
                          <div class="col-lg-12 col-md-12  col-md-12 bgimgmenu">
                             <h2> <i class="fa fa-building" aria-hidden="true"></i> KDSHOP </h2>
                          </div>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header topbtm">
                                   <a href="#"><i class="fa fa-female spc" aria-hidden="true"></i> Women's Fashion<span>A step-by-step checklist of things to be done before your big day</span></a>
                                </li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-user spc" aria-hidden="true"></i>Men's Fashion<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-users spc"></i>Babies, Kids & Toy<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-clock-o spc"></i> Jewelry & Watches<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-heartbeat spc"></i>Health & Beauty<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-cutlery spc"></i>Home & Kitchen<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header"><a href="#"><i class="fa fa-plug spc"></i>Electronics<span>A step-by-step checklist of things to be done before your big day</span></a> </li>
                             </ul>
                          </li>
                          <li class="col-sm-3">
                             <ul>
                                <li class="dropdown-header"><a href="#"><i class="fa fa-bars spc"></i>Other CAtegories<span>A step-by-step checklist of things to be done before your big day</span></a> </li>
                             </ul>
                          </li>
                       </ul>
                    </li> -->
                    <!--        <li class="dropdown mega-dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> FORUM </a>
                              <ul class="dropdown-menu mega-dropdown-menu row">
                                 <div class="col-lg-12 col-md-12  col-md-12 bgimgmenu">
                                    <h2> <i class="fa fa-building" aria-hidden="true"></i> FORUM </h2>
                                 </div>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header topbtm">
                                          <a href="#"><i class="fa fa-female spc" aria-hidden="true"></i> Wedding & Marriage <span>A step-by-step checklist of things to be done before your big day</span></a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-medkit spc" aria-hidden="true"></i> Sex & Sexual Health<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-clock-o spc"></i> Pregnancy & Parenting <span>A step-by-step checklist of things to be done before your big day</span></a></li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-users spc"></i>  Dating & Engage<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-heartbeat spc"></i> Divorce  &  Reconcilliation<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header topbtm"><a href="#"><i class="fa fa-globe spc"></i> Traditional Rites<span>A step-by-step checklist of things to be done before your big day</span></a></li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header"><a href="#"><i class="fa fa-child spc"></i> Inter-Ethnic Marriage<span>A step-by-step checklist of things to be done before your big day</span></a> </li>
                                    </ul>
                                 </li>
                                 <li class="col-sm-3">
                                    <ul>
                                       <li class="dropdown-header"><a href="#"><i class="fa fa-leaf spc"></i>General<span>A step-by-step checklist of things to be done before your big day</span></a> </li>
                                    </ul>
                                 </li>
                              </ul>
                           </li> -->
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="widthtopli">
                        <div class="input-group col-md-12" style=" margin-top:9px">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg topsrchbtn" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <input type="text" class="form-control  topsrch" placeholder="Search for suppliers, photos, ideas & more..." />
                        </div>
                    </li>
                    <?php
                    $email = $this->session->userdata('email');

                    if ($email != "") {
                        echo '<li> <a href="' . base_url() . 'front/logout' . '" role="button">Logout</a></li>';
                    } else {
                        echo '<li> <a href="#" role="button" data-toggle="modal" data-target="#login-modal">LOGIN</a></li>';
                    }
                    ?>


                </ul>
            </div>




            <!-- /.nav-collapse -->
        </nav>
    </div>
</div>
<div id="ewSiteNav" class="hidden-lg hidden-md" data-ng-controller="siteNavigationCtrl as vm">
    <aside id="sidebar" data-ng-class="{ 'toggled': vm.sidebarToggle.left === true }">
        <div id="ew-sidebar-mobile-nav" class="sidebar-inner c-overflow">
            <div class="profile-menu" data-ng-show="vm.isLoggedIn">
                <a toggle-submenu>
                    <div class="profile-pic">
                        <img src="<?php echo base_url(); ?>assets/image/placeholder-profile-40x40.png"alt="My Account" />
                        <img src="<?php echo base_url(); ?>assets/image/placeholder-profile-40x40.png" alt="My Account" />
                    </div>
                    <div class="profile-info">
                        <span data-ng-bind="vm.UserProfileExtended.FirstName"></span>
                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                </a>
                <ul class="main-menu">
                    <li>
                        <a href="#"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-account"></i> View Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <style>
                /* Override the default background assets/image using the bride API once completed. */
                #sidebar .profile-menu > a {
                    background: url(%7b%7b%20vm.bridecoverassets/image%20%7d%7d/index.html);
                }
            </style>
            <div class="profile-menu not-logged-in" data-ng-hide="vm.isLoggedIn">
                <a href="#">
                    <div class="profile-pic">
                        <img src="<?php echo base_url(); ?>assets/image/placeholder-profile-40x40.png" alt="My Account" />
                        <!--<span class="profile-info-logged-out">Sign In</span>-->
                    </div>
                    <div class="profile-info">
                        <span>Sign In / Register</span>
                        <!-- <i class="zmdi zmdi-caret-down"></i> -->
                    </div>
                </a>
            </div>
            <ul class="main-menu" style="margin-bottom: 250px">
                <li class="sub-menu">
                    <a href="#" toggle-submenu><i class="fa fa-check-square-o"></i>&nbsp; Planning Tools</a>
                    <ul>
                        <li><a href="#" close-submenu><i class="zmdi zmdi-chevron-left"></i> BACK</a></li>
                        <li class="divider">Planning Tools</li>
                        <li><a href="#"> Wedding Website</a></li>
                        <li><a href="#"> Budget Calculator</a></li>
                        <li><a href="#"> Checklist</a></li>
                        <li><a href="#">Vendor Manager</a></li>
                        <li><a href="#">Wedding Date Planner</a></li>
                        <li><a href="#">Guest List</a></li>
                        <li><a href="#">Hotel Planner</a></li>
                        <li><a href="#">Seating Planner</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" toggle-submenu><i class="fa fa-user"></i>&nbsp; Vendor</a>
                    <ul>
                        <li><a href="#" close-submenu><i class="zmdi zmdi-chevron-left"></i> BACK</a></li>
                        <li class="divider">Fashion</li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Beauty Services</a></li>
                        <li><a href="#">Bridesmaid Dresses</a></li>
                        <li><a href="#">Dress Designers</a></li>
                        <li><a href="#">Flower Girls</a></li>
                        <li><a href="#">Formal Wear</a></li>
                        <li><a href="#">Hair and Makeup</a></li>
                        <li><a href="#">Jewellery</a></li>
                        <li><a href="#">Wedding Dresses</a></li>
                        <li><a href="#">Wedding Lingerie</a></li>
                        <li><a href="#">Wedding Shoes</a></li>
                        <li class="divider">Reception</li>
                        <li><a href="#">Cakes</a></li>
                        <li><a href="#">Caterers</a></li>
                        <li><a href="#">Decorations</a></li>
                        <li><a href="#">Ceremony & Reception Venues</a></li>
                        <li class="divider">Accommodation</li>
                        <li><a href="#">Guest Accommodation</a></li>
                        <li><a href="#">Travel and Vacation</a></li>
                        <li><a href="#">Honeymoons</a></li>
                        <li><a href="#">Honeymoon Packages</a></li>
                        <li class="divider">Reviews</li>
                        <li><a href="#">All reviews</a></li>
                        <li><a href="#">Submit your reviews</a></li>
                        <li class="divider">Services</li>
                        <li><a href="#">Flowers</a></li>
                        <li><a href="#">Invitations</a></li>
                        <li><a href="#">DJs</a></li>
                        <li><a href="#">Musical Bands</a></li>
                        <li><a href="#">Comedian / MC </a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Planners</a></li>
                        <li><a href="#">Unique Services</a></li>
                        <li><a href="#">Stylists</a></li>
                        <li><a href="#">Make-up Artist</a></li>
                        <li><a href="#">Transport & Cars</a></li>
                        <li><a href="#">Videography</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" toggle-submenu><i class="fa fa-address-book-o"></i>&nbsp; Magazine</a>
                    <ul>
                        <li><a href="#" close-submenu><i class="zmdi zmdi-chevron-left"></i> BACK</a></li>
                        <li class="divider">Real Wedding</li>
                        <li><a href="#">Real Weddings</a></li>
                        <li><a href="#">Love Stories</a></li>
                        <li><a href="#">Submit Your Wedding/Love Stories</a></li>
                        <li class="divider">Reception</li>
                        <li><a href="#">Wedding Dresses</a></li>
                        <li><a href="#">Honeymoon</a></li>
                        <li><a href="#">Bridesmaids</a></li>
                        <li><a href="#">Cakes</a></li>
                        <li><a href="#">Cars</a></li>
                        <li><a href="#">Caterers</a></li>
                        <li><a href="#">Decorations</a></li>
                        <li><a href="#">Flower Girls</a></li>
                        <li><a href="#">Flowers</a></li>
                        <li><a href="#">Hair</a></li>
                        <li><a href="#">Planning</a></li>
                        <li><a href="#">Invitations </a></li>
                        <li><a href="#">Makeup</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Venues</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">General</a></li>
                        <li class="divider">Photo Filter</li>
                        <li><a href="#">Popular Photos</a></li>
                        <li>
                            <a href="#">
                                <div class ="ronad red"></div>
                                Red
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class ="ronad black"></div>
                                Black
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class ="ronad sky"></div>
                                Blue
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class ="ronad green"></div>
                                Green
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class ="ronad yellow"></div>
                                Yellow
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class ="ronad orange"></div>
                                Orange
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class ="ronad bringle"></div>
                                Light Purple
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" toggle-submenu><i class="fa fa-gift"></i>&nbsp;Gift Registry</a>
                    <ul>
                        <li><a href="#" close-submenu><i class="zmdi zmdi-chevron-left"></i> BACK</a></li>
                        <li class="divider"><i class="directory ew-icon-marriage-celebrant"></i>Categories</li>
                        <li><a href="#">Bed & Bath </a></li>
                        <li><a href="#">Cash and Honeymoon Funds</a></li>
                        <li><a href="#">Charity </a></li>
                        <li><a href="#">Electronics </a></li>
                        <li><a href="#">Entertaining </a></li>
                        <li><a href="#">Fitness and Leisure</a></li>
                        <li><a href="#">Furniture </a></li>
                        <li><a href="#">Home Appliances </a></li>
                        <li><a href="#">Home Decor </a></li>
                        <li><a href="#">Kitchen </a></li>
                        <li><a href="#">Outdoor </a></li>
                        <li><a href="#">Travel </a></li>
                        <li class="divider"><i class="directory ew-icon-ideas"></i> Choose Gifts by</li>
                        <li><a href="#">Category </a></li>
                        <li><a href="#">Store </a></li>
                        <li><a href="#">Brand</a></li>
                        <!--<li><a href="/photos/search/" onclick="ga('send', 'event', 'ew-mobile-nav', 'wedding-shop', 'search')">Search</a></li>-->
                        <li class="divider"><i class="directory ew-icon-ideas"></i> Gift Registry</li>
                        <li><a href="#">Find a couple's registry </a></li>
                        <li><a href="#">Create a registry </a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" toggle-submenu><i class="fa fa-user"></i>&nbsp; KDSHOP</a>
                    <ul>
                        <li><a href="#" close-submenu><i class="zmdi zmdi-chevron-left"></i> BACK</a></li>
                        <li class="divider">KDSHOP</li>
                        <li><a href="#">Women's Fashion</a></li>
                        <li><a href="#"> Men's Fashion </a></li>
                        <li><a href="#"> Babies, Kids & Toy</a></li>
                        <li><a href="#">Jewelry & Watches  </a></li>
                        <li><a href="#">Health & Beauty</a></li>
                        <li><a href="#">Home & Kitchen</a></li>
                        <li><a href="#">Electronics </a></li>
                        <li><a href="#">Other Categories </a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#" toggle-submenu><i class="fa fa-edit"></i>&nbsp; Forum</a>
                    <ul>
                        <li><a href="#" close-submenu><i class="zmdi zmdi-chevron-left"></i> BACK</a></li>
                        <li class="divider"><i class="directory fa fa-plane"></i> Forum</li>
                        <li><a href="#">Wedding & marriage </a></li>
                        <li><a href="#"> Sex & sexual health</a></li>
                        <li><a href="#"> Pregnancy & parenting</a></li>
                        <li><a href="#">Dating & engage </a></li>
                        <li><a href="#">Divorce  &  reconcilliation </a></li>
                        <li><a href="#">Traditional rites</a></li>
                        <li><a href="#">Inter-ethnic marriage</a></li>
                        <li><a href="#">General </a></li>
                    </ul>
                </li>
            </ul>
            <br/><br/>
        </div>
    </aside>
    <div class="navbar navbar-ew-scroll navbar-fixed-top hidden-print " id="ew-scrollnav" role="navigation">
        <div id="ew-sn-logo-bar">
            <div class="container">
                <div class="row">
                    <li class="visible-xs"
                        id="ew-mobile-menu-trigger"
                        data-target="mainmenu"
                        data-toggle-sidebar
                        data-model-left="vm.sidebarToggle.left"
                        data-ng-class="{ 'open': vm.sidebarToggle.left === true }">
                        <div class="line-wrap">
                            <div class="line top"></div>
                            <div class="line center"></div>
                            <div class="line bottom"></div>
                        </div>
                    </li>
                    <div id="ew-mainlogo" class="col-xs-3">
                        <a href="#" onclick="ga('send', 'event', 'ew-top-nav', 'ew-top-nav-bar', {'page': '/'});">
                            <span class="hidden-xs">
                                <img  src="<?php echo base_url(); ?>assets/image/logo.png" data-fallback="<?php echo base_url(); ?>assets/image/logo.png"  class="logo" />
                            </span>
                            <span class="visible-xs">
                                <img  src="<?php echo base_url(); ?>assets/image/logo.png" data-fallback="<?php echo base_url(); ?>assets/image/logo.png"  class="logoicon" />
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="ew-search-bar-item pull-right hidden-sm hidden-md hidden-lg">
                            <a id="flip" data-toggle-sidebar toggle-search-takeover class="ew-search-bar-item-inner">
                                <i class="fa fa-search fa-lg text-muted"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Search for suppliers, photos, ideas & more..." />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#ew-sn-logo-bar -->
        <!-- /nav -->
        <div class="clearfix"></div>
    </div>
    <!-- /#ew-scrollnav -->
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" src="<?php echo base_url(); ?>assets/image/pic.jpg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <!-- Begin # Login Form -->
                <!-- <form id="login-form" method="post" action="<?php echo base_url(); ?>front/couple_login"> -->

                <?php
                echo form_open('front/couple_login', array(
                    'id' => 'login-form'
                ));
                ?>
                <div class="modal-body">
                    <div id="div-login-msg">
                        <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                        <span id="text-login-msg">LOGIN TO KDEVENTPLANTS</span>
                    </div>  
                    <input id="login_username" class=" usernamepop" name="email" type="text" placeholder="Your email address" >
                    <div style="color:red;"><?php echo form_error('email'); ?></div>  
                    <input id="login_password" class=" usernamepop" name="password" type="password" placeholder="Password" >
                    <div style="color:red;"><?php echo form_error('password'); ?></div>  
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <button type="submit" class="usernamepop pillabtn">Login</button>
                    </div>

<?php echo form_close(); ?>
                    <!--   </form> -->
                    <div>
                        <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        <button id="login_register_btn" type="button" class="btn btn-link">Not a member yet?  Join now!</button>
                    </div>
                </div>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="usernamepop" type="text" placeholder="E-Mail" >
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="usernamepop yellowbtn">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <?php
                echo form_open('front/couple_register', array(
                    'id' => 'register-form',
                    'style' => 'display:none'
                ));
                ?>
                <!-- <form id="register-form" style="display:none;" method="post" action="<?php echo base_url(); ?>front/couple_register"> -->
                <div class="modal-body">
                    <div id="div-register-msg">
                        <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                        <span id="text-register-msg"><h3>Your personal wedding plan starts now</h3>
                            <p class="text-center">Advice, tools, and the best local vendors to have a wedding that's uniquely you (cue the confetti!)</p></span>
                    </div>
                    <input id="register_username" class="usernamepop" name="register_email" type="text" placeholder="Email" >
                    <div style="color:red;"><?php echo form_error('register_email'); ?></div>

                    <input id="register_email" class="usernamepop" name="register_password" type="password" placeholder="Password (6 or more characters)" >
                    <div style="color:red;"><?php echo form_error('register_password'); ?></div>  

                </div>
                <p class="text-center">By signing up, you agree to our <a href="#">Terms </a>and <a href="#">Privacy Policy</a>.</p>
                <div class="modal-footer">
                    <div>
                        <button type="submit" class="usernamepop yellowbtn">Register</button>
                    </div>
<?php echo form_close(); ?>
                    <!-- </form> -->
                    <div>
                        <input id="register_login_btn" type="submit" name="submit" class="btn btn-link">Log In</input>
                        <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                    </div>
                </div>

                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>