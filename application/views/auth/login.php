<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets2/vendor/fontawesome-free/css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets2/vendor/fontawesome-free/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/css/sb-admin-2.css" rel="stylesheet">

    <style type="text/css">
        #eyebutton {
            position: relative;
            z-index: 1;
            left: 90%;
            top: -35px;
            cursor: pointer;

        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                    UKM Bahasa Poltek Padang<br/></h1>  
                                    </div>
                                    <!-- pesan success -->
                                    
                                    <?php echo $this->session->flashdata('message');?>
                                    
                                    <form method="post" class="user" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email Address...">
                                                <!-- pesan error untuk field email -->
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                                <span id="eyebutton" onclick="change()"><i class="fa fa-eye"></i></span>
                                                <!--pesan error untuk field password -->
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets2/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets2/js/sb-admin-2.min.js"></script>

     <script type="text/javascript">
        //SHOW HIDE
       function change(){
        var x = document.getElementById('password').type;

         if (x == 'password') {
            document.getElementById('password').type = 'text';
            document.getElementById('eyebutton').innerHTML = '<i class="fa fa-eye-slash"></i>';
         }else{
            document.getElementById('password').type = 'password';
            document.getElementById('eyebutton').innerHTML = '<i class="fa fa-eye"></i>';
         }
       }
    </script>

</body>
</html>