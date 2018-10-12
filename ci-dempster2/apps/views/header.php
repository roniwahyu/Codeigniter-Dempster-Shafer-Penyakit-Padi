<header class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo site_url(); ?>" class="navbar-brand">Dempster Shafer</a>
        </div>
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url('wizard'); ?>">Diagnosa Penyakit Padi</a></li>
                <?php if ($this->ion_auth->logged_in()): ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Kelola <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('gejala'); ?>">Kelola Gejala</a></li>
                        <li><a href="<?php echo site_url('penyakit'); ?>">Kelola Penyakit</a></li>
                        <li><a href="<?php echo site_url('rule_inferensi'); ?>">Kelola Inferensi Rule</a></li>
                               </ul>
                </li>
             <?php endif; ?>
                <!-- <li><a href="<?php //echo site_url('topsis'); ?>">Proses TOPSIS</a></li> -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Laporan <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('site/show_all_matrix'); ?>">Tabel Keputusan</a></li>
                        <li><a href="<?php echo site_url('site/laporan'); ?>">Laporan</a></li>
                    </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <li class="user dropdown">
                <?php if ( ! $this->ion_auth->logged_in()): ?>
                    <a href="<?php echo site_url('auth/login'); ?>" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/login'); ?>">
                        <i class="icon-user"></i> Log In
                    </a>
               
                <?php else: ?>  

                <?php $user = $this->ion_auth->user()->row(); ?>
                    <?php if ( ! empty($user)): ?>
                        <a class="dropdown-toggle" data-toggle="dropdown">
                              <i class="glyphicon glyphicon-user"></i>
                        </a>
                        <div class="panel dropdown-menu dropdown-menu-right" style="width:300px">
                            <ul class="dropdown-menu">
                        <li <?php ( ! $this->ion_auth->is_admin()) && print('class="disabled"'); ?>>
                            <a href="<?php echo site_url('auth'); ?>">Users</a>
                        </li> 

                        <li>
                            <a href="<?php echo site_url('auth/change_password'); ?>"
                                rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/change_password'); ?>"
                            >
                                Change password
                            </a>
                        </li>
                        <li><a href="<?php echo site_url('auth/logout'); ?>">Log out</a></li>
                    </ul>
                            <div class="panel-header">
                                <a href="index.html#" class="pull-left"><i class="icon-spinner7"></i></a>
                                <span>User Information</span>
                                <a href="index.html#" class="pull-right"><i class="icon-new-tab"></i></a>
                            </div>
                            <div class="well ">
                            <?php foreach (array('id', 'email', 'first_name', 'last_name') as $field): ?>
                                <div class="row clearfix"> 
                                <?php echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><b>' . $field . ':</b></div><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" > ' . $user->$field . '</div>'; ?>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                
                    <?php endif; ?>
                   
                          
            
             <?php endif; ?>    
            </li>
            <?php if ($this->ion_auth->logged_in()): ?>
            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="icon-exit"></i> Logout</a></li>
            <?php endif; ?>

            </ul>
        </nav>
    </div>
</header>