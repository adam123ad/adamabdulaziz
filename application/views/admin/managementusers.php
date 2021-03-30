
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
                                    <div class="col-lg-12">
                                        <!-- pesan error diambil bari rule pada controller -->
                                         <?= form_error('name','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <!-- pesan success -->
                                         <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                                        <!-- tombol tambah
                                        <a href="" class="btn btn-success fa fa-plus" style="margin-bottom: 15px;" data-toggle="modal" data-target="#tambahUsers"> Tambah Data</a> &nbsp;&nbsp;&nbsp;                 
                                        -->
                                        <table id="tabel1" class="table table-hover table-striped table-Condensed">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">foto</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Is_Active</th>
                                              <!--  <th scope="col">Image</th> -->
                                                <th scope="col">Action</th>

                                            </tr>
                                            </thead>
                                            <?php $i = 1; ?>  
                                            <?php foreach ($users as $u) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><img src="<?php echo base_url() . './assets/images/profile/' .$u['image']; ?>" alt="Cinque Terre" class="img-circle" width="50"></td>
                                                <td><?= $u['name']; ?></td>
                                                <td><?= $u['email']; ?></td>
                                                <td><?= $u['role']; ?></td>
                                                <td> 
                                                  <div class="form-check">
                                                    <div class="checkbox">                                      
                                                      <input class="form-check-input" type="checkbox" checked="<?= $u['is_active'] ?>" >
                                                    </div>
                                                </div>
                                                </td>
                                                <td>
                                                <a data-toggle="modal" data-target="#editUsers<?= $u['id']; ?>" class="badge badge-warning">Edit</a>
                                                <!--<a href="deleteUsers/<?= $u['id']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>-->
                                               </td>

                                            </tr>
                                        <?php endforeach; ?>
                                        </table><br/>
                                    </div>
                                </div>
                               <!-- /.col -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <!-- Modal tambah -->
            <div class="modal fade" id="tambahUsers" tabindex="-1" aria-labelledby="tambahUsersLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="tambahUsersLabel"><b>Tambah Users</b></h5>
                  </div>
                  <!-- form action -->
                  <?= form_open_multipart('admin/manageUsers'); ?>
                  <div class="modal-body">

                    <div class="mb-3 row">
                      <div class="col-sm-12">
                        <input type="text" placeholder="Full Name" required class="form-control" value="<?= set_value('name'); ?>" id="name" name="name">
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <div class="col-sm-12">
                        <input type="email" required placeholder="Email Address" class="form-control" value="<?= set_value('email'); ?>" id="email" name="email">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <br/>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user"
                                id="password1" name="password1" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user"
                                id="passowrd2" name="password2" placeholder="Repeat Password">
                        </div>
                    </div>
                    <br/>
                    <div class="small">
                      *Passwod minimal 8 karakter
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

          <!-- modal edit -->
          <?php foreach ($users as $u) : ?>
             <div class="modal fade" id="editUsers<?= $u['id']; ?>" tabindex="-1" aria-labelledby="editUsersLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="editUsersLabel"><b>Edit User</b></h5>
                  </div>
                  <!-- form action -->
                  <?= form_open_multipart('admin/updateUsers'); ?>
                  <div class="modal-body">

                    <div class="mb-3 row">
                      <div class="col-sm-3">
                        <input type="hidden" readonly class="form-control" value="<?= $u['id']; ?>" id="id" name="id">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" required class="form-control" value="<?= $u['name']; ?>" id="name" name="name">
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" required class="form-control" readonly value="<?= $u['email']; ?>" id="email" name="email">
                      </div>
                    </div> 
                    <br/>
                     <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Foto</label>
                      <div class="col-sm-3">
                          <img src="<?= base_url('assets/images/profile/') . $u['image']; ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-6">
                          <input type="file" id="image" name="image">
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