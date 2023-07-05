<style type="text/css">
	table.dataTable thead > tr > th, tbody > tr > td {
		border: black solid 1px;
	}
	table.dataTable tbody > tr > td {
		border: black solid 1px;
	}
	table.dataTable tfoot > tr > th {
		border: black solid 1px;
	}
	table.dataTable thead, table.dataTable tfoot {background-color: lightblue;}
/*	table.dataTable tr.odd { background-color: white; }*/
/*	table.dataTable tr.even { background-color: #E2E4FF; }*/
</style>
<div class="row">
	<div class="col-lg-12">
		<div class="card card-dark card-outline">
      <div class="card-header">
        <p class="card-title m-0 keterangan" style="text-align: justify;">
          Selamat datang, <?=$this->session->userdata('user_name')?> !
        </p>  
      </div>
      <div class="card-body">
  			<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
	   </div>
	</div>
</div>