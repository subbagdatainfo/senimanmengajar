
    <div class="container">
        <div class="row">
                <div style="text-align:left; color:red; font-size: 0.875em;"><?php echo validation_errors(); ?> </div>
                        <?php if($this->session->flashdata('status')=="success"){ ?>
                <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                <?php }elseif ($this->session->flashdata('status')=='danger') {?>
                    <p><h3><?php echo $this->session->flashdata('message'); ?></h3></p>
                <?php } ?>
            </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="login" id="loginform" action ="<?=site_url('C_Admin/authadmin'); ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <button type="submit" name ="submit" value="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
