<style type="text/css">
.table-bordered > thead > tr >th {
	text-align: center;
	vertical-align: middle;
	background-color: lightgrey;
}
p {
	margin: 0px;
}
</style>
<section class='content-header'>
<h1>
Ganti Password
<small></small>
</h1>
</section>

<section class='content'>
	<div class='row'>
		<section class='col-md-4'>
			<div class='box box-info'>
				<div class='box-header'>
					<i class='fa fa-edit'> <?=$this->session->userdata('user_name')?></i>
				</div>
				<div class='box-body'>
					<?php if(strrpos($this->session->userdata('user_name'), 'dmin ') == true):?>
					<div class="form-group">
						<select class="form-control select-gnt-psw">
							<?php foreach($data_user as $u):?>
							<option value="<?=$u->id?>" data-level='<?=$u->user_level?>'><?=$u->user_name.' '.$u->id.' ['.$u->user_level.']'?></option>
							<?php endforeach;?>
						</select>
					</div>
					<?php endif;?>
				<form method="POST" id="form-gnt-psw" action="<?=base_url('dashboard/setting/user/proses_ganti_password')?>" enctype="multipart/form-data">
					<?php if($pesan != ''):?><p style="color: <?=$warna?>; font-size: 18px;"><?=$pesan?></p><?php endif;?>
					<div class="box-body">
						<div class="form-group">
					    	<label>Password Lama</label>
					        <input class="form-control" type="password" name="password_" placeholder="Password Lama">
					    </div>
					    <div class="form-group">
					    	<label>Password baru</label>
					        <input class="form-control" type="password" name="password" placeholder="Password Baru">
					    </div>
					    <div class="form-group">
					    	<label>Konfirm Password baru</label>
					        <input class="form-control" type="password" name="password2" placeholder="Konfirm">
					    </div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="id" value="<?=$this->session->userdata('id')?>">
						<input type="hidden" name="user_level" value="<?=$this->session->userdata('user_level')?>">
						<input class="form-control btn btn-info" id="submit-gnt-psw" value="Simpan" type="submit"/>
					</div>
				</form>
				</div>
			</div>
		</section>
	</div>
</section>