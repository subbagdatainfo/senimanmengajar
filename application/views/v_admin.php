        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count;?></div>
                                    <div>Jumlah Pendaftar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <?php if($this->session->flashdata('status')=="success"){ ?>
                <h3><?php echo $this->session->flashdata('message'); ?></h3>
                <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <h3><?php echo $this->session->flashdata('message'); ?></h3>
                <?php } ?>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div>
                        <form  action ="<?=site_url('C_Admin/searchpeserta'); ?>" method="post">
                            <input type="search" class='autocomplete nama' id="autocomplete1" name="nama"/>
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div> -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Daftar Pendaftar
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table class="table ">
                            <tr>
                                <th>#</th>
                                <th>
                                    Email
                                    <input type="text" id="email_address">
                                    <span id ="search_email" onclick="searchEmail" lass="btn btn-xl fa fa-times"></span>
                                </th>
                                <th>Nama</th>
                                <th>Nomor Kontak</th>
                                <th>Daerah Pilihan</th>
                                
                                <th>Download</th>
                                <th>Action</th>
                                
                            </tr>
                            <?php $nom=($page-1) * 25;foreach ($peserta as $row) {
                                $nom++;
                                $email = $row->email;
                                ?><tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->nama_seniman;?></td>
                                    <td><?php echo $row->no_telpon;?></td>
                                    <td><?php echo $row->lokasi;?></td>
                                    
                                    <td>
                                        <a href="<?php echo site_url( $row->path_upload) ;?>"><i class="fa fa-download" style="font-size:24px"></i></a>
                                    </td>
                                    <td>
                                        <span id="change_provinsi" onclick="del_data('<?php echo $row->email;?>','<?php echo $row->nama_seniman;?>');" class="btn btn-xl fa fa-times"></span><br>
                                    </td>
                                </tr>
                                <?php
                            }?>
                            </table>
                            <div class="pagination pagination-sm">
                                <?php foreach ($links as $link) {
                                echo "<li class >". $link."</li>";
                                } ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    
                </div>
                
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body text-center">
                <img class="img-responsive" src="#"/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>



    <!-- Bootstrap Core JavaScript -->
    

    <!-- Metis Menu Plugin JavaScript -->
    

    <!-- Morris Charts JavaScript -->
    

    <!-- Custom Theme JavaScript -->
    

    <script src="<?php echo HTTP_VENDOR_PATH;?>jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo HTTP_VENDOR_PATH;?>metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo HTTP_JS_PATH; ?>sb-admin-2.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>script.js"></script>
</body>

</html>
