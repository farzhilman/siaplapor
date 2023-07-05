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
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="menu_kota_prioritas">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Input Prioritas Kota
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link menu" id="menu_kota_visi">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Input Level Kota
          </p>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Kota
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link menu" id="menu_kota_visi">
              <i class="far fa-circle nav-icon"></i>
              <p>input Visi Misi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>input Tujuan Sasaran</p>
            </a>
          </li>
        </ul>
      </li> -->
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="menu_kota_visi">
          <i class="nav-icon fas fa-calendar-week"></i>
          <p>
            Entri Level 1 s/d 3
          </p>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd_tujuan"  data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Input Narasi
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
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="strategi"  data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Input Strategi & Kebijakan PD
          </p>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd-view-rekap2"  data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            View Report PD
          </p>
        </a>
      </li>
      <?php if ($user->is_kunci == 't' && $user->is_kunci_anggaran == 't'): ?>
      <!-- <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-plus"></i>
          <p>
            Pindah Anggaran <span class="right badge badge-danger">kunci</span>
          </p>
        </a>
      </li> -->
      <?php else: ?>
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="salin2" data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-plus"></i>
          <p>
            Pindah Anggaran
          </p>
        </a>
      </li> -->
      <?php endif ?>
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd-rekap8"  data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            View Tag Indikator
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link menu" id="pd-rekap11" data-tipe='public' data-unit_id='<?=$this->session->userdata('unit_id')?>'>
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            View Tag KDh/SPM/SDGs
          </p>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a href="#" class="nav-link menu" disabled title="Mohon Maaf Lagi dalam perbaikian">
          <i class="nav-icon fas fa-lock"></i>
          <p>
            Input level PD.
          </p>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index2.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index3.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v3</p>
            </a>
          </li>
        </ul>
      </li> -->
      <!-- <li class="nav-item">
        <a href="<?=base_url('cron/view_pohon_pd/'.$this->session->userdata('unit_id'))?>" class="nav-link" target="_blank">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Pohon Kinerja PD
          </p>
        </a>
      </li> -->
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