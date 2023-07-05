<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="#" class="nav-link menu active" id="menu_home">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <?php if($this->session->userdata('user_id') == 'vkecamatan1' || $this->session->userdata('user_id') == 'vkecamatan2'){?>
      <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd_ks" data-login='pe' data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-check-double"></i>
          <p>
            Level 4
          </p>
        </a>
      </li>
      <?php } else {?>
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd_tujuan_verif" data-login='pe' data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-check-double"></i>
          <p>
            Verifikasi
          </p>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd_tujuan"  data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Entri Level 4
          </p>
        </a>
      </li>
      <?php }?>
      <!-- <?php if($this->session->userdata('user_id') != 'vkecamatan1' || $this->session->userdata('user_id') != 'vkecamatan2'){?>
        <?php if ($user->is_kunci_pemetaan == 't'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Pemetaan 2022 <span class="right badge badge-danger">kunci</span>
              </p>
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="#" class="nav-link menu" id="pd-view-dora" data-unit_id='<?=$this->session->userdata('unit_id')?>'>
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Pemetaan 2022
              </p>
            </a>
          </li>
        <?php endif ?>
      <?php }?> -->
      <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd-view-rekap2"  data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            View Report PD
          </p>
        </a>
      </li>
      <li class="nav-item">
        <!-- <a href="<?=base_url('dashboard/dashboard/master')?>" class="nav-link menu" id="menu_master"> -->
        <a href="#" class="nav-link menu" id="menu_master">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Master Kepmen50
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>