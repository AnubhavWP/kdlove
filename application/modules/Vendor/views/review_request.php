<style>
    .popover{
        top: 82px;
        right: 16px;
        display: block;
        left: 425px !important;
    }
</style>
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
    <div class="general">
        <div class="col-xs-8 col-sm-9 col-md-9 col-lg-9 text-left main"><h4><b>Review Request Email Templates</b></h4></div>
        <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 text-center"><a class="employee" href="<?php echo base_url('Vendor/Dashboard/addNewReveiwTemplate'); ?>">Add Email Template</a></div>
        <div class="div"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if (!empty($templates)) { ?>
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Created On</th>
                <th>Last Edited</th>
                </thead>
                <tbody>
                    <?php
                    $popcontent = "";
                        foreach ($templates as $template) {
                            if($template->is_default == 1){
                                $defelement = "&nbsp&nbsp&nbsp<span class='label label-success'>Default</span>";
                            }else{
                                $defelement = "";
                            }
                            
                            $popcontent = "<div class='btn-group'>
                                            <a class='btn btn-default' href=" . base_url('Vendor/Dashboard/addNewReveiwTemplate/' . $template->id) . ">Edit</a>
                                            <a class='btn btn-default' href=" . base_url('Vendor/Dashboard/DeleteRequestEmailTemplate/' . $template->id) . "><i class='fa fa-1x fa-trash-o' aria-hidden='true'></i></a>
                                            </div>";
                            ?>

                            <tr>
                                <td><?php echo!empty($template->name) ? $template->name : '' ?><?php echo $defelement; ?></td>
                                <td><?php echo!empty($template->created_at) ? date('Y-m-d', strtotime($template->created_at)) : '' ?></td>
                                <td><?php echo!empty($template->updated_at) ? date('Y-m-d', strtotime($template->updated_at)) : '' ?></td>
                                <td><a href="javascript:void(0)" data-html="true"  data-placement="left" data-toggle="popover" style="color:#20b1aa;" data-content="<?php echo $popcontent; ?>"><i class="fa fa-cog fa-2x"></i></a></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo '<div class="clearfix"></div>';
                echo '<p class = "alert-danger custom-padding">Record Not Found.</p>';
            }
            ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>