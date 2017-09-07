<form name="" method="post" action="<?php current_url()?>" data-parsley-validate="">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
        <div class="review">
            <h4><b> Add Review Request Email Template</b></h4> 
            <hr class="rule">
            <div class="div"></div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 no_pad">
                <div class="form-group">
                    <label for="usr">Template Name* :</label>
                    <input type="text" name="name" required="" value="<?php echo !empty($edit_data->name) ? $edit_data->name : ''?>" class="form-control" id="usr">
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <label class="checkbox-inline" style="padding-top:10px;"><input type="checkbox" name="is_default" value="1" <?php echo (!empty($edit_data->is_default) && ($edit_data->is_default == 1)) ? 'checked' : '' ?>>Make this email default</label>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 no_pad">
                <div class="form-group">
                    <label for="usr">From :</label>
                    <select class="form-control" id="sel1" name="from">
                        <option>danyeddydan@gmail.com</option>
                    </select>
                </div>                    
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 no_pad">
                <div class="form-group">                     
                    <input type="text" name="to_name" value="<?php echo !empty($edit_data->to_name) ? $edit_data->to_name : ''?>" class="form-control" id="usr">
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <p style="padding-top:5px;">[name],</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive">
                <table><tr><td><textarea class="mceEditor" rows="10" cols="80" name="content" ><?php echo !empty($edit_data->content) ? $edit_data->content : ''?></textarea></td></tr></table>
                <br/>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>Find me on:</p>
                <img src="<?php echo base_url(); ?>assets/front/images/logo.png">
                <p>Copyright © 2017 WeddingWire, Inc.</p>
                <p>Two Wisconsin Circle, 3rd Floor, Chevy Chase, MD 20815</p>
            </div>

            <div class="clearfix"></div>
            
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <label class="checkbox-inline" style="padding-top:10px;"><input type="checkbox" name="send_copy" value="1">Send me a copy</label>
            </div>

            <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:flex; justify-content:center">
                <button type="button" class="btn btn-default grrenpop">Cancel</button>
                <button type="submit" class="btn btn-default grrenpop">Save</button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        theme: "advanced",
        plugins: "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontfaqselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,

        //Open Manager Options
        file_browser_callback: "openmanager",
        open_manager_upload_path: '../../../../../uploads/',

        // Example content CSS (should be your site CSS)
        content_css: "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",

        // Style formats
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });

</script>