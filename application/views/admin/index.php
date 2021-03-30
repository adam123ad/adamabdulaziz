
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
                    <div class="flashdata-login" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
                                <?= $title; ?>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="alert alert-block alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>

                                    <i class="ace-icon fa fa-check green"></i>

                                    Welcome to
                                    <strong class="green">
                                        UKM Bahasa 
                                        <small>(v1.4)</small>
                                    </strong>,
                                         Administrator
                                </div>
                                <!--Content-->
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-calendar fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-right">
                                                            <div class="huge">Tahun</div>
                                                            <font class="count" size="7px" style=""><b><center><?= date('Y'); ?></center></b></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Tahun</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-building fa-5x"></i>
                                                        </div> 
                                                        <div class="col-xs-9 text-right">
                                                            <div class="huge">Instansi</div>
                                                            <font class="count" size="7px" style=""><b><center><?= $countInstansi; ?></center></b></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('admin/instansi'); ?>">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Instansi</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                     <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-sign-in fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-right">
                                                            <div class="huge">Surat Masuk</div>
                                                            <font class="count" size="7px" style=""><b><center><?= $countSuratMasuk; ?></center></b></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('admin/suratMasuk'); ?>">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Surat Masuk</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <i class="fa fa-sign-out fa-5x"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-right">
                                                            <div class="huge">Surat Keluar</div>
                                                            <font class="count" size="7px" style=""><b><center><?= $countSuratKeluar; ?></center></b></font>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('admin/suratKeluar');      ?>">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Surat Keluar</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                   
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

           