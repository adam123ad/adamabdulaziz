
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
                                    <div class="col-lg-6">
                                        <!-- pesan error diambil bari rule pada controller menu -->
                                         <?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <!-- pesan success -->
                                        <?php echo $this->session->flashdata('message');?>
                                        
                                        <a href="" class="btn btn-primary" style="margin-bottom: 15px;" data-toggle="modal" data-target="#tambahMenu">Tambah Menu Baru</a>
                                        
                                        <table id="tabel1" class="table table-hover table-striped table-Condensed">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Action</th>    
                                            </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($menu as $m) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $m['menu']; ?></td>
                                                <td>
                                                <a data-toggle="modal" data-target="#editMenu<?= $m['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="menu/delete/<?= $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ??')">Hapus</a>
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

            <!-- Modal -->
            <div class="modal fade" id="tambahMenu" tabindex="-1" aria-labelledby="tambahMenuLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="tambahMenuLabel">Tambah Menu Baru</h5>
                  </div>
                  <!-- form action -->
                  <form method="post" action="<?= base_url('menu') ?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu..">
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

            <!-- Modal Edit -->
            <?php foreach($menu as $m) : ?>
            <div class="modal fade" id="editMenu<?= $m['id']; ?>" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="editMenuLabel">Edit Menu</h5>
                  </div>
                  <!-- form action -->
                  <form method="post" action="<?= base_url('menu/update'); ?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?= $m['id']; ?>" id="id" name="id" readonly hidden >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $m['menu']; ?>" id="menu" name="menu" placeholder="Nama Menu..">
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

           