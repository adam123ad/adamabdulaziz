
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
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                               
                                <!--Content-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- pesan error diambil bari rule pada controller -->
                                         <?= form_error('instansi','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <!-- pesan success -->
                                       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                                        
                                        <table id="tabel1" class="table table-hover table-striped table-Condensed">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Instansi</th>
                                                <th scope="col">Action</th>    
                                            </tr>
                                            </thead>
                                            <?php $i = 1; ?>  
                                            <?php foreach ($instansi as $in) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $in['instansi']; ?></td>
                                                <td>
                                              
                                                <a data-toggle="modal" data-target="#editInstansi<?= $in['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="deleteinstansi/<?= $in['id']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                               </td>

                                            </tr>
                                        <?php endforeach; ?>
                                        </table><br/>
                                        <a href="" class="btn btn-success fa fa-plus" style="margin-bottom: 15px;" data-toggle="modal" data-target="#tambahInstansi"> Tambah Instansi Baru</a>
                                    </div>
                                </div>
                               <!-- /.col -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <!-- Modal -->
            <div class="modal fade" id="tambahInstansi" tabindex="-1" aria-labelledby="tambahInstansiLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="tambahInstansiLabel">Tambah Instansi Baru</h5>
                  </div>
                  <!-- form action -->
                  <form method="post" action="<?= base_url('admin/instansi') ?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Nama Instansi
                            </span>
                            <input type="text" class="form-control" id="instansi" name="instansi">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fa fa-close" data-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary fa fa-plus"> Tambah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Edit -->
            <?php foreach ($instansi as $in) : ?>
            <div class="modal fade" id="editInstansi<?= $in['id']; ?>" tabindex="-1" aria-labelledby="editInstansiLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="editInstansiLabel">Edit Instansi</h5>
                  </div>
                  <!-- form action -->
                  <form method="post" action="<?= base_url('admin/updateinstansi') ?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" class="form-control" readonly value="<?= $in['id']; ?>" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Nama Instansi
                            </span>
                            <input type="text" class="form-control" value="<?= $in['instansi']; ?>" id="instansi" name="instansi">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fa fa-close" data-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary fa fa-save"> Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <?php endforeach; ?>