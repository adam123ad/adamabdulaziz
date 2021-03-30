
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
                        <div class="page-header">
                            <h1>
                                <?= $title; ?>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                               
                                <!--Content-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- pesan error diambil bari rule pada controller menu -->
                                         <?= form_error('title','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <?= form_error('menu_id','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <?= form_error('url','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <?= form_error('icon','<div class="alert alert-danger" role="alert">', '</div>'); ?>

                                         <!-- pesan success -->
                                        <?php echo $this->session->flashdata('message');?>
                                        
                                        <a href="" class="btn btn-primary" style="margin-bottom: 15px;" data-toggle="modal" data-target="#tambahSubMenu">Tambah SubMenu Baru</a>
                                        
                                        <table id="tabel1" class="table table-bordered table-hover table-striped table-Condensed">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Url</th>
                                                <th scope="col">Icon</th>
                                                <th scope="col">Active</th>
                                                <th scope="col">Action</th>    
                                            </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($subMenu as $sm) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $sm['title']; ?></td>
                                                <td><?= $sm['menu']; ?></td>
                                                <td><?= $sm['url']; ?></td>
                                                <td><?= $sm['icon']; ?></td>
                                                <td><?= $sm['is_active']; ?></td>
                                                <td>
                                                <a data-toggle="modal" data-target="#editSubMenu<?= $sm['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="deleteSubmenu/<?= $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ??')">Hapus</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                               <!-- /.col -->


                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <!-- Tambah Modal -->
            <div class="modal fade" id="tambahSubMenu" tabindex="-1" aria-labelledby="tambahSubMenuLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="tambahSubMenuLabel">Tambah Submenu Baru</h5>
                  </div>
                  <!-- form action -->
                  <form method="post" action="<?= base_url('menu/submenu') ?>" class="form-horizontal" role=>
                  <div class="modal-body">

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Title
                            </span>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Menu User
                            </span>
                            <select name="menu_id" required id="menu_id" class="form-control">
                                <option value="">- -Pilih Menu- -</option>
                                <?php foreach ($menu as $m) : ?> <!-- loopig ke tabel user_menu -->
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Url
                            </span>
                            <input type="text" class="form-control" id="url" name="url">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Icon
                            </span>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="menu-icon fa fa-youtube">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input class="ace ace-checkbox-2" id="is_active" name="is_active" value="1" checked type="checkbox" />
                                <span class="lbl" for="is_active"> Active</span>
                            </label>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Edit Modal -->
            <?php foreach ($subMenu as $sm) : ?>
             <div class="modal fade" id="editSubMenu<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="editSubMenuLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="editSubMenuLabel">Tambah Submenu Baru</h5>
                  </div>
                  <!-- form action -->
                  <form method="post" action="<?= base_url('menu/updatesubmenu') ?>" class="form-horizontal" >
                  <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" value="<?= $sm['id']; ?>" readonly class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Title
                            </span>
                            <input type="text" value="<?= $sm['title']; ?>" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Menu User
                            </span>
                            <select name="menu_id" required id="menu_id" class="form-control">
                                <option value="">- -Pilih Menu- -</option>
                                <?php foreach ($menu as $m) : ?> <!-- loopig ke tabel user_menu -->
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Url
                            </span>
                            <input type="text" value="<?= $sm['url']; ?>" class="form-control" id="url" name="url">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                Icon
                            </span>
                            <input type="text" class="form-control" value="<?= $sm['icon']; ?>" id="icon" name="icon" placeholder="menu-icon fa fa-youtube">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input class="ace ace-checkbox-2" id="is_active" name="is_active" value="1" checked type="checkbox" />
                                <span class="lbl" for="is_active"> Active</span>
                            </label>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <?php endforeach; ?>