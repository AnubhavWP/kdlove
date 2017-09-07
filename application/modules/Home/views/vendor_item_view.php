
    <div class="layout__container js-blur js-overflow">
     
    <div class="dir-home-promoted" style="background-color: #ccc"> 
        <!-- slider for background -->
        <div class="slider slider--directory swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide"> <img class="slide__photo visible-xs" src="<?php echo base_url();?>assets/image/14272124431.jpg" alt=""> <img class="slide__photo hidden-xs" src="<?php echo base_url();?>assets/image/1427212443.jpg" alt=""> </div>
            </div>
          </div>
        </div>
        
        
      </div>
<div class="container-fluid">
<div class="row">
<div class="col-xs-12">
<div class="row">
<div class="col-md-10 col-lg-10  col-sm-8 p-10">
<div class="row">
<div class="col-xs-12">
<div class="grid__intro mtm mbs">
<div class="row">
<div class="col-md-8 hidden-xs">
<h3 class="grid__title grid__title--home">Wedding Photos</h3>
</div>
<div class="col-md-4 col-xs-12 ">
<div class="visible-xs grid-quick-links">
<a class="grid-quick-links__item button button--hidden button--small" href="#filter-map">
<span class="icon icon_pin-map"></span> Map	</a>
<a class="grid-quick-links__item button button--hidden button--small" href="#filter">
<span class="icon icon_filter"></span> Filter	</a>
</div>
<ul class="grid__order text-right hidden-xs">
<li>
<span class="grid__order-item grid__order-item--active">Recommended</span>
</li>
<li>
<a class="grid__order-item" href="#">Top rated</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
	
<div class="leftlist">


<?php
	if(!empty($vendor_item)){
	foreach($vendor_item as $item){
 ?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 p-10">
<div class="whitethumd">
<img src="<?php echo base_url();?>assets/image/25ec94d9-daae-11e6-b589-12072ec58d1a~sc_290.290.jpg" class="image-responsive">
<div class="productname"><?php echo $item->name;?> <span class="pull-right"><i class="fa fa-heart heartborder"></i></span></div>
</div>
</div>

<?php }
}else{
	?>
<h3>No Record found.</h3>
<?php }?>


<div class="com-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3"><div class="bs-example">
    <ul class="pagination">
		<?php foreach ($links as $link) {
		echo "<li>". $link."</li>";
		} ?>
    </ul>
</div>
</div>
</div>
	

<!-- Pagination backup when there is no js !-->

</div>

<div class="col-md-2 col-lg-2 col-sm-4 p-10">


<div id="filter" class="filter-list box--grey-alt mbm mtm">
<div class="filter-list__block">
<div class="clearfix"></div>
<button class="col-md-6 col-sm-6 col-xs-12 mt-5" disabled>Photo</button>
<button class="col-md-6 col-sm-6 col-xs-12 mt-5" disabled>Albums</button>
<h6 class=" mt-5 pt-10">Filter</h6>
<div class="clearfix"></div>
<button class="col-md-6 col-sm-6 col-xs-12 mt-5" disabled>Clear</button>
<button class="col-md-6 col-sm-6 col-xs-12 mt-5" disabled>Apply</button>
<div class="clearfix"></div>
<ul class="filter-list__list">
<li class="mb-10"><a href="#" class="filter-list__name lineheightborder">Category</a>
<div class="clearfix"></div>
<?php 
foreach($vendor_category as $category){
?>
<div class="col-lg-12 pl-0 pt-10"><input type="checkbox">&nbsp; <?php echo ucfirst($category['name']); ?></div>
<?php }?>
</li>

</ul>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
      
    
    