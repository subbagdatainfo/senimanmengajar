<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?=site_url('#page-top');?>">Seniman Mengajar</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?=site_url('#page-top');?>"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#pelaksanaan');?>">Pelaksanaan</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#about');?>">Tentang</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#timeline');?>">Timeline</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#daftar');?>">Daftar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=site_url('#hubungi');?>">Hubungi Kami</a>
                    </li>
                    <li>
                        <!--<a class="page-scroll" href="#masuk">Masuk</a>-->
                        <a href="<?=site_url('C_Peserta/login');?>">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>