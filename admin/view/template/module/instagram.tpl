<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-featured" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-featured" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="instagram_status" id="input-status" class="form-control">
                                <?php if ($instagram_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-name"><?php echo $module_name_title; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram_module_name" value="<?php echo $module_name_title_value; ?>" placeholder="<?php echo $module_name_placeholder; ?>" id="input-name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-name"><?php echo $instagram_username; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram_username" value="<?php echo $instagram_username_value; ?>" placeholder="<?php echo $instagram_username_placeholder; ?>" id="input-name" class="form-control" required/>
                            <span>User should be public</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-name"><?php echo $limit_text; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram_limit" value="<?php echo $instagram_limit_value; ?>" placeholder="<?php echo $limit_text_placeholder; ?>" id="input-name" class="form-control" required/>
                            <span>Max 20 is allowed because of Instagram API limit</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-name"><?php echo $stylesheet; ?></label>
                        <div class="col-sm-10">
                            <textarea name="instagram_image_stylesheet" id="input-name" class="form-control"><?php echo $stylesheet_value; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-name"><?php echo $error_title; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram_error_title" value="<?php echo $error_title_value; ?>" placeholder="<?php echo $error_title_placeholder; ?>" id="input-name" class="form-control"/>
                            <span>Default message : User is private</span>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php echo $footer; ?>
