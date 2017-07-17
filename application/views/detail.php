<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seniman Mengajar</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo HTTP_VENDOR_PATH;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style> 
        .wrap {
            word-wrap: break-word;
            word-break: break-all;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            hyphens: auto;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Seniman Mengajar</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="<?php echo base_url().'Peserta/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </ul>
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?php echo base_url().'Peserta/detail'?>"><i class="fa fa-dashboard fa-fw"></i> Profil</a>
                        </li>

                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php if($this->session->flashdata('status')=="success"){ ?>
                <h3><?php echo $this->session->flashdata('message'); ?></h3>
                <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <h3><?php echo $this->session->flashdata('message'); ?></h3>
                <?php } ?>
            </div>
            <div class="row" >
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $this->session->userdata('nama_seniman'); ?>
                        </div>
                        <div class="panel-body">
                            <div class ="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default text-center">
                                        <div class ="panel-heading ">
                                            <?php if ($profpict !== NULL){
                                                        ?><img height="160" width="160" class="img-responsive center-block" src="<?php echo base_url().$profpict;?>"><br>
                                                        <a href="#updateprofpict" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a><?php
                                                        }else {
                                                            ?> <img height="160" width="160" class="img-responsive center-block" src="<?php echo HTTP_IMAGES_PATH;?>default.png"><br><br>
                                                             <a href="#addprofpict" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                                }?>

                                            
                                        </div>
                                        <div class="panel-body" >
                                            <div class="row-lg-6">
                                                <div class="col-lg-6" >
                                                    
                                                        <label class="label label-info">Email            :</label><br><label c><?php echo $this->session->userdata('email');?></label><br><br>
                                                        <label class="label label-info">Alamat   :</label><br><label ><?php echo $this->session->userdata('alamat');?></label><br><br>
                                                        <label class="label label-info">Kota   :</label><br><label ><?php echo $this->session->userdata('kota');?></label><br><br>
                                                        <label class="label label-info">Provinsi   :</label><br><label ><?php echo $this->session->userdata('provinsi');?></label><br><br>
                                                </div>
                                                <div class="col-lg-6 wrap">
                                                    <label class="label label-info">Nomor Telepon:</label><br><label><?php echo $this->session->userdata('no_telpon');?></label><br><br>
                                                    <label class="label label-info">Daerah Pilihan:</label><br><label><?php echo $this->session->userdata('region');?></label><br><br>
                                                    <label class="label label-info">bidang Seni Pilihan   :</label><br><label ><?php echo $this->session->userdata('jenis_seni');?></label><br><br>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row untuk menampilkan surat keterangan sehat, surat rekomendasi sekolah dan surat persetujuan orang tua -->
                            <div class="row">                                
                                <div class="col-md-3">
                                    <div class="panel panel-default text-center">
                                            <!-- panel untuk surat keterangan sehat -->
                                            <div class="panel-heading">
                                                <strong>Surat Keterangan Sehat</strong>
                                            </div>
                                            <div class="panel-body">
                                                <?php if ($sks !== NULL){
                                                        ?><a class="img-responsive center-block" href="<?php echo base_url().$sks;?>">Surat Keterangan Sehat</a><br>
                                                        <a href="#updatesks" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a><?php
                                                        }else {
                                                            ?> <span class="label label-default">Belum Tersedia</span><br><br>
                                                             <a href="#addsks" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                                }?>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default text-center">
                                        <div class="panel-heading">
                                            <strong>Motivation Letter</strong>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($essai !== NULL){
                                            ?><a class="img-responsive center-block" href="<?php echo base_url().$essai;?>">Motivation Letter</a><br>
                                            <a href="#updateessai" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a><?php
                                            }else {
                                                ?> <span class="label label-default">Belum Tersedia</span><br><br>
                                                <a href="#addessai" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                            }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default text-center">
                                        <div class="panel-heading">
                                            <strong>KTP</strong>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($ktp !== NULL){
                                            ?><a class="img-responsive center-block" href="<?php echo base_url().$ktp;?>">KTP</a><br>
                                            <a href="#updatektp" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a><?php
                                            }else {
                                                ?> <span class="label label-default">Belum Tersedia</span><br><br>
                                                <a href="#addktp" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                            }?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-default text-center">
                                        <div class="panel-heading">
                                            <strong>Daftar Riwayat Hidup</strong>
                                        </div>
                                        <div class="panel-body">
                                            <?php if ($drh !== NULL){
                                            ?><a class="img-responsive center-block" href="<?php echo base_url().$ktp;?>">Daftar Riwayat Hidup</a><br>
                                            <a href="#updatedrh" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a><?php
                                            }else {
                                                ?> <span class="label label-default">Belum Tersedia</span><br><br>
                                                <a href="#adddrh" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="panel panel-default text-center">
                                    <!-- panel untuk foto karya -->
                                     <div class="panel-heading">
                                        <strong>Foto Karya</strong>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-inline">
                                        <?php if ($fk['row'] !== 0){
                                                    
                                            $icount=$fk['row'];
                                            for ($i=0; $i < $icount ; $i++) { 
                                            ?>
                                                <li><img height="160" width="160" class="img-responsive" src="<?php echo base_url().$fk[$i]['path_foto'];?>"></li>
                                                <?php
                                                }?></ul>
                                                <!-- <img class="img-responsive" src="<?php echo base_url().$piagam;?>"> --><br>
                                                <a href="#updatefk" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a>
                                                 <a href="#addfk" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                                        }else {
                                                            ?> <span class="label label-default">Belum Tersedia</span><br><br>
                                                             <a href="#addfk" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                                }?>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="panel panel-default text-center">
                                            <!-- panel untuk sertifikat atau penghargaan -->
                                            <div class="panel-heading">
                                                <strong>Video Karya</strong>
                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-inline">
                                                <?php if ($video['row'] !== 0){
                                                    
                                                    $icount=$video['row'];
                                                    for ($i=0; $i < $icount ; $i++) { 
                                                        ?>
                                                                <li>
                                                                    <video width="100%" height="auto" controls>
                                                                        <source src="<?php echo base_url().$video[$i]['path_video'];?>" type='video/mp4'>
                                                                        <source src="<?php echo base_url().$video[$i]['path_video'];?>" type='video/avi'>
                                                                    </video>

                                                                </li>
                                                          <?php
                                                    }?></ul>
                                                        <br>
                                                        <a href="#updatevideo" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Update</a>
                                                        <a href="#addvideo" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                                        }else {
                                                            ?> <span class="label label-default">Belum Tersedia</span><br><br>
                                                             <a href="#addvideo" class="portfolio-link btn btn-success btn-default" data-toggle="modal">Tambah</a><?php
                                                }?>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- modal tambah surat keterangan sehat -->
    <div class="modal fade" id="addsks" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Surat Keterangan Sehat</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload surat keterangan sehat Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="sks">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal update surat Keterangan Sehat -->
    <div class="modal fade" id="updatesks" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Surat Keterangan Sehat</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload surat keterangan sehat Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="sks">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

<!-- modal tambah KTP -->
    <div class="modal fade" id="addktp" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">KTP</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload hasil scan KTP Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="ktp">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal update KTP -->
    <div class="modal fade" id="updatektp" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">KTP</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload hasil scan KTP Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="ktp">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>


    <!-- modal tambah drh -->
    <div class="modal fade" id="adddrh" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Daftar Riwayat Hidup</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload Daftar Riwayat Hidup Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="drh">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal update Daftar riwayat hidup -->
    <div class="modal fade" id="updatedrh" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Daftar Riwayat Hidup</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload Daftar Riwayat Hidup Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="drh">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    
    <!-- modal tambah fk -->
    <div class="modal fade" id="addfk" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Foto Karya</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload foto karya Anda. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addfk'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            
                            <input type="hidden" class ="form-control"  id="fkrow" name="fkrow" value="<?php echo $fk['row']?>"  >
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>


    <!-- modal update fk -->
    <div class="modal fade" id="updatefk" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Foto Karya</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan pilih gambar mana yang akan diupdate dan upload foto karya Anda yang baru. file upload dapat berupa file PDF, image (.jpg) atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addfk'); ?>" method="post">
                        <div class="form-group text-center">
                            <ul class="list-inline">
                                <?php
                                    $icount=$fk['row'];
                                    for ($i=0; $i < $icount ; $i++) { 
                                        ?>
                                        <li><img height="160" width="160" class="img-responsive" src="<?php echo base_url().$fk[$i]['path_foto'];?>"><input  type="radio" id="fkrow" name="fkrow" value="<?php echo $i;?>" ></li>
                                        
                                        <?php
                                    }
                                ?>
                            </ul>
                                
                        </div>  
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="sks">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal tambah gambar profile-->
    <div class="modal fade" id="addprofpict" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gambar Profile</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload gambar profile Anda. file upload dapat berupa file image (.jpg)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="profpict">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal update gambar profile-->
    <div class="modal fade" id="updateprofpict" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gambar Profile</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload gambar profile Anda. file upload dapat berupa file image (.jpg)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="profpict">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal essai -->
    <div class="modal fade" id="addessai" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">motivation Letter</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload paparan mengenai motivasi Anda mengikuti kegiatan Seniman mengajar. file upload dapat berupa file PDF atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="essai">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>

    <!-- modal update essai siswa -->
    <div class="modal fade" id="updateessai" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Essai Siswa</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload paparan mengenai motivasi Anda mengikuti kegiatan Seniman mengajar. file upload dapat berupa file PDF atau Ms.Word (.doc, .docx)</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addsurat'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="essai">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>


    <!-- modal tambah video -->
    <!-- modal tambah video -->
    <div class="modal fade" id="addvideo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">video Karya</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan upload video karya Anda. file upload dapat berupa file MP4, MKV atau AVI</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addvideo'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            
                            <input type="hidden" class ="form-control"  id="videorow" name="videorow" value="<?php echo $video['row']?>"  >
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>


    <!-- modal update video -->
    <div class="modal fade" id="updatevideo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">video Karya</h4>
                </div>
                <div class="modal-body">
                  <div class="row-md-8">
                    <p>Silakan pilih video mana yang akan diupdate dan upload video karya Anda yang baru. file upload dapat berupa file MP4, MKV atau AVI</p>
                  </div>
                  <div class="row-md-4">
                    <form name="update" id="updateform" enctype="multipart/form-data" action ="<?=site_url('Peserta/addvideo'); ?>" method="post">
                        <div class="form-group text-center">
                            <ul class="list-inline">
                                <?php
                                    $icount=$video['row'];
                                    for ($i=0; $i < $icount ; $i++) { 
                                        ?>
                                        <li><img height="160" width="160" class="img-responsive" src="<?php echo base_url().$video[$i]['path_video'];?>"><input  type="radio" id="videorow" name="videorow" value="<?php echo $i;?>" ></li>
                                        
                                        <?php
                                    }
                                ?>
                            </ul>
                                
                        </div>  
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="userfile">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="sks">
                            <input type="hidden" name="update" value="update">
                        </div>
                        <button type="submit" name ="submit" value="submit" class="btn btn-xl">Upload</button>
                    </form>
                  </div> 
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo HTTP_JS_PATH; ?>sb-admin-2.js"></script>
    

    

</body>

</html>
