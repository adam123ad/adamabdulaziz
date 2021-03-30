           
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


                        <div id="user-profile-1" class="user-profile row">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="col-xs-12 col-sm-3 center">
                                <div>
                                  <!-- Image -->
                                    <span class="profile-picture">
                                      <ul class="ace-thumbnails clearfix"> 
                                        <li>
                                          <a href="<?= base_url('assets/images/suratkeluar/').$detailSK['image']; ?>" title="<?= $detailSK['no_surat']; ?>" data-rel="colorbox">
                                          <img width="100%" height="100%" alt="150x150" src="<?= base_url('assets/images/suratkeluar/').$detailSK['image']; ?>" />
                                           <div class="text">
                                            <div class="inner">Lihat Gambar</div>
                                          </div>
                                          </a>
                                          <div class="tags">
                                            <span class="label-holder">
                                              <a href="<?= base_url('admin/downloadImageSK/').$getidSK['id']; ?>">
                                                <span class="label label-info">Download</span>
                                              </a>
                                            </span>
                                          </div>
                                        </li>
                                      </ul>
                                    </span>
                                    <!-- End Image -->
                                  
                                    <div class="space-4"></div>

                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                        <div class="inline position-relative">
                                            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                
                                                &nbsp;
                                                <span class="white"><b>last update :</b> <?= $detailSK['timestamp']; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-6"></div>
                                <div class="profile-contact-info">                                   
                                    <div class="space-6"></div>   
                                </div>
                                  <div class="hr hr12 dotted"></div>   
                                </div>

                           
                            <div class="col-xs-12 col-sm-6">
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Nomor Surat </div>

                                        <div class="profile-info-value">
                                            <span class="editable"><?= $detailSK['no_surat']; ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Tanggal Surat </div>

                                        <div class="profile-info-value">
                                            <span class="editable"><?= $detailSK['tgl_surat']; ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Perihal </div>

                                        <div class="profile-info-value">
                                            <span class="editable"><?= $detailSK['perihal']; ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Sifat </div>

                                        <div class="profile-info-value">
                                            <span class="editable"><?= $detailSK['sifat']; ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Lampiran </div>

                                        <div class="profile-info-value">
                                            <span class="editable"><?= $detailSK['lampiran']; ?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Alamat </div>

                                        <div class="profile-info-value">
                                            <span class="editable"><?= $detailSK['instansi']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <div class="space-20"></div>      
                            &nbsp;&nbsp;&nbsp;
                           
                            <a href="" class="btn btn-warning" style="margin-bottom: 15px;" data-toggle="modal" data-target="#editSuratKeluar<?= $getidSK['id']; ?>">Edit Data</a>&nbsp;&nbsp;&nbsp;
                            
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <!-- Edit Modal -->
            <?php foreach ($suratKeluar as $keluar) : ?>
             <div class="modal fade" id="editSuratKeluar<?= $keluar['id']; ?>" tabindex="-1" aria-labelledby="editSuratKeluarLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="editSuratKeluarLabel"><b>Edit Surat Keluar</b></h5>
                  </div>
                  <!-- form action -->
                  <?= form_open_multipart('admin/updateSuratkeluar'); ?>
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
                            <?php foreach ($instansi as $in) : ?> <!-- loopig ke tabel instansi -->
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

           