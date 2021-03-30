
        <!--header , topbar, sidebar-->
 
        

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active"><?= $title; ?></li>
                        </ul><!-- /.breadcrumb -->   
                    </div>
                    <div class="currentPass" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="succes-change-pass" data-flashdata="<?= $this->session->flashdata('message1'); ?>"></div>
                    <div class="page-content">
                        <div class="ace-settings-container" id="ace-settings-container">
                          <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                            <i class="ace-icon fa fa-cog bigger-130"></i>
                          </div>
                          <div class="ace-settings-box clearfix" id="ace-settings-box">
                            <div class="pull-left width-50">
                              <div class="ace-settings-item">
                                <div class="pull-left">
                                  <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                  </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                              </div>
                              <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                  Inside
                                  <b>.container</b>
                                </label>
                              </div>
                            </div><!-- /.pull-left -->     
                          </div><!-- /.ace-settings-box -->
                      </div><!-- /.ace-settings-container -->
                         <div class="page-header">
                            <h1>
                                <div class="search-filter-header bg-primary">
                                  <h5 class="smaller no-margin-bottom no-margin-top" style="font-size: 20px">
                                    <i class="ace-icon fa fa-sliders light-green bigger-130"></i>&nbsp; <?= $title; ?>
                                  </h5>
                                </div>  
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <i class="ace-icon fa fa-key blue"></i>&nbsp;
                                        <h4 class="widget-title">Form Change Password</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <form action="<?= base_url('admin/changepassword'); ?>" method="post">
                                                    <div class="col-mb-6">
                                                        <label for="current_password" class="form-label">Current Password</label>
                                                        <input type="password" class="form-control" id="current_password" name="current_password">
                                                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <div class="space"></div>
                                                    <div class="col-mb-6">
                                                        <label for="new_password1" class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                        
                                                    </div>
                                                    <div class="space"></div>
                                                    <div class="col-mb-6">
                                                        <label for="new_password2" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                                                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <div class="space"></div>
                                                    <button type="submit" class="btn btn-primary fa fa-plus"> Tambah</button>&nbsp;&nbsp;&nbsp;
                                                    <button type="reset" class="btn btn-secondary fa fa-close" data-dismiss="modal"> Reset</button> 
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                   
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

           