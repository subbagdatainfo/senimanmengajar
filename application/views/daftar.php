<section id="daftar"   >
        <div class="container text-center">
            <div clas ="row">
                <!-- <h1><span class="label label-success"> Pendaftaran sudah Ditutup</span><h1> -->
                <div class ="col-lg-12 text-center">
                    <h2 class="intro-text ">Pendaftaran 
                    </h2>
                </div>
            </div>
            <div class="row">
                <div style="text-align:left; color:red; font-size: 0.875em;"><?php echo validation_errors(); ?> </div>
                        <?php if($this->session->flashdata('status')=="success"){ ?>
                <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                    <form name="daftar" id="daftarform" enctype="multipart/form-data" action ="<?=site_url('Peserta/createpeserta'); ?>" method="post">
                        <div class="row">
                            <div class ="row-lg-12">
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Nama"  name="nama" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="email"  name="email" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Nomor Telepon"  name="no_telpon" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <h4>Lokasi Pilihan</h4>
                                    <select id="lokasi" name="lokasi" class ="form-control">
                                        <option name="sabang" value="sabang">Sabang</option>
                                        <option name="pesisir selatan" value="Pesisir Selatan">Pesisir Selatan</option>
                                        <option name="bintan" value="Bintan">Bintan</option>
                                        <option name="belitung" value="Belitng">Belitung</option>
                                        <option name="banjarmasin" value="Banjarmasin">Banjarmasin</option>
                                        <option name="sumedang" value="sumedang">Sumedang</option>
                                        <option name="karimun jawa" value="Karimun Jawa">Karimun Jawa</option>
                                        <option name="sumenep" value="Sumenep">Sumenep</option>
                                        <option name="toraja" value="Toraja">Toraja</option>
                                        <option name="lembata" value="Lembata">Lembata</option>
                                    </select>
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <h4>Proposal</h4>
                                    <input type="file" name="userfile" class="form-control">
                                </div>
                                
                        </div>
                        <div class="row">
                             <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name ="submit" value="submit" class="btn btn-xl">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            </div>
    </section>