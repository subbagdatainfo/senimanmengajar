

    <!-- Header -->
    <header>
        <div class="container-fluid">
            <div class="intro-text">
                <div class="intro-lead-in">Seniman Mengajar</div>
                <div class="intro-heading">Coming Soon</div>
                <a href="#daftar" class="page-scroll btn btn-xl">Daftar</a>
            </div>
            
        </div>
    </header>

    <!-- Tempat Pelaksanaan -->
    <section id="lokasi" class="bg-light-gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tempat Pelaksanaan</h2>
                    <h1 class="section-subheading">Coming Soon</h1>
                </div>
            </div>
            
           
        </div>
    </section>

    <section id="pengumuman">
        <div class="row-lg-6">
            <div class="text-center">
                <h2>Pengumuman</h2>
            </div>
        </div>
        <div class="row-lg-6">
            <p>
                
            </p>
        </div>
    </section>

    <!-- page-section tentang seniman mengajar -->
    <section id="about" >
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Coming Soon</h2>   
                </div>
            </div>
            
            
            
        </div>
    </section>

    <!--Timeline pelaksanaan Seniman Mengajar -->
    <!-- Timeline Section -->
    <section id="timeline" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Timeline</h2>
                    <h1 class="section-subheading text-muted">Coming Soon</h1>
                </div>
            </div>
            
        </div>
    </section>    

    <!-- daftar form -->
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
                    <form name="daftar" id="daftarform" action ="<?=site_url('Peserta/createpeserta'); ?>" method="post">
                        <div class="row">
                            <div class ="row-lg-12">
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Nama"  name="nama" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Tempat tanggal lahir"  name="ttl" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="alamat"  name="alamat" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="kota"  name="kota" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-md-6" style="text-align:left;">   
                                <h3>Provinsi</h3>
                                <select id="provinsi" name="provinsi" >
                                    <?php
                                        foreach ($provinsi->result_array() as $key) {
                                            ?><option  value="<?php echo $key['provinsi'];?>"><?php echo $key['provinsi'];?></option><?php
                                        }
                                    ?>
                                </select>
                            </div>
                                
                                <div class ="form-group">
                                    <input type ="password" class ="form-control" placeholder="Password" id="password" name="password" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="text" class ="form-control" placeholder="Nomor Telepon/Handphone" id="no_telpon" name ="no_telpon" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                                <div class ="form-group">
                                    <input type ="email" class ="form-control" placeholder="Email" id="email" name="email" >
                                    <p class ="help-block text-danger"></p>
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align:left;">
                                <h3>Daerah yang Dipilih</h3>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="wakatobi" checked>Wakatobi <br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="bengkulutengah" >Bengkulu Tengah<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="bulungan" >Bulungan<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="mandalika" >Mandalika<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="morotai" >Morotai<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="tanjunglesung" >Tanjung Lesung<br/>
                                </div>
                                <div class ="form-group">
                                    <input type="radio" id="region" name="chk" value="danautoba" >Danau Toba<br/>
                                </div>
                            </div>
                            <div class="form-group col-md-6">   
                                <h3>Bidang Seni</h3>
                                <select id="jenis_seni" name="jenis_seni">
                                    <option name="Seni Tari" value="senitari">Seni Tari</option>
                                    <option name="Seni Musik" value="senimusik">Seni Musik</option>
                                    <option name="Seni Teater" value="seniteater">Seni Teater</option>
                                    <option name="Seni Rupa (Kerajinan Kerang)" value="senirupakerajinankerang">Seni Rupa (Kerajinan Kerang)</option>
                                    <option name="Seni Media" value="senimedia">Seni Media</option>
                                </select>
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
    
    <!-- Contact Section -->
    <section id="hubungi" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Hubungi Kami</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama *" id="name" required data-validation-required-message="Silakan masukan nama Anda.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="email *" id="email" required data-validation-required-message="Silakan masukan email Anda.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="No. Telp *" id="phone" required data-validation-required-message="Silakan masukan nomor yang bisa dihubungi.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form> -->
                    <div class ="col-md-6">
                        <div class="container">
                            <p align="justify"> 
                                <strong>
                                     Untuk Layanan Informasi Hubungi: <br>
                                </strong>
                            </p>
                                    <ul>
                                        
                                        <li><span class="glyphicon glyphicon-phone"></span>  Hilda Yulianti: 0857 1140 5934</li>
                                        <li><span class="glyphicon glyphicon-phone"></span>  Hana Nabilah : 0812 9838 6898</li>
                                        <li><span class="glyphicon glyphicon-phone"></span>  Angga : 0856 4793 3110</li>
                                        
                                        <li><span class="glyphicon glyphicon-phone"></span> Kantor : 021-5725518</li>
                                        <li><span class="glyphicon glyphicon-envelope"></span> Email : senimanmengajar.kemdikbud@gmail.com</li>
                                    </ul>      
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php echo $map['html']; ?>
                        <strong>Kementrian Pendidikan dan Kebudayaan<br>Direktorat Kesenian, DIrektorat Jenderal Kebudayaan<br>Jln. Jenderal Sudirman, Komplek Kementrian Pendidikan dan Kebudayaan <br>Gedung E Lantai 9<br>Senayan Jakarta 10270</strong>  
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal Bulungan -->
    <div class="portfolio-modal modal fade" id="bulungan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Kabupaten Bulungan, Kalimantan Utara</h2>
                                <p align="justify">Rekomendasi dari BP2DK pelaksanaan kegiatan Seniman Mengajar di Kabupaten Bulungan, Kalimantan Utara di Desa Gunung Putih, Kecamatan Tanjung Palas. Jarak tempuh alternative dari kecamatan tanjung palas menuju desa gunung putih dilakukan dengan menyeberangi sungai kayan menggunakan speedbooth, bila menggunakan kendaraan roda 4 dengan jarak tempuh 15 km. Jarak antar kecamatan cukup jauh jadi tidak memungkinkan kegiatan berada di beberapa lokasi. Namun, di desa gunung putih tidak ada sanggar tentang kesenian khas dayak, di desa tersebut mayoritas masyarakatnya berasal dari suku Jawa. Rekomendasi dari dinas untuk kegiatan Seniman Mengajar yaitu desa Matau sajau dan purau sajau kecamatan Tanjung palas Timur yang mayoritas penduduk suku dayak kenyah. Desa Matau sajau dan Pura sajau terdapat sanggar ataupun komunitas seni, terdapat 2 jenis cabang seni yang berkembang yaitu seni musik dan seni tari yaitu seni tari  1). Temengang Madang (burung Enggang) 2). Pemung Tawai (satu hati) 3). Tarian Perang. Seni Musik yaitu Kulintangan.
                                Penggiat seni bukan dijadikan sebagai mata pencaharian pokok. Pelatihan seni dilakukan dari anak2 kecil hingga dewasa, pelatihan di lakukan secara rutin setiap minggu. 
                                Mata pencaharian masyarakat sebagian besar bertumpu pada sektor pertanian, perkebunan, dan peternakan. Jenis seni yang berkembang di desa ini adalah seni musik dan tari.
                                </p>
                                <p>
                                    <strong>Membutuhkan seniman yang ahli di bidang managemen seni pertunjukan dan pengemasan seni pertunjukan</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Tari (3 orang)</li>
                                    <li>2. Seni Musik (2 orang)</li>
                                </ul>
                                
                                    
                                
                                <p class="section-subheading"> <strong>rencana lokasi pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/bulungan1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/bulungan2.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal bengkulutengah -->
    <div class="portfolio-modal modal fade" id="bengkulutengah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Kabupaten Bengkulu Tengah, Bengkulu</h2>
                                <p align="justify">
                                    Pelaksanaan kegiatan Seniman Mengajar di Kabupaten Bengkulu Tengah, Bengkulu akan dipusatkan di Desa Panca Mukti, Kecamatan Pondok Kelapa. Desa Pancamukti merupakan suatu desa pemekaran dan mayoritas masyarakatnya transmigrasi berasal dari suku Jawa, Padang, Batak, dari Kabupaten ke desa Pancamukti memakan waktu sekitar 1 jam. Mata pencaharian masyarakat desa ini bertumpu pada pertanian, perkebunan dan kerajinan tangan.
                                </p>
                                <p>
                                    <strong>Membutuhkan seniman yang ahli di bidang management seni pertunjukan dan pengemasan seni pertunjukan dan yang mampu menggali kesenian kearifan lokal daerah Bengkulu </strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Tari</li>
                                    <li>2. Seni Musik</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Rupa (Kerajinan Bambu)</li>
                                    <li>5. Seni Media (Fotografi dan videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>rencana lokasi pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/bengkulutengah1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/bengkulutengah2.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal wakatobi -->
    <div class="portfolio-modal modal fade background-modal" id="wakatobi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Kabupaten Wakatobi, Sulawesi Tenggara</h2>
                                <p align="justify">
                                    Wakatobi terletak di kepulauan jazirah Tenggara Pulau Sulawesi tepatnya di sebelah Tenggara Pulau Buton. Untuk mencapai kabupaten Wakatobi harus menempuh perjalanan dari Makassar-Kendari-Wakatobi dengan pesawat kecil. Jarak dari Bandara Wakatobi ke lokasi kegiatan berjarak 25 kilometer dengan waktu tempuh 25—30 menit. Mata pencaharian masyarakat Kabupaten Wakatobi sebagian besar adalah nelayan. Jenis seni yang berkembang di masyarakat Wakatobi kebanyakan adalah seni tari. Untuk cabang seni lainnya, lebih kecil perkembangannya dibanding seni tari. Untuk seni teater, di sana hanya terdapat satu sanggar yang benar-benar fokus pada teater sedangkan ada satu sanggar lainnya yang terdapat bidang seni teater tetapi digabungkan dengan bidang seni lainnya. Seni musik, seni rupa, dan seni media kurang mendapatkan tempat di sana karena kearifan lokal masyarakat yang mendominasi adalah seni tari. Kegiatan ini dilaksanakan di pulau Wangi-wangi, kecamatan Wangi-Wangi dan kecamatan Wangi-Wangi Selatan.
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Wakatobi, Sulawesi Tenggara adalah di bidang :</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (kerajinan/ ekonomi kreatif)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik </li>
                                    <li>5. Seni Media (Fotografi dan Videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Rencana Lokasi Pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/wakatobi1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/wakatobi2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/wakatobi3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal mandalika -->
    <div class="portfolio-modal modal fade background-modal" id="mandalika" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Mandalika, Nusa Tenggara Barat</h2>
                                <p align="justify">
                                    Pelaksanaan kegiatan seniman mengajar di Mandalika yang terletak,  Kabupaten Lombok Tengah, Nusa Tenggara Barat. Untuk mencapai lokasi tersebut harus ditempuh melalui perjalanan udara atau laut ke Mataram. Setelah sampai di Mataram, langsung menuju Terminal Mandalika untuk menuju Mandalika. Jarak dari kota Mataram ke Mandalika sekitar 30 menit sampai 1 jam perjalanan. Mata pencaharian sebagian besar penduduk di daerah tersebut adalah sebagai petani dan nelayan. Jenis seni yang berkembang di daerah ini adalah seni musik, seni tari, seni teater, dan seni sastra.
                                    Dari beberapa sanggar yang dikunjungi di Lombok Tengah, rata-rata komunitas yang aktif mulai dari usia sekolah, usia dewasa bahkan diantara pemain musik Cilokaq dan kesenian Jaran Kamput rata-rata berusia 40 tahun ke atas. Kondisi ini dibarengi respon aktif masyarakat terhadap kegiatan seni menjadikan seni tradisional masih berkembang walaupun memiliki keterbatasan alat untuk mendukung aktivitas di sanggarnya, disamping harus menghadapi gempuran seni modern    
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Mandalika, Nusa Tenggara Barat adalah di bidang : </strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Ukir Kayu)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik (Vokal)</li>
                                    <li>5. Seni Media (Fotografi dan Videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Gambaran Kondisi Lokasi</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/mandalika1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/mandalika2.jpg" class = "image-responsive"></li>
                                </ul>

                                <p class="section-subheading"> <strong>Salah satu contoh kerajinan khas Mandalika, yaitu Pameje</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/mandalika3.jpg" class = "image-responsive"></li>
                                    
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal morotai -->
    <div class="portfolio-modal modal fade background-modal" id="morotai" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Pulau Morotai, Maluku Utara</h2>
                                <p align="justify">
                                    Pelaksanaan kegiatan Seniman Mengajar di Kabupaten Pulau Morotai akan dipusatkan di kota Morotai Selatan yang terletak di ujung utara Kabupaten Halmahera Utara dan merupakan bagian dari Provinsi Maluku Utara. Untuk menuju ke Pulau Morotai dapat ditempuh dengan sarana transportasi laut ke Kota Daruba ataupun pesawat dari Ternate ditempuh dalam waktu 1 jam perjalanan dan dari bandara menuju lokasi memerlukan waktu 20 menit menggunakan jalur darat. Cuaca di daerah ini panas, hasil rempah yang terkenal yaitu cengkeh, pala dan kopra. Selain itu, hasil perikanannya juga cukup melimpah. Mata pencaharian masyarakat sebagian besar menjadi petani dan nelayan.
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Morotai, Maluku Utara adalah di bidang : </strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Kerajinan dan lukis)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik (Vokal)</li>
                                    <li>5. Seni Media</li>
                                </ul>
                                <p class="section-subheading"> <strong>Gambaran Kondisi Lokasi</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/morotai1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/morotai2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/morotai3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal tanjung lesung -->
    <div class="portfolio-modal modal fade background-modal" id="tanjunglesung" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Tanjung Lesung, Banten</h2>
                                <p align="justify">
                                    Pantai Tanjung Lesung terletak di Desa Tanjung Jaya, Kecamatan Panimbang, Kabupaten Pandeglang, Provinsi Banten. Posisinya terletak di sebelah barat kabupaten Pandeglang dan mempunyai luas sekitar 150 hektoare. Jarak yang anda tempuh dari Jakarta menuju Tanjung Lesung sekitar 160 kilometer dengan waktu tempuh 3 (tiga) jam perjalanan menggunakan kendaraan pribadi. Mata Pencaharian penduduknya sebagian besar adalah nelayan. Kondisi daerah di sana sangat memprihatinkan, baik dari segi seninya maupun dari segi lokasinya. Banyak kesenian khas yang terdapat di kawasan tersebut, beberapa diantaranya Teater Ubruk, Rampak Beduk, Kendang hatong, Mapag Tamu, dan Kendang Lesung, tetapi tidak berkembang dengan baik. Sanggar-sanggar di sana juga masih sangat perlu sentuhan kreatifitas untuk mengembangkan diri agar dapat kesempatan untuk tampil lebih baik lagi.    
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Tanjung Lesung, Banten adalah di bidang :</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Kriya Tekstil)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater (Ubrug)</li>
                                    <li>4. Seni Musik</li>
                                    <li>5. Seni Media (videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Rencana lokasi pembelajaran</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/pandeglang1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/pandeglang2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/pandeglang3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal danau toba -->
    <div class="portfolio-modal modal fade background-modal" id="danautoba" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Danau Toba, Sumatera Utara</h2>
                                <p align="justify">
                                    Humbang  Hasundutan (Humbahas)  adalah sebuah  kabupaten di Sumatera Utara. Dibentuk pada 28 Juli 2003, kabupaten ini mempunyai luas sebesar 2.335,33 km² dan beribukotakan Dolok Sanggul. Kondisi fisik kabupaten ini berada pada ketinggian 330-2.075 meter dpl. Potensi budaya di Humbahas cukup tinggi dan perlu diagali lebih lanjut.
                                    Untuk bidang seni musik akan dilaksanakan di sanggar MARTABE yang berada di kota Dolok Sanggul. 
                                    Musik Ogung sabangunan yang terdiri dari sarune,  harapi, suling, kecapi, serunai, hesek, ogung loan, ogung ihutani dan panggora. 
                                    Ogung taganing (alat musik yang hampir punah)
                                    Bidang seni tari akan dilaksanakan di sanggar TONGGI yang berada di Dolok sanggul. Tari Tortor dan tari Martumba merupakan tarian yang harus dilestarikan 
                                    Bidang seni teater akan dilaksanakan di sanggar HUMBANG HAULI . Sanggar Humbang Hauli akan mewakili Sumatera Utara untuk perlombaan teater yang diadakan Kominfo di Palembang. Seni pertunjukannya adalah Pentas Pertunjukan Rakyat ( PETRA) 
                                    Bidang seni media akan dilaksanakan di sanggar ORSEPDO yang juga berada di Dolok Sanggul.
                                    Untuk bidang seni rupa akan dilaksanakan di Bakkara. Di Bakkara terdapat KOMUNITAS yang mengerjakan seni terapan seperti ukir dan pahat
                                </p>
                                <p>
                                    <strong>Seniman yang dibutuhkan untuk daerah Morotai, Maluku Utara adalah di bidang :</strong>
                                </p>
                                <ul class="list-inline">
                                    <li>1. Seni Rupa (Kriya Tanah liat dan Kayu)</li>
                                    <li>2. Seni Tari</li>
                                    <li>3. Seni Teater</li>
                                    <li>4. Seni Musik (tradisi)</li>
                                    <li>5. Seni Media (Fotografi dan Videografi)</li>
                                </ul>
                                <p class="section-subheading"> <strong>Gambaran Kondisi Lokasi</strong></p>
                                <ul class="list-inline">
                                    <li><img src="assets/img/danautoba1.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/danautoba2.jpg" class = "image-responsive"></li>
                                    <li><img src="assets/img/danautoba3.jpg" class = "image-responsive"></li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
