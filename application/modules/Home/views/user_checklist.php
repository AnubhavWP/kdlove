
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #f22821;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}



.flipWrapper {
-webkit-perspective: 1000;
width: 400px;
height: 200px;
position: relative;
margin: 50px auto;
}
.flipWrapper .card.flipped {
-webkit-transform: rotatey(180deg);
}
.flipWrapper .card {
width: 100%;
height: 100%;
-webkit-transform-style: preserve-3d;
-webkit-transition: 0.5s;
}
.flipWrapper .card .face {
width: 100%;

height: 100%;
position: absolute;
-webkit-backface-visibility: hidden;
z-index: 2;
font-family: Georgia;
font-size: 3em;
text-align: center;
line-height: 200px;
}
.flipWrapper .card .front {

position: absolute;
z-index: 1;
background: rgb(57, 171, 62);
color: white;
cursor: pointer;
border-radius: 10px;
}
.flipWrapper .card .back {
-webkit-transform: rotatey(-180deg);
background: blue;
background: red;
color: white;
cursor: pointer;
border-radius: 10px;
}

</style>


<?php 

$user_id = $this->session->userdata('user_id');
?>



    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Plan an engagement party</h4>
        </div>
        <div class="modal-body">

           <form id="add_note_submit" method="post"> 
          <div class="form-group">
                <label for="dtp_input1" class="col-md-4 control-label">DateTime Picking</label>
                <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" name="note_date" id="note_date_id" size="16" type="text">
                    <span class="input-group-addon"><i class="fa fa-times"></i></span>
               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
           
            </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="email">My Notes:</label>
     <div class="col-sm-8">
      <textarea class="form-control" name="note" id="note_area" rows="5" id="comment"></textarea>
     </div>
   </div>

     <center><button type="submit" class="btn btn-primary">Add Note</button><center>
      </form>

         <div class="space_m"></div>
          <p>Editor's Tip: Not everyone has one. Traditionally your or your fiancé's parents host, but anyone can throw it for you. If you are having one, you'll want to set a date and draft the guest list.</p>
          <a href="#" class="r_more">Read How to Pick the Perfect Wedding Date</a>
        </div>
        <div class="modal-footer">
          <form action="<?php echo base_url();?>front/user_checklist" method="post">
          <button type="submit"  class="btn btn-default">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- end of note section -->



            <div class="layout__container js-blur js-overflow">
               <div class="container-fluid pad_0">
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 pad_0 side_menu ">
                     <p style="visibility:hidden"><a href="#"><i class="fa fa-long-arrow-left"></i> HOME</a></p>
                     <p><a href="#"><i class="fa fa-long-arrow-left"></i> HOME</a></p>
                     <ul>
                        <li>CHECKLIST</li>
                        <li><a href="#"><i class="fa fa-pencil"></i> Make It Yours</a></li>
                     </ul>
                  </div>
                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 intro_back">
                  <div class="media intro">
                    <div class="media-left">
                      <img src="<?php echo $user_info['image']; ?>" class="media-object" style="margin-top:0px;">
                    </div>
                    <div class="media-body">
                     <br><br>
                      <h3 class="media-heading"><?php echo $user_info['first_name'];?>& <?php echo $user_info['fiance_first_name']; ?></h3>
                      <p>Way to go! You’re 6% done planning.</p>
                    </div>
                  </div>
                  </div>
               </div>
               <div class="container-fluid pad_0">
                  <div class="col col-sm-3 col-md-3 col-lg-2 pad_0">
                     <ul class="nav nav-tabs nav-stacked text-center tab" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-list" aria-hidden="true"></i> To-do</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-tags" aria-hidden="true"></i> Budget</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> My vendors</a></li>
                        <li role="presentation"><a href="#" aria-controls="messages" role="tab" data-toggle="tab">
                           <div id="custom-search-input" style="border-radius:43px; width:95%;">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" /  style="border-radius:43px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                     </li>
                     </ul>
                  </div>
                  <div class="col col-sm-9 col-md-9 col-lg-10">
                     <div class="row tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home">                           
                           <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 add_b alag1">You've completed 9 tasks.</div>
                           <a href="#">
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 add_b1 alag2">Show completed
                                     <div>
                                      <label class="switch">
                                      <input id="show_completed" type="checkbox">
                                      <span class="slider round"></span>
                                      </label>
                                     </div  > 
                            </div>
                           </a>
                           <div class="clearfix"></div>
                           <h5 class="li_list">This week</h5>
                           <div class="media">
                             <div class="media-left">
                               <i class="fa fa-heart"></i>
                             </div>
                             <div class="media-body">
                               <p>Congratulations, Akash! Your loved ones probably have a million questions about the big day, but it's okay to not have all the answers yet! We'll help you every step of the way as you plan your dream wedding.</p>
                             </div>
                           </div>
                           <div class="clearfix"></div>
                           <h5 class="li_list">November 2017</h5>

                           <?php  
                           foreach($checklist_to_do as $to_do_checklist){
                           ?>

                         <div class="rowline not_done" id="<?php echo $to_do_checklist['id']; ?>">
                           <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 opt1 late">
                              <div class="checkbox">
                                 <label style="font-size: 1em; line-height: 35px;">
                                 <input type="checkbox" class="coupon_question" name="check_value_id"  value="<?php echo $to_do_checklist['id']; ?>">
                                 <span class="cr"><i class="cr-icon fa fa-check"></i></span>                                 
                                  <?php echo $to_do_checklist['values']; ?>
                                 </label>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 late_icon">
                            <a href="#"> <i class="fa fa-clock-o"></i></a> 
                            <a href="#"  value="<?php echo $to_do_checklist['id']; ?>" class="delete_checklist"><i class="fa fa-trash"></i></a>
                            <a href="#" data-toggle="modal" id="<?php echo $to_do_checklist['id']; ?>"  class="note"   data-target="#myModal"><i class="fa fa-ellipsis-h"></i></a>
                           
                           </div> 
                         </div>


                           <!-- undo delete the option -->

                
                           <!-- End undo delete option -->
                           <?php }?>


                             <?php

                             if(!empty($get_cheked_to_do)){  
                           foreach($get_cheked_to_do as $to_do_checklist){
                          
                           ?>
                           <div class="rowline done_task" style="display:none;" id="<?php echo $to_do_checklist['id']; ?>">
                           <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 opt1 late">
                              <div class="checkbox"  >
                                 <label style="font-size: 1em; line-height: 35px;">
                                 <input type="checkbox" class="coupon_question" value="<?php echo $to_do_checklist['id']; ?>" checked>
                                 <span class="cr"><i class="cr-icon fa fa-check"></i></span>                                 
                                  <?php echo $to_do_checklist['values']; ?>
                                 </label>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 late_icon"><a href="#"><i class="fa fa-clock-o"></i></a> <a href="#"><i class="fa fa-trash"></i></a> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-ellipsis-h"></i></a></div> </div>
                           <?php }
                          }
                           ?>
                        </div>



                        <div role="tabpanel" class="tab-pane fade" id="profile">
                         <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 add_b alag1">Calculate recommended costs based on your budget.</div>
                           <a href="#">
                              <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 add_b alag2">Add Budget</div>
                           </a>
                           <div class="clearfix"></div>
                           <h5 class="li_list">November 2017</h5>

                           <?php 
                           foreach($checklist_budget as $budget_checklist){
                           ?>
                           <div class="rowline not_done_budget" id="<?php echo $budget_checklist['id']; ?>">
                           <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 opt1 late">
                              <div class="checkbox">
                                  <label style="font-size: 1em; line-height: 35px;">
                                 <input type="checkbox" value="<?php echo $budget_checklist['id'];?>" name="check_value_id"  >
                                 <span class="cr"><i class="cr-icon fa fa-check"></i></span>                                 
                                  <?php echo $budget_checklist['values'];?>
                                 </label>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 late_icon">
                            <a href="#"><i class="fa fa-clock-o"></i></a>
                            <a href="#"  value="<?php echo $budget_checklist['id']; ?>" class="delete_checklist"><i class="fa fa-trash"></i></a>
                            <a href="#" data-toggle="modal" id="<?php echo $budget_checklist['id']; ?>"  class="note"   data-target="#myModal"><i class="fa fa-ellipsis-h"></i></a>
                          </div></div>
                           <?php }?>
                        </div>



                        <div role="tabpanel" class="tab-pane fade" id="messages">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 add_b alag1">Awesome job! You have 1 booked vendor.</div>
                          
                           <div class="clearfix"></div>
                           <h5 class="li_list">November 2017</h5>

                           <?php
                           foreach($checklist_my_vendor as $my_vendor_chekclist){
                            ?>
                             <div class="rowline" id="<?php echo $my_vendor_chekclist['id']; ?>">
                             <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 opt1 late">
                              <div class="checkbox">
                                 <label style="font-size: 1em; line-height: 35px;">
                                 <input type="checkbox" name="check_value_id" value="<?php echo $my_vendor_chekclist['id'];?>" >
                                 <span class="cr"><i class="cr-icon fa fa-check"></i></span>                                 
                                   <?php echo $my_vendor_chekclist['values'];?>
                                 </label>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 late_icon">
                            <a href="#"><i class="fa fa-clock-o"></i></a> 
                            <a href="#"  value="<?php echo $my_vendor_chekclist['id']; ?>" class="delete_checklist"><i class="fa fa-trash"></i></a>
                          <a href="#" data-toggle="modal" id="<?php echo $my_vendor_chekclist['id']; ?>"  class="note"   data-target="#myModal"><i class="fa fa-ellipsis-h"></i></a>
                           </div>
                        </div>
                            <?php }?>
                        </div>
                     </div>
                  </div>
                  <ul class="list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                     <li><button type="button" class="btn btn-default next-step">Next</button></li>
                     <li><button type="button" class="btn btn-primary ">Save</button></li>
                  </ul>
               </div>
            </div>


<script>

  var ckbox = $("input[name='check_value_id']");
  var chkId = '';
  var base_url = "<?php echo base_url(); ?>";
  var user_id = "<?php echo $user_id;?>";

  $("input[name='check_value_id']").on('click', function(e) {
        
    if (ckbox.is(':checked')) {
      $("input[name='check_value_id']:checked").each( function() {
        chkId = $(this).val() + ",";
        chkId = chkId.slice(0, -1);
      });
        $("#"+chkId).fadeOut(1500); 
        $.ajax({
          type:"POST",
          url:base_url+"checklist_task",
          dataType:"json",
          data:{id:chkId,user_id:user_id},
          cache:false,
          success:function(data) {

           }  
        });
    }else{

    }  
    e.preventDefault();
     // return false;   
  });

  $('#show_completed').change(function(){
        if (this.checked) {
            $('.done_task').fadeIn('slow');
            $('.not_done').fadeOut('slow');
        }
        else {
           $('.done_task').fadeOut('slow');
           $('.not_done').fadeIn('slow');
        }                   
    });

$(document).on('click', 'a', function () {
   var id = (this.id);
    $("#note_area").val('');
    $("#note_date_id").val('');
      $.ajax({
          type:"POST",
          url:base_url+"planning/check_noteExist",
          dataType:"json",
          data:{task_id:id},
          success:function (msg) {
           $("#note_area").val(msg.note);
           $("#note_date_id").val(msg.note_date);

          }  
        });

   $('#add_note_submit').submit(function(event) {

      var note = $("#note_area").val();
      var note_date = $("#note_date_id").val();

        $.ajax({
          type:"POST",
          url:base_url+"planning/add_note",
          dataType:"json",
          data:{note:note,task_id:id,note_date:note_date},
          success:function (data) {

          }  
        });
        event.preventDefault();
   });  

});


$(".delete_checklist").on('click',function(e){
    var id = $(this).attr('value');
    $.ajax({
          type:"POST",
          url:base_url+"planning/delete_note",
          dataType:"json",
          data:{id:id},
          success:function (data) {
            $('.not_done').fadeOut(2000);
           window.location.href = base_url+"front/user_checklist"; 
          }  
        });
}); 
</script>

