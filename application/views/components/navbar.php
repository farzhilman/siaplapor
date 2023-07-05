<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
  <!-- <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fas fa-comments"></i>
      <span class="badge badge-danger navbar-badge">3</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <a href="#" class="dropdown-item">
        <div class="media">
          <img src="<?=base_url('assets/dist/img/user1-128x128.jpg')?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
          <div class="media-body">
            <h3 class="dropdown-item-title"> Brad Diesel <span class="float-right text-sm text-danger">
                <i class="fas fa-star"></i>
              </span>
            </h3>
            <p class="text-sm">Call me whenever you can...</p>
            <p class="text-sm text-muted">
              <i class="far fa-clock mr-1"></i> 4 Hours Ago
            </p>
          </div>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <div class="media">
          <img src="<?=base_url('assets/dist/img/user8-128x128.jpg')?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
          <div class="media-body">
            <h3 class="dropdown-item-title"> John Pierce <span class="float-right text-sm text-muted">
                <i class="fas fa-star"></i>
              </span>
            </h3>
            <p class="text-sm">I got your message bro</p>
            <p class="text-sm text-muted">
              <i class="far fa-clock mr-1"></i> 4 Hours Ago
            </p>
          </div>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <div class="media">
          <img src="<?=base_url('assets/dist/img/user3-128x128.jpg')?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
          <div class="media-body">
            <h3 class="dropdown-item-title"> Nora Silvester <span class="float-right text-sm text-warning">
                <i class="fas fa-star"></i>
              </span>
            </h3>
            <p class="text-sm">The subject goes here</p>
            <p class="text-sm text-muted">
              <i class="far fa-clock mr-1"></i> 4 Hours Ago
            </p>
          </div>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
  </li> -->
  <?php if($this->session->userdata('user_id') != NULL):?>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user"></i>
        <?php if($this->session->userdata('user_id') != NULL): echo $this->session->userdata('user_name');?><?php else:?>===<?php endif;?>
        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="max-width: none;">
        <span class="dropdown-header"><?php if($this->session->userdata('user_id') != NULL): echo $this->session->userdata('user_name');?><?php else:?>===<?php endif;?></span>
        <div class="dropdown-divider"></div>
        <?php if($this->session->userdata('user_id') == NULL):?>
        <a href="<?=base_url('login')?>" class="dropdown-item">
          <i class="fas fa-power-off mr-2"></i> Login
          <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
        </a>
        <?php endif;?>
        
        <?php if($this->session->userdata('user_id') != NULL):?>
        <!-- <a href="<?=base_url('dashboard')?>" class="dropdown-item">
          <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
          <span class="float-right text-muted text-sm">3 mins</span>
        </a> -->
        <div class="dropdown-divider"></div>
        <a href="<?=base_url('logout')?>" class="dropdown-item">
          <i class="fas fa-power-off mr-2"></i> Log Out
          <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
        </a>
        <?php endif;?>
      </div>
    </li>
  <?php else:?>
    <!-- <li class="nav-item">
      <a href="<?=base_url('login')?>" class="nav-link">Login</a>
    </li> -->
  <?php endif;?>

    
</ul>