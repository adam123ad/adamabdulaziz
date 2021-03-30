<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>&nbsp;</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>
        <!-- data table -->

    </head>

    <body onload="window.print()">
    <div class="space"></div>
            <div class="row" style="padding-left: 5px;">
                <div class="col-lg-8">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/images/logo/poltek.jpg" style="width: 70px; height: 70px;" align="left"> 
                            <img src="<?php echo base_url(); ?>assets/images/logo/ukmb.jpeg" style="width: 110px; height: 70px;" align="right">
                            <p style="padding-left: 110px;">
                                <b style="font-size: 17px;">UNIT KEGIATAN MAHASISWA BAHASA (UKM-B)<br/>
                                    POLITEKNIK NEGERI PADANG</b><br/>
                                    <span style="font-size: 10px;">Kampus Politeknik Limau Manis Padang, Telp(0751) 72590 Fax.(0751)72576</span><br/>
                            </p> 
                                    ================================================================================================================
                            
                        <center>

                    <b><?= $title; ?></b>
                    <div class="space"></div>
                    </center>
                    </center>
                    <b style="font-size: 10px;"> <?= $subtitle; ?></b><br>
                     <table style="font-size: 10px;" id="tabel" class="table table-hover table-bordered table-striped table-Condensed">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Surat</th>
                                <th scope="col">Tanggal Surat</th>
                                <th scope="col">Alamat Tujuan Surat</th>
                                <th scope="col">Sifat</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Lampiran</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>  
                            <?php foreach ($dataFilterSK as $keluar) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $keluar['no_surat']; ?></td>
                                <td><?= $keluar['tgl_surat']; ?></td>
                                <td><?= $keluar['instansi']; ?></td>
                                <td><?= $keluar['sifat']; ?></td>
                                <td><?= $keluar['perihal']; ?></td>
                                <td><?= $keluar['lampiran']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                    </table><br/>
                     <span style="padding-right: 0%; padding-left: 80%">
                        Padang,  <?php echo date('d  M  Y'); ?>
                    </span>
                     <br/>
                    <span style="padding-right: 0%; padding-left: 80%">
                        Ketua UKM Bahasa,
                    </span>
                        <div class="space"></div>
                        <div class="space"></div>
                        <div class="space"></div>
                        <div class="space"></div>
                        <div class="space"></div>
                    <span style="padding-right: 0%; padding-left: 80%">
                        Eggy Pramata Putra<br/>
                    </span>
                    <span style="padding-top: 1%; padding-right: 0%; padding-left: 80%">
                        <b>NIM.1611042007</b>
                    </span>
                </div>
            </div>
           

        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min"></script>
        <script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.index.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script>

        <!-- ace scripts -->
        <script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabel1').DataTable();
            });

            /*$(document).ready(function(){
                $('#tabel1').DataTable();
            });*/
        </script>
        <!-- ajax untuk role_id dan menu_id pada views roleaccess, membuat checkbox bisa dihubungkan kedatabse -->
       
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>

    </body>
</html>
