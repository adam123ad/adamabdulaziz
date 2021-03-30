
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
                                         <?= form_error('instansi','<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                         <!-- pesan success -->
                                         <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                                        <a href="" class="btn btn-success fa fa-plus" style="margin-bottom: 15px;" data-toggle="modal" data-target="#tambahSuratKeluar"> Tambah Data</a> &nbsp;&nbsp;&nbsp;
                                        <a href="" class="btn btn-primary fa fa-print" style="margin-bottom: 15px;" data-toggle="modal" data-target="#cetakSuratKeluar"> Cetak</a>                       

                                        <table id="tabel1" class="table table-hover table-striped table-Condensed">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">No Surat</th>
                                                <th scope="col">Tanggal Surat</th>
                                                <th scope="col">Alamat Tujuan Surat</th>
                                                <th scope="col">Sifat</th>
                                                <th scope="col">Perihal</th>
                                                <th scope="col">Lampiran</th>
                                              <!--  <th scope="col">Image</th> -->
                                                <th scope="col">Action</th>

                                            </tr>
                                            </thead>
                                            <?php $i = 1; ?>  
                                            <?php foreach ($suratKeluar as $keluar) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $keluar['no_surat']; ?></td>
                                                <td><?= $keluar['tgl_surat']; ?></td>
                                                <td><?= $keluar['instansi']; ?></td>
                                                <td><?= $keluar['sifat']; ?></td>
                                                <td><?= $keluar['perihal']; ?></td>
                                                <td><?= $keluar['lampiran']; ?></td>
                                                <!-- <td><img src="<?php echo base_url() . './assets/images/file/' .$keluar['image']; ?>" width="100"></td> -->
                                                <td>
                                                <a href="<?= base_url(); ?>admin/detailSuratKeluar/<?= $keluar['id']; ?>" class="badge badge-primary">Detail</a>
                                                <a data-toggle="modal" data-target="#editSuratKeluar<?= $keluar['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="deleteSuratKeluar/<?= $keluar['id']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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

            <div class="modal fade" id="tambahSuratKeluar" tabindex="-1" aria-labelledby="tambahSuratKeluarLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h3 class="modal-title" id="tambahSuratKeluarLabel"><b>Tambah Surat Keluar</b></h5>
                    </div>
                    <!-- form action -->
                    <?= form_open_multipart('admin/suratKeluar'); ?>
                    <div class="modal-body">

                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Nomor Surat</label>
                        <div class="col-sm-9">
                          <input type="text" required class="form-control" id="no_surat" name="no_surat">
                        </div>
                      </div>
                      <br/>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-4">
                          <input type="date" required class="form-control" id="tgl_surat" name="tgl_surat">
                        </div>
                      </div>
                      <br/>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Perihal</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" required id="perihal" name="perihal" style="height: 70px" ></textarea>
                        </div>
                      </div>
                      <br/>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Sifat</label>
                        <div class="col-sm-9">
                          <input type="text" required class="form-control" id="sifat" name="sifat">
                        </div>
                      </div>
                      <br/>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Lampiran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lampiran" name="lampiran">
                        </div>
                      </div>
                      <br/>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Alamat Tujuan Surat</label>
                        <div class="col-sm-9">
                            <select class="form-control" required id="instansi_id" name="instansi_id" >
                              <option value="">-- Pilih Instansi --</option>
                              <?php foreach ($instansi as $in) : ?> <!-- loopig ke tabel user_menu -->
                                <option value="<?= $in['id']; ?> "><?= $in['id']; ?> <?= $in['instansi']; ?> </option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <br/>
                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">File/Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="image" name="image">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary fa fa-close" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary fa fa-plus">Tambah</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <?php foreach ($suratKeluar as $keluar) : ?>
             <div class="modal fade" id="editSuratKeluar<?= $keluar['id']; ?>" tabindex="-1" aria-labelledby="editSuratKeluarLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="editSuratKeluarLabel"><b>Edit Surat Keluar</b></h5>
                  </div>
                  <!-- form action -->
                  <?= form_open_multipart('admin/updateSuratKeluar'); ?>
                  <div class="modal-body">

                    <div class="mb-3 row">
                      <div class="col-sm-3">
                        <input type="hidden" readonly class="form-control" value="<?= $keluar['id']; ?>" id="id" name="id">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Nomor Surat</label>
                      <div class="col-sm-9">
                        <input type="text" required class="form-control" value="<?= $keluar['no_surat']; ?>" id="no_surat" name="no_surat">
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Tanggal Surat</label>
                      <div class="col-sm-4">
                        <input type="date" required class="form-control" value="<?= $keluar['tgl_surat']; ?>" id="tgl_surat" name="tgl_surat">
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Perihal</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" required id="perihal" name="perihal" style="height: 70px" ><?= $keluar['perihal']; ?></textarea>
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Sifat</label>
                      <div class="col-sm-9">
                        <input type="text" required class="form-control" value="<?= $keluar['sifat']; ?>" id="sifat" name="sifat">
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Lampiran</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?= $keluar['lampiran']; ?>" id="lampiran" name="lampiran">
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Alamat Tujuan Surat</label>
                      <div class="col-sm-9">
                          <select class="form-control" required id="instansi_id" name="instansi_id" >
                            <option value="">-- Pilih Instansi --</option>
                            <?php foreach ($instansi as $in) : ?> <!-- loopig ke tabel user_menu -->
                              <option value="<?= $in['id']; ?>"> <?= $in['instansi']; ?> </option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    </div>
                    <br/>
                     <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">File/Image</label>
                      <div class="col-sm-3">
                          <img src="<?= base_url('assets/images/suratkeluar/') . $keluar['image']; ?>" class="img-thumbnail">
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


            <!-- Cetak Laporan -->
            <div class="modal fade" id="cetakSuratKeluar" tabindex="-1" aria-labelledby="cetakSuratKeluarLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="cetakSuratKeluarLabel"><b>Cetak Surat Masuk</b></h5>
                  </div>
                  <!-- form action -->
                  <?= form_open_multipart('laporan/cetakSuratKeluar'); ?>
                  <div class="modal-body">
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Tahun</label>
                      <div class="col-sm-4">
                          <select class="form-control" required id="tahun1" name="tahun1" >
                            <option value="">-- Pilih Tahun --</option>
                            <?php foreach ($getTahunSK as $tahun) : ?> <!-- loopig ke tabel user_menu -->
                              <option value="<?= $tahun['tahun']; ?>"> <?= $tahun['tahun']; ?> </option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    </div>
                    <br/>
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Dari Bulan</label>
                      <div class="col-sm-9">
                          <select class="form-control" required id="bulanawal" name="bulanawal" >
                            <option value="">-- Pilih Bulan --</option>                           
                              <option value="1">Januari</option>
                              <option value="2">Ferbruari</option>
                              <option value="3">Maret</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Agustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                          </select>
                      </div>
                    </div>
                    <br/>  
                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label">Sampai Bulan</label>
                      <div class="col-sm-9">
                          <select class="form-control" required id="bulanakhir" name="bulanakhir" >
                            <option value="">-- Pilih Bulan --</option>                           
                              <option value="1">Januari</option>
                              <option value="2">Ferbruari</option>
                              <option value="3">Maret</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Agustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                          </select>
                      </div>
                    </div>
                    <br/>        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fa fa-close" data-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary fa fa-print"> Cetak</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>