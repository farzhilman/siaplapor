<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}

	public function index()
	{
		
	}

	public function update_txt()
	{
		$this->m_pd_tujuan->update_perubahan();

		echo "selesai";
	}

	public function update_indikator_kota()
	{
		$this->m_pd_indikator_tujuan->update();

		echo "selesai update";
	}

	public function update_anggaran()
	{
		$this->m_pd_bidang_urusan->update_anggaran();

		$where_update['unit_id !='] = NULL;
		$data['date_updated'] = date('d-M-y H:i:s');
		$this->m_pd_bidang_urusan->save($data, NULL, $where_update);

		echo "selesai.";
	}

	public function update_pd_baru($unit_id_baru,$unit_id_lama)
	{
		$where_tujuan['unit_id'] = $unit_id_lama;
		$where_tujuan['is_hapus'] = 'f';
		$data_tujuan = $this->m_pd_tujuan->get_by($where_tujuan,'result', NULL, NULL, 'id');

		foreach ($data_tujuan as $t) {
			$data['id_kota_sasaran'] = $t->id_kota_sasaran;
			$data['unit_id'] = $unit_id_baru;
			$data['txt'] = $t->txt;
			$data['user_id'] = $t->user_id;
			$data['date_modified'] = date('d-M-y H:i:s');
			$this->m_pd_tujuan->save($data);
			$id_tujuan_baru = $this->db->insert_id();

			$where_tujuani['id_tujuan'] = $t->id;
			$where_tujuani['unit_id'] = $t->unit_id;
			$where_tujuani['is_hapus'] = 'f';
			$data_tujuani[$t->id] = $this->m_pd_indikator_tujuan->get_by($where_tujuani,'result', NULL, NULL, 'id');
			foreach ($data_tujuani[$t->id] as $ti) {
				$data1['unit_id'] = $unit_id_baru;
				$data1['id_tujuan'] = $id_tujuan_baru;
				$data1['txt'] = $ti->txt;
				$data1['user_id'] = $ti->user_id;
				$data1['satuan_thn1'] = $ti->satuan_thn1;
				$data1['satuan_thn2'] = $ti->satuan_thn2;
				$data1['satuan_thn3'] = $ti->satuan_thn3;
				$data1['satuan_thn4'] = $ti->satuan_thn4;
				$data1['satuan_thn5'] = $ti->satuan_thn5;
				$data1['satuan_thn6'] = $ti->satuan_thn6;
				$data1['target_thn1'] = $ti->target_thn1;
				$data1['target_thn2'] = $ti->target_thn2;
				$data1['target_thn3'] = $ti->target_thn3;
				$data1['target_thn4'] = $ti->target_thn4;
				$data1['target_thn5'] = $ti->target_thn5;
				$data1['target_thn6'] = $ti->target_thn6;
				$data1['definisi_operasional'] = $ti->definisi_operasional;
				$data1['formulasi'] = $ti->formulasi;
				$data1['id_kota_indikator_sasaran'] = $ti->id_kota_indikator_sasaran;
				$data1['id_kota_sasaran'] = $ti->id_kota_sasaran;
				$data1['date_modified'] = date('d-M-y H:i:s');
				$this->m_pd_indikator_tujuan->save($data1);
			}

			$where_sasaran['id_tujuan'] = $t->id;
			$where_sasaran['unit_id'] = $t->unit_id;
			$where_sasaran['is_hapus'] = 'f';
			$data_sasaran[$t->id] = $this->m_pd_sasaran->get_by($where_sasaran,'result', NULL, NULL, 'id');

			foreach ($data_sasaran[$t->id] as $s) {
				$data2['id_tujuan'] = $id_tujuan_baru;
				$data2['id_kota_sasaran'] = $s->id_kota_sasaran;
				$data2['unit_id'] = $unit_id_baru;
				$data2['txt'] = $s->txt;
				$data2['user_id'] = $s->user_id;
				$data2['date_modified'] = date('d-M-y H:i:s');
				$this->m_pd_sasaran->save($data2);
				$id_sasaran_baru = $this->db->insert_id();

				$where_sasarani['id_sasaran'] = $s->id;
				$where_sasarani['unit_id'] = $s->unit_id;
				$where_sasarani['is_hapus'] = 'f';
				$data_sasarani[$t->id][$s->id] = $this->m_pd_indikator_sasaran->get_by($where_sasarani,'result', NULL, NULL, 'id');
				foreach ($data_sasarani[$t->id][$s->id] as $si) {
					$data3['unit_id'] = $unit_id_baru;
					$data3['id_sasaran'] = $id_sasaran_baru;
					$data3['txt'] = $si->txt;
					$data3['user_id'] = $si->user_id;
					$data3['satuan_thn1'] = $si->satuan_thn1;
					$data3['satuan_thn2'] = $si->satuan_thn2;
					$data3['satuan_thn3'] = $si->satuan_thn3;
					$data3['satuan_thn4'] = $si->satuan_thn4;
					$data3['satuan_thn5'] = $si->satuan_thn5;
					$data3['satuan_thn6'] = $si->satuan_thn6;
					$data3['target_thn1'] = $si->target_thn1;
					$data3['target_thn2'] = $si->target_thn2;
					$data3['target_thn3'] = $si->target_thn3;
					$data3['target_thn4'] = $si->target_thn4;
					$data3['target_thn5'] = $si->target_thn5;
					$data3['target_thn6'] = $si->target_thn6;
					$data3['definisi_operasional'] = $si->definisi_operasional;
					$data3['formulasi'] = $si->formulasi;
					$data3['date_modified'] = date('d-M-y H:i:s');
					$this->m_pd_indikator_sasaran->save($data3);
				}

				$where_subkeg['id_sasaran'] = $s->id;
				$where_subkeg['unit_id'] = $s->unit_id;
				$where_subkeg['is_hapus'] = 'f';
				$data_subkeg[$t->id][$s->id] = $this->m_pd_sub_kegiatan->get_by($where_subkeg,'result', NULL, NULL, 'id');

				///ini kalo tanpa penunjang
				// $data_subkeg[$t->id][$s->id] = $this->m_pd_bidang_urusan->select_subkeg_berdasar_pd_baru($id_sasaran, $unit_id_lama, $unit_id_baru);

				foreach ($data_subkeg[$t->id][$s->id] as $sk) {
					$data4['id_sasaran'] = $id_sasaran_baru;
					$data4['unit_id'] = $unit_id_baru;
					$data4['user_id'] = $sk->user_id;
					$data4['kode_urusan'] = $sk->kode_urusan;
					$data4['urusan'] = $sk->urusan;
					$data4['kode_bidang_urusan'] = $sk->kode_bidang_urusan;
					$data4['bidang_urusan'] = $sk->bidang_urusan;
					$data4['kode_program'] = $sk->kode_program;
					$data4['program'] = $sk->program;
					$data4['kode_kegiatan'] = $sk->kode_kegiatan;
					$data4['kegiatan'] = $sk->kegiatan;
					$data4['kode_sub_kegiatan'] = $sk->kode_sub_kegiatan;
					$data4['sub_kegiatan'] = $sk->sub_kegiatan;
					$data4['catatan_subkegiatan'] = $sk->catatan_subkegiatan;
					$data4['tag_id_kdh'] = $sk->tag_id_kdh;
					$data4['kode_urusan_sipd'] = $sk->kode_urusan_sipd;
					$data4['urusan_sipd'] = $sk->urusan_sipd;
					$data4['kode_bidang_urusan_sipd'] = $sk->kode_bidang_urusan_sipd;
					$data4['bidang_urusan_sipd'] = $sk->kode_urusan_sipd;
					$data4['date_modified'] = date('d-M-y H:i:s');
					$this->m_pd_sub_kegiatan->save($data4);
					$id_subkeg_baru = $this->db->insert_id();

					$where_subkegi['id_sub_kegiatan'] = $sk->id;
					$where_subkegi['unit_id'] = $sk->unit_id;
					$where_subkegi['is_hapus'] = 'f';
					$data_subkegi[$t->id][$s->id][$sk->id] = $this->m_pd_indikator_sub_kegiatan->get_by($where_subkegi,'result', NULL, NULL, 'id');
					foreach ($data_subkegi[$t->id][$s->id][$sk->id] as $ski) {
						$data5['unit_id'] = $unit_id_baru;
						$data5['id_sub_kegiatan'] = $id_subkeg_baru;
						$data5['id_sasaran'] = $id_sasaran_baru;
						$data5['txt'] = $ski->txt;
						$data5['user_id'] = $ski->user_id;
						$data5['satuan_thn1'] = $ski->satuan_thn1;
						$data5['satuan_thn2'] = $ski->satuan_thn2;
						$data5['satuan_thn3'] = $ski->satuan_thn3;
						$data5['satuan_thn4'] = $ski->satuan_thn4;
						$data5['satuan_thn5'] = $ski->satuan_thn5;
						$data5['satuan_thn6'] = $ski->satuan_thn6;
						$data5['target_thn1'] = $ski->target_thn1;
						$data5['target_thn2'] = $ski->target_thn2;
						$data5['target_thn3'] = $ski->target_thn3;
						$data5['target_thn4'] = $ski->target_thn4;
						$data5['target_thn5'] = $ski->target_thn5;
						$data5['target_thn6'] = $ski->target_thn6;
						$data5['definisi_operasional'] = $ski->definisi_operasional;
						$data5['formulasi'] = $ski->formulasi;
						$data5['date_modified'] = date('d-M-y H:i:s');
						$this->m_pd_indikator_sub_kegiatan->save($data5);
					}
				}

				$data_program[$t->id][$s->id] = $this->m_pd_sub_kegiatan->select_program($unit_id_lama, $s->id);
				///ini kalo tanpa penunjang
				// $data_program[$t->id][$s->id] = $this->m_pd_bidang_urusan->select_program_berdasar_pd_baru($id_sasaran, $unit_id_lama, $unit_id_baru);
				foreach ($data_program[$t->id][$s->id] as $p) {
					$where_indikator_program['id_sasaran'] = $s->id;
					$where_indikator_program['kode_urusan'] = $p->kode_urusan;
					$where_indikator_program['kode_bidang_urusan'] = $p->kode_bidang_urusan;
					$where_indikator_program['kode_program'] = $p->kode_program;
					$where_indikator_program['is_hapus'] = 'f';
					$where_indikator_program['unit_id'] = $p->unit_id;
					$data_programi[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] = $this->m_pd_indikator_program->get_by($where_indikator_program,"result", NULL, NuLL, 'id');

					foreach ($data_programi[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] as $pi) {
						$data6['unit_id'] = $unit_id_baru;
						$data6['id_sasaran'] = $id_sasaran_baru;
						$data6['txt'] = $pi->txt;
						$data6['user_id'] = $pi->user_id;
						$data6['kode_urusan'] = $pi->kode_urusan;
						$data6['kode_bidang_urusan'] = $pi->kode_bidang_urusan;
						$data6['kode_program'] = $pi->kode_program;
						$data6['kode_urusan_sipd'] = $pi->kode_urusan_sipd;
						$data6['urusan_sipd'] = $pi->urusan_sipd;
						$data6['kode_bidang_urusan_sipd'] = $pi->kode_bidang_urusan_sipd;
						$data6['bidang_urusan_sipd'] = $pi->bidang_urusan_sipd;
						$data6['satuan_thn1'] = $pi->satuan_thn1;
						$data6['satuan_thn2'] = $pi->satuan_thn2;
						$data6['satuan_thn3'] = $pi->satuan_thn3;
						$data6['satuan_thn4'] = $pi->satuan_thn4;
						$data6['satuan_thn5'] = $pi->satuan_thn5;
						$data6['satuan_thn6'] = $pi->satuan_thn6;
						$data6['target_thn1'] = $pi->target_thn1;
						$data6['target_thn2'] = $pi->target_thn2;
						$data6['target_thn3'] = $pi->target_thn3;
						$data6['target_thn4'] = $pi->target_thn4;
						$data6['target_thn5'] = $pi->target_thn5;
						$data6['target_thn6'] = $pi->target_thn6;
						$data6['definisi_operasional'] = $pi->definisi_operasional;
						$data6['formulasi'] = $pi->formulasi;
						$data6['date_modified'] = date('d-M-y H:i:s');
						$this->m_pd_indikator_program->save($data6);
					}


					$data_kegiatan[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] = $this->m_pd_sub_kegiatan->select_kegiatan($unit_id_lama, $s->id, $p->kode_program, $p->kode_urusan, $p->kode_bidang_urusan);
					///ini kalo tanpa penunjang
					// $data_kegiatan[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] = $this->m_pd_bidang_urusan->select_kegiatan_berdasar_pd_baru($id_sasaran, $unit_id_lama, $unit_id_baru);
					foreach ($data_kegiatan[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] as $k) {
						$where_indikator_kegiatan['id_sasaran'] = $s->id;
						$where_indikator_kegiatan['kode_urusan'] = $k->kode_urusan;
						$where_indikator_kegiatan['kode_bidang_urusan'] = $k->kode_bidang_urusan;
						$where_indikator_kegiatan['kode_program'] = $k->kode_program;
						$where_indikator_kegiatan['kode_kegiatan'] = $k->kode_kegiatan;
						$where_indikator_kegiatan['is_hapus'] = 'f';
						$where_indikator_kegiatan['unit_id'] = $k->unit_id;
						$data_kegiatani[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program][$k->kode_kegiatan] = $this->m_pd_indikator_kegiatan->get_by($where_indikator_kegiatan,"result", NULL, NuLL, 'id');

						foreach ($data_kegiatani[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program][$k->kode_kegiatan] as $ki) {
							$data7['unit_id'] = $unit_id_baru;
							$data7['id_sasaran'] = $id_sasaran_baru;
							$data7['txt'] = $ki->txt;
							$data7['user_id'] = $ki->user_id;
							$data7['kode_urusan'] = $ki->kode_urusan;
							$data7['kode_bidang_urusan'] = $ki->kode_bidang_urusan;
							$data7['kode_program'] = $ki->kode_program;
							$data7['kode_kegiatan'] = $ki->kode_kegiatan;
							$data7['satuan_thn1'] = $ki->satuan_thn1;
							$data7['satuan_thn2'] = $ki->satuan_thn2;
							$data7['satuan_thn3'] = $ki->satuan_thn3;
							$data7['satuan_thn4'] = $ki->satuan_thn4;
							$data7['satuan_thn5'] = $ki->satuan_thn5;
							$data7['satuan_thn6'] = $ki->satuan_thn6;
							$data7['target_thn1'] = $ki->target_thn1;
							$data7['target_thn2'] = $ki->target_thn2;
							$data7['target_thn3'] = $ki->target_thn3;
							$data7['target_thn4'] = $ki->target_thn4;
							$data7['target_thn5'] = $ki->target_thn5;
							$data7['target_thn6'] = $ki->target_thn6;
							$data7['definisi_operasional'] = $ki->definisi_operasional;
							$data7['formulasi'] = $ki->formulasi;
							$data7['date_modified'] = date('d-M-y H:i:s');
							$this->m_pd_indikator_kegiatan->save($data7);
						}
					}
				}
			}
		}

		echo date('d-M-y H:i:s');
		echo "<br>";
		echo "selesai";
	}

	public function update_pd_baru_tanpa($unit_id_baru,$unit_id_lama)
	{
		$where_tujuan['unit_id'] = $unit_id_lama;
		$where_tujuan['is_hapus'] = 'f';
		$data_tujuan = $this->m_pd_tujuan->get_by($where_tujuan,'result', NULL, NULL, 'id');

		foreach ($data_tujuan as $t) {
			$data['id_kota_sasaran'] = $t->id_kota_sasaran;
			$data['unit_id'] = $unit_id_baru;
			$data['txt'] = $t->txt;
			$data['user_id'] = $t->user_id;
			$data['date_modified'] = date('d-M-y H:i:s');
			$this->m_pd_tujuan->save($data);
			$id_tujuan_baru = $this->db->insert_id();

			$where_tujuani['id_tujuan'] = $t->id;
			$where_tujuani['unit_id'] = $t->unit_id;
			$where_tujuani['is_hapus'] = 'f';
			$data_tujuani[$t->id] = $this->m_pd_indikator_tujuan->get_by($where_tujuani,'result', NULL, NULL, 'id');
			foreach ($data_tujuani[$t->id] as $ti) {
				$data1['unit_id'] = $unit_id_baru;
				$data1['id_tujuan'] = $id_tujuan_baru;
				$data1['txt'] = $ti->txt;
				$data1['user_id'] = $ti->user_id;
				$data1['satuan_thn1'] = $ti->satuan_thn1;
				$data1['satuan_thn2'] = $ti->satuan_thn2;
				$data1['satuan_thn3'] = $ti->satuan_thn3;
				$data1['satuan_thn4'] = $ti->satuan_thn4;
				$data1['satuan_thn5'] = $ti->satuan_thn5;
				$data1['satuan_thn6'] = $ti->satuan_thn6;
				$data1['target_thn1'] = $ti->target_thn1;
				$data1['target_thn2'] = $ti->target_thn2;
				$data1['target_thn3'] = $ti->target_thn3;
				$data1['target_thn4'] = $ti->target_thn4;
				$data1['target_thn5'] = $ti->target_thn5;
				$data1['target_thn6'] = $ti->target_thn6;
				$data1['definisi_operasional'] = $ti->definisi_operasional;
				$data1['formulasi'] = $ti->formulasi;
				$data1['id_kota_indikator_sasaran'] = $ti->id_kota_indikator_sasaran;
				$data1['id_kota_sasaran'] = $ti->id_kota_sasaran;
				$data1['date_modified'] = date('d-M-y H:i:s');
				$this->m_pd_indikator_tujuan->save($data1);
			}

			$where_sasaran['id_tujuan'] = $t->id;
			$where_sasaran['unit_id'] = $t->unit_id;
			$where_sasaran['is_hapus'] = 'f';
			$data_sasaran[$t->id] = $this->m_pd_sasaran->get_by($where_sasaran,'result', NULL, NULL, 'id');

			foreach ($data_sasaran[$t->id] as $s) {
				$data2['id_tujuan'] = $id_tujuan_baru;
				$data2['id_kota_sasaran'] = $s->id_kota_sasaran;
				$data2['unit_id'] = $unit_id_baru;
				$data2['txt'] = $s->txt;
				$data2['user_id'] = $s->user_id;
				$data2['date_modified'] = date('d-M-y H:i:s');
				$this->m_pd_sasaran->save($data2);
				$id_sasaran_baru = $this->db->insert_id();

				$where_sasarani['id_sasaran'] = $s->id;
				$where_sasarani['unit_id'] = $s->unit_id;
				$where_sasarani['is_hapus'] = 'f';
				$data_sasarani[$t->id][$s->id] = $this->m_pd_indikator_sasaran->get_by($where_sasarani,'result', NULL, NULL, 'id');
				foreach ($data_sasarani[$t->id][$s->id] as $si) {
					$data3['unit_id'] = $unit_id_baru;
					$data3['id_sasaran'] = $id_sasaran_baru;
					$data3['txt'] = $si->txt;
					$data3['user_id'] = $si->user_id;
					$data3['satuan_thn1'] = $si->satuan_thn1;
					$data3['satuan_thn2'] = $si->satuan_thn2;
					$data3['satuan_thn3'] = $si->satuan_thn3;
					$data3['satuan_thn4'] = $si->satuan_thn4;
					$data3['satuan_thn5'] = $si->satuan_thn5;
					$data3['satuan_thn6'] = $si->satuan_thn6;
					$data3['target_thn1'] = $si->target_thn1;
					$data3['target_thn2'] = $si->target_thn2;
					$data3['target_thn3'] = $si->target_thn3;
					$data3['target_thn4'] = $si->target_thn4;
					$data3['target_thn5'] = $si->target_thn5;
					$data3['target_thn6'] = $si->target_thn6;
					$data3['definisi_operasional'] = $si->definisi_operasional;
					$data3['formulasi'] = $si->formulasi;
					$data3['date_modified'] = date('d-M-y H:i:s');
					$this->m_pd_indikator_sasaran->save($data3);
				}

				// $where_subkeg['id_sasaran'] = $s->id;
				// $where_subkeg['unit_id'] = $s->unit_id;
				// $where_subkeg['is_hapus'] = 'f';
				// $data_subkeg[$t->id][$s->id] = $this->m_pd_sub_kegiatan->get_by($where_subkeg,'result', NULL, NULL, 'id');
				///ini kalo tanpa penunjang
				$data_subkeg[$t->id][$s->id] = $this->m_pd_bidang_urusan->select_subkeg_berdasar_pd_baru($s->id, $unit_id_lama, $unit_id_baru);

				foreach ($data_subkeg[$t->id][$s->id] as $sk) {
					$data4['id_sasaran'] = $id_sasaran_baru;
					$data4['unit_id'] = $unit_id_baru;
					$data4['user_id'] = $sk->user_id;
					$data4['kode_urusan'] = $sk->kode_urusan;
					$data4['urusan'] = $sk->urusan;
					$data4['kode_bidang_urusan'] = $sk->kode_bidang_urusan;
					$data4['bidang_urusan'] = $sk->bidang_urusan;
					$data4['kode_program'] = $sk->kode_program;
					$data4['program'] = $sk->program;
					$data4['kode_kegiatan'] = $sk->kode_kegiatan;
					$data4['kegiatan'] = $sk->kegiatan;
					$data4['kode_sub_kegiatan'] = $sk->kode_sub_kegiatan;
					$data4['sub_kegiatan'] = $sk->sub_kegiatan;
					$data4['catatan_subkegiatan'] = $sk->catatan_subkegiatan;
					$data4['tag_id_kdh'] = $sk->tag_id_kdh;
					$data4['kode_urusan_sipd'] = $sk->kode_urusan_sipd;
					$data4['urusan_sipd'] = $sk->urusan_sipd;
					$data4['kode_bidang_urusan_sipd'] = $sk->kode_bidang_urusan_sipd;
					$data4['bidang_urusan_sipd'] = $sk->kode_urusan_sipd;
					$data4['date_modified'] = date('d-M-y H:i:s');
					$this->m_pd_sub_kegiatan->save($data4);
					$id_subkeg_baru = $this->db->insert_id();

					$where_subkegi['id_sub_kegiatan'] = $sk->id;
					$where_subkegi['unit_id'] = $sk->unit_id;
					$where_subkegi['is_hapus'] = 'f';
					$data_subkegi[$t->id][$s->id][$sk->id] = $this->m_pd_indikator_sub_kegiatan->get_by($where_subkegi,'result', NULL, NULL, 'id');
					foreach ($data_subkegi[$t->id][$s->id][$sk->id] as $ski) {
						$data5['unit_id'] = $unit_id_baru;
						$data5['id_sub_kegiatan'] = $id_subkeg_baru;
						$data5['id_sasaran'] = $id_sasaran_baru;
						$data5['txt'] = $ski->txt;
						$data5['user_id'] = $ski->user_id;
						$data5['satuan_thn1'] = $ski->satuan_thn1;
						$data5['satuan_thn2'] = $ski->satuan_thn2;
						$data5['satuan_thn3'] = $ski->satuan_thn3;
						$data5['satuan_thn4'] = $ski->satuan_thn4;
						$data5['satuan_thn5'] = $ski->satuan_thn5;
						$data5['satuan_thn6'] = $ski->satuan_thn6;
						$data5['target_thn1'] = $ski->target_thn1;
						$data5['target_thn2'] = $ski->target_thn2;
						$data5['target_thn3'] = $ski->target_thn3;
						$data5['target_thn4'] = $ski->target_thn4;
						$data5['target_thn5'] = $ski->target_thn5;
						$data5['target_thn6'] = $ski->target_thn6;
						$data5['definisi_operasional'] = $ski->definisi_operasional;
						$data5['formulasi'] = $ski->formulasi;
						$data5['date_modified'] = date('d-M-y H:i:s');
						$this->m_pd_indikator_sub_kegiatan->save($data5);
					}
				}

				// $data_program[$t->id][$s->id] = $this->m_pd_sub_kegiatan->select_program($unit_id_lama, $s->id);
				///ini kalo tanpa penunjang
				$data_program[$t->id][$s->id] = $this->m_pd_bidang_urusan->select_program_berdasar_pd_baru($s->id, $unit_id_lama, $unit_id_baru);
				foreach ($data_program[$t->id][$s->id] as $p) {
					$where_indikator_program['id_sasaran'] = $s->id;
					$where_indikator_program['kode_urusan'] = $p->kode_urusan;
					$where_indikator_program['kode_bidang_urusan'] = $p->kode_bidang_urusan;
					$where_indikator_program['kode_program'] = $p->kode_program;
					$where_indikator_program['is_hapus'] = 'f';
					$where_indikator_program['unit_id'] = $p->unit_id;
					$data_programi[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] = $this->m_pd_indikator_program->get_by($where_indikator_program,"result", NULL, NuLL, 'id');

					foreach ($data_programi[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] as $pi) {
						$data6['unit_id'] = $unit_id_baru;
						$data6['id_sasaran'] = $id_sasaran_baru;
						$data6['txt'] = $pi->txt;
						$data6['user_id'] = $pi->user_id;
						$data6['kode_urusan'] = $pi->kode_urusan;
						$data6['kode_bidang_urusan'] = $pi->kode_bidang_urusan;
						$data6['kode_program'] = $pi->kode_program;
						$data6['kode_urusan_sipd'] = $pi->kode_urusan_sipd;
						$data6['urusan_sipd'] = $pi->urusan_sipd;
						$data6['kode_bidang_urusan_sipd'] = $pi->kode_bidang_urusan_sipd;
						$data6['bidang_urusan_sipd'] = $pi->bidang_urusan_sipd;
						$data6['satuan_thn1'] = $pi->satuan_thn1;
						$data6['satuan_thn2'] = $pi->satuan_thn2;
						$data6['satuan_thn3'] = $pi->satuan_thn3;
						$data6['satuan_thn4'] = $pi->satuan_thn4;
						$data6['satuan_thn5'] = $pi->satuan_thn5;
						$data6['satuan_thn6'] = $pi->satuan_thn6;
						$data6['target_thn1'] = $pi->target_thn1;
						$data6['target_thn2'] = $pi->target_thn2;
						$data6['target_thn3'] = $pi->target_thn3;
						$data6['target_thn4'] = $pi->target_thn4;
						$data6['target_thn5'] = $pi->target_thn5;
						$data6['target_thn6'] = $pi->target_thn6;
						$data6['definisi_operasional'] = $pi->definisi_operasional;
						$data6['formulasi'] = $pi->formulasi;
						$data6['date_modified'] = date('d-M-y H:i:s');
						$this->m_pd_indikator_program->save($data6);
					}


					// $data_kegiatan[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] = $this->m_pd_sub_kegiatan->select_kegiatan($unit_id_lama, $s->id, $p->kode_program, $p->kode_urusan, $p->kode_bidang_urusan);
					///ini kalo tanpa penunjang
					$data_kegiatan[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] = $this->m_pd_bidang_urusan->select_kegiatan_berdasar_pd_baru($s->id, $unit_id_lama, $unit_id_baru);
					foreach ($data_kegiatan[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program] as $k) {
						$where_indikator_kegiatan['id_sasaran'] = $s->id;
						$where_indikator_kegiatan['kode_urusan'] = $k->kode_urusan;
						$where_indikator_kegiatan['kode_bidang_urusan'] = $k->kode_bidang_urusan;
						$where_indikator_kegiatan['kode_program'] = $k->kode_program;
						$where_indikator_kegiatan['kode_kegiatan'] = $k->kode_kegiatan;
						$where_indikator_kegiatan['is_hapus'] = 'f';
						$where_indikator_kegiatan['unit_id'] = $k->unit_id;
						$data_kegiatani[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program][$k->kode_kegiatan] = $this->m_pd_indikator_kegiatan->get_by($where_indikator_kegiatan,"result", NULL, NuLL, 'id');

						foreach ($data_kegiatani[$t->id][$s->id][$p->kode_urusan][$p->kode_bidang_urusan][$p->kode_program][$k->kode_kegiatan] as $ki) {
							$data7['unit_id'] = $unit_id_baru;
							$data7['id_sasaran'] = $id_sasaran_baru;
							$data7['txt'] = $ki->txt;
							$data7['user_id'] = $ki->user_id;
							$data7['kode_urusan'] = $ki->kode_urusan;
							$data7['kode_bidang_urusan'] = $ki->kode_bidang_urusan;
							$data7['kode_program'] = $ki->kode_program;
							$data7['kode_kegiatan'] = $ki->kode_kegiatan;
							$data7['satuan_thn1'] = $ki->satuan_thn1;
							$data7['satuan_thn2'] = $ki->satuan_thn2;
							$data7['satuan_thn3'] = $ki->satuan_thn3;
							$data7['satuan_thn4'] = $ki->satuan_thn4;
							$data7['satuan_thn5'] = $ki->satuan_thn5;
							$data7['satuan_thn6'] = $ki->satuan_thn6;
							$data7['target_thn1'] = $ki->target_thn1;
							$data7['target_thn2'] = $ki->target_thn2;
							$data7['target_thn3'] = $ki->target_thn3;
							$data7['target_thn4'] = $ki->target_thn4;
							$data7['target_thn5'] = $ki->target_thn5;
							$data7['target_thn6'] = $ki->target_thn6;
							$data7['definisi_operasional'] = $ki->definisi_operasional;
							$data7['formulasi'] = $ki->formulasi;
							$data7['date_modified'] = date('d-M-y H:i:s');
							$this->m_pd_indikator_kegiatan->save($data7);
						}
					}
				}
			}
		}

		echo date('d-M-y H:i:s');
		echo "<br>";
		echo "selesai";
	}

	public function update_pd_baru_replace($unit_id_baru,$unit_id_lama)
	{
		if (strpos($unit_id, 'Z0')  === FALSE ) {
			echo 'PD Lama.';
		} else {
			$this->m_view_pd->update_delete($unit_id);
			echo "Selesai.";
		}
	}

	public function delete_pd_baru($unit_id)
	{
		if (strpos($unit_id, 'Z0')  === FALSE ) {
			echo 'PD Lama.';
		} else {
			$this->m_view_pd->update_delete($unit_id);
			echo "Selesai.";
		}
	}

	public function cek_tgl()
	{
		echo date('d-M-y H:i:s');
	}

	public function logon()
	{	
		// $this->load->view('login', $this->data);
		$this->load->view('contents/5/logon', $this->data);
	}

	//Strategi + Masalah dan isu
	public function pohon_kota()
	{

		$data_isi = $this->m_tag_indikator_kota->get('row');
		$data_masalah = $this->m_tag_indikator_kota->masalah();

		$array_link = array('name' => '', 'nodeName' => '', 'direction' => 'ASYN');

		$data_json['tree']['nodeName'] = 'VISI';
		$data_json['tree']['name'] = $data_isi->visi;
		$data_json['tree']['type'] = 'type1';
		$data_json['tree']['code'] = '';
		$data_json['tree']['label'] = 'Visi';
		$data_json['tree']['version'] = '-';
		$data_json['tree']['link'] = $array_link;

		foreach ($data_masalah as $i => $row_i) {
			$_masalah[$i] = $row_i;
			$_isu[$row_i['id_masalah']] = $this->m_tag_indikator_kota->isu($row_i['id_masalah']);
			foreach ($_isu[$row_i['id_masalah']] as $t => $row_t) {
				$_misi[$row_i['id_masalah']][$row_t['id_isu']] = $this->m_tag_indikator_kota->misi2($row_t['id_isu']);
				foreach ($_misi[$row_i['id_masalah']][$row_t['id_isu']] as $it => $row_it) {
					$_tujuan[$row_it['id_misi']] = $this->m_tag_indikator_kota->tujuan($row_it['id_misi']);
					foreach ($_tujuan[$row_it['id_misi']] as $key_stra => $row_stra) {
						$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']] = $this->m_tag_indikator_kota->sasaran($row_stra['id_indikator_tujuan']);
						foreach ($_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']] as $key_sas => $row_sas) {
							
							$_strategi[$row_sas['id_indikator_sasaran']] = $this->m_tag_indikator_kota->strategi($row_sas['id_indikator_sasaran']);
							foreach ($_strategi[$row_sas['id_indikator_sasaran']] as $key_strategi => $row_strategi) {
								
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['children'] = [];
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['nodeName'] = 'STRATEGI';
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['type'] = 'type5';
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['code'] = '';
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['label'] = 'Strategi';
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['link'] = $array_link;
							}

							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['children'] = $_strategi[$row_sas['id_indikator_sasaran']];
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['nodeName'] = 'SASARAN';
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['type'] = 'type5';
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['code'] = '';
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['label'] = 'Sasaran';
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['link'] = $array_link;
						}

						$_tujuan[$row_it['id_misi']][$key_stra]['nodeName'] = 'TUJUAN';
						$_tujuan[$row_it['id_misi']][$key_stra]['type'] = 'type5';
						$_tujuan[$row_it['id_misi']][$key_stra]['code'] = '';
						$_tujuan[$row_it['id_misi']][$key_stra]['label'] = 'Tujuan';
						$_tujuan[$row_it['id_misi']][$key_stra]['link'] = $array_link;
						$_tujuan[$row_it['id_misi']][$key_stra]['children'] = $_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']];
					}

					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['nodeName'] = 'MISI';
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['type'] = 'type4';
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['code'] = '';
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['label'] = 'Misi';
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['link'] = $array_link;
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['children'] = $_tujuan[$row_it['id_misi']];
				}
				$_isu[$row_i['id_masalah']][$t]['nodeName'] = 'ISU STRATEGIS';
				$_isu[$row_i['id_masalah']][$t]['type'] = 'type3';
				$_isu[$row_i['id_masalah']][$t]['code'] = '';
				$_isu[$row_i['id_masalah']][$t]['label'] = 'Isu Strategis';
				$_isu[$row_i['id_masalah']][$t]['link'] = $array_link;
				$_isu[$row_i['id_masalah']][$t]['children'] = $_misi[$row_i['id_masalah']][$row_t['id_isu']];
			}
			$_masalah[$i]['nodeName'] = 'PERMASALAHAN';
			$_masalah[$i]['type'] = 'type2';
			$_masalah[$i]['code'] = '';
			$_masalah[$i]['label'] = 'Permasalahan';
			$_masalah[$i]['version'] = '-';
			$_masalah[$i]['link'] = $array_link;
			$_masalah[$i]['children'] = $_isu[$row_i['id_masalah']];
		}

		$data_json['tree']['children'] = $_masalah;
		echo json_encode($data_json);

		$fp = fopen('./uploaded/pohon_kota_.json', 'w');
	    fwrite($fp, json_encode($data_json));
	}

	public function pohon_kota_jh()
	{

		$data_isi = $this->m_tag_indikator_kota->get('row');
		$data_masalah = $this->m_tag_indikator_kota->masalah();

		$array_link = array('name' => '', 'nodeName' => '', 'direction' => 'ASYN');

		$data_json['head'] = '-';
		$data_json['contents'] = 'KOTA SURABAYA';
		$data_json['version'] = '-';
		$data_json['id'] = 'aa';

		foreach ($data_masalah as $i => $row_i) {
			$_masalah[$i] = $row_i;
			$_isu[$row_i['id_masalah']] = $this->m_tag_indikator_kota->isu($row_i['id_masalah']);
			foreach ($_isu[$row_i['id_masalah']] as $t => $row_t) {
				$_misi[$row_i['id_masalah']][$row_t['id_isu']] = $this->m_tag_indikator_kota->misi2($row_t['id_isu']);
				foreach ($_misi[$row_i['id_masalah']][$row_t['id_isu']] as $it => $row_it) {
					$_tujuan[$row_it['id_misi']] = $this->m_tag_indikator_kota->tujuan($row_it['id_misi']);
					foreach ($_tujuan[$row_it['id_misi']] as $key_stra => $row_stra) {
						$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']] = $this->m_tag_indikator_kota->sasaran($row_stra['id_indikator_tujuan']);
						foreach ($_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']] as $key_sas => $row_sas) {
							
							$_strategi[$row_sas['id_indikator_sasaran']] = $this->m_tag_indikator_kota->strategi($row_sas['id_indikator_sasaran']);
							foreach ($_strategi[$row_sas['id_indikator_sasaran']] as $key_strategi => $row_strategi) {

								$_program[$row_strategi['id_strategi']] = $this->m_tag_indikator_kota->program($row_strategi['id_strategi']);
								foreach ($_program[$row_strategi['id_strategi']] as $key_program => $row_program) {
									
									$_program[$row_strategi['id_strategi']][$key_program]['head'] = 'PROGRAM';
									$_program[$row_strategi['id_strategi']][$key_program]['id'] = $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'].'-'.$row_sas['id_'].'-'.$row_strategi['id_'].'-'.$row_program['id_'];
									$_program[$row_strategi['id_strategi']][$key_program]['children'] = [];
								}
								
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['head'] = 'STRATEGI';
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['id'] = $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'].'-'.$row_sas['id_'].'-'.$row_strategi['id_'];
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['children'] = $_program[$row_strategi['id_strategi']];
							}

							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['head'] = 'SASARAN';
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['id'] = $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'].'-'.$row_sas['id_'];
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['children'] = $_strategi[$row_sas['id_indikator_sasaran']];
						}

						$_tujuan[$row_it['id_misi']][$key_stra]['head'] = 'TUJUAN';
						$_tujuan[$row_it['id_misi']][$key_stra]['id'] =  $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'];
						$_tujuan[$row_it['id_misi']][$key_stra]['children'] = $_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']];
					}

					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['head'] = 'MISI';
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['id'] =  $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'];
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['children'] = $_tujuan[$row_it['id_misi']];
				}
				$_isu[$row_i['id_masalah']][$t]['head'] = 'ISU STRATEGIS';
				$_isu[$row_i['id_masalah']][$t]['id'] = $row_i['id_'].'-'.$row_t['id_'];
				$_isu[$row_i['id_masalah']][$t]['children'] = $_misi[$row_i['id_masalah']][$row_t['id_isu']];
			}
			$_masalah[$i]['head'] = 'PERMASALAHAN';
			$_masalah[$i]['id'] = $row_i['id_'];
			$_masalah[$i]['children'] = $_isu[$row_i['id_masalah']];
		}

		$data_json['children'] = $_masalah;

		$jison[0] = $data_json;
		echo json_encode($jison);

		$fp = fopen('./uploaded/pohon_kota_jh.json', 'w');
	    fwrite($fp, json_encode($jison));
		// if ( ! write_file('./uploaded/pohon_kota_jh.json', $arr))
		// {
		// 	echo 'Unable to write the file';
		// }
		// 	else
		// {
		// 	echo 'file written';
		// }   
	}

	public function pohon_kota_jh_tanpa_strategi()
	{

		$data_isi = $this->m_tag_indikator_kota->get('row');
		$data_masalah = $this->m_tag_indikator_kota->masalah();

		$array_link = array('name' => '', 'nodeName' => '', 'direction' => 'ASYN');

		$data_json['head'] = '-';
		$data_json['contents'] = 'KOTA SURABAYA';
		$data_json['version'] = '-';
		$data_json['id'] = 'aa';

		foreach ($data_masalah as $i => $row_i) {
			$_masalah[$i] = $row_i;
			$_isu[$row_i['id_masalah']] = $this->m_tag_indikator_kota->isu($row_i['id_masalah']);
			foreach ($_isu[$row_i['id_masalah']] as $t => $row_t) {
				$_misi[$row_i['id_masalah']][$row_t['id_isu']] = $this->m_tag_indikator_kota->misi2($row_t['id_isu']);
				foreach ($_misi[$row_i['id_masalah']][$row_t['id_isu']] as $it => $row_it) {
					$_tujuan[$row_it['id_misi']] = $this->m_tag_indikator_kota->tujuan($row_it['id_misi']);
					foreach ($_tujuan[$row_it['id_misi']] as $key_stra => $row_stra) {
						$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']] = $this->m_tag_indikator_kota->sasaran($row_stra['id_indikator_tujuan']);
						foreach ($_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']] as $key_sas => $row_sas) {
							
							$_strategi[$row_sas['id_indikator_sasaran']] = $this->m_tag_indikator_kota->strategi($row_sas['id_indikator_sasaran']);
							foreach ($_strategi[$row_sas['id_indikator_sasaran']] as $key_strategi => $row_strategi) {

								$_program[$row_strategi['id_strategi']] = $this->m_tag_indikator_kota->program($row_strategi['id_strategi']);
								foreach ($_program[$row_strategi['id_strategi']] as $key_program => $row_program) {
									
									$_program[$row_strategi['id_strategi']][$key_program]['head'] = 'PROGRAM';
									$_program[$row_strategi['id_strategi']][$key_program]['id'] = $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'].'-'.$row_sas['id_'].'-'.$row_strategi['id_'].'-'.$row_program['id_'];
									$_program[$row_strategi['id_strategi']][$key_program]['children'] = [];
								}
								
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['head'] = 'STRATEGI';
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['id'] = $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'].'-'.$row_sas['id_'].'-'.$row_strategi['id_'];
								$_strategi[$row_sas['id_indikator_sasaran']][$key_strategi]['children'] = $_program[$row_strategi['id_strategi']];
							}

							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['head'] = 'SASARAN';
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['id'] = $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'].'-'.$row_sas['id_'];
							$_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']][$key_sas]['children'] = $_strategi[$row_sas['id_indikator_sasaran']];
						}

						$_tujuan[$row_it['id_misi']][$key_stra]['head'] = 'TUJUAN';
						$_tujuan[$row_it['id_misi']][$key_stra]['id'] =  $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'].'-'.$row_stra['id_'];
						$_tujuan[$row_it['id_misi']][$key_stra]['children'] = $_sasaran[$row_it['id_misi']][$row_stra['id_indikator_tujuan']];
					}

					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['head'] = 'MISI';
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['id'] =  $row_i['id_'].'-'.$row_t['id_'].'-'.$row_it['id_'];
					$_misi[$row_i['id_masalah']][$row_t['id_isu']][$it]['children'] = $_tujuan[$row_it['id_misi']];
				}
				$_isu[$row_i['id_masalah']][$t]['head'] = 'ISU STRATEGIS';
				$_isu[$row_i['id_masalah']][$t]['id'] = $row_i['id_'].'-'.$row_t['id_'];
				$_isu[$row_i['id_masalah']][$t]['children'] = $_misi[$row_i['id_masalah']][$row_t['id_isu']];
			}
			$_masalah[$i]['head'] = 'PERMASALAHAN';
			$_masalah[$i]['id'] = $row_i['id_'];
			$_masalah[$i]['children'] = $_isu[$row_i['id_masalah']];
		}

		$data_json['children'] = $_masalah;

		$jison[0] = $data_json;
		echo json_encode($jison);

		$fp = fopen('./uploaded/pohon_kota_jh.json', 'w');
	    fwrite($fp, json_encode($jison));
		if ( ! write_file('./uploaded/pohon_kota_jh.json', $arr))
		{
			echo 'Unable to write the file';
		}
			else
		{
			echo 'file written';
		}   
	}

	//Strategi
	// public function pohon_kota()
	// {

	// 	$data_isi = $this->m_tag_indikator_kota->get('row');
	// 	$data_misi = $this->m_tag_indikator_kota->misi();

	// 	$array_link = array('name' => '', 'nodeName' => '', 'direction' => 'ASYN');

	// 	$data_json['tree']['nodeName'] = 'VISI';
	// 	$data_json['tree']['name'] = $data_isi->visi;
	// 	$data_json['tree']['type'] = 'type1';
	// 	$data_json['tree']['code'] = '';
	// 	$data_json['tree']['label'] = 'Visi';
	// 	$data_json['tree']['version'] = '-';
	// 	$data_json['tree']['link'] = $array_link;

	// 	foreach ($data_misi as $i => $row_i) {
	// 		$_misi[$i] = $row_i;
	// 		$_tujuan[$row_i['id_misi']] = $this->m_tag_indikator_kota->tujuan($row_i['id_misi']);
	// 		foreach ($_tujuan[$row_i['id_misi']] as $t => $row_t) {
	// 			$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']] = $this->m_tag_indikator_kota->sasaran($row_t['id_indikator_tujuan']);
	// 			foreach ($_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']] as $it => $row_it) {
	// 				$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']] = $this->m_tag_indikator_kota->strategi($row_it['id_indikator_sasaran']);
	// 				foreach ($_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']] as $key_stra => $row_stra) {
	// 					$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['children'] = [];
	// 					$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['nodeName'] = 'STRATEGI';
	// 					$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['type'] = 'type5';
	// 					$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['code'] = '';
	// 					$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['label'] = 'Strategi';
	// 					$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['link'] = $array_link;
	// 				}

	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['nodeName'] = 'SASARAN';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['type'] = 'type4';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['code'] = '';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['label'] = 'Sasaran';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['link'] = $array_link;
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['children'] = $_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']];
	// 			}
	// 			$_tujuan[$row_i['id_misi']][$t]['nodeName'] = 'TUJUAN';
	// 			$_tujuan[$row_i['id_misi']][$t]['type'] = 'type3';
	// 			$_tujuan[$row_i['id_misi']][$t]['code'] = '';
	// 			$_tujuan[$row_i['id_misi']][$t]['label'] = 'Tujuan';
	// 			$_tujuan[$row_i['id_misi']][$t]['link'] = $array_link;
	// 			$_tujuan[$row_i['id_misi']][$t]['children'] = $_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']];
	// 		}
	// 		$_misi[$i]['nodeName'] = 'MISI';
	// 		$_misi[$i]['type'] = 'type2';
	// 		$_misi[$i]['code'] = '';
	// 		$_misi[$i]['label'] = 'Misi';
	// 		$_misi[$i]['version'] = '-';
	// 		$_misi[$i]['link'] = $array_link;
	// 		$_misi[$i]['children'] = $_tujuan[$row_i['id_misi']];
	// 	}

	// 	$data_json['tree']['children'] = $_misi;
	// 	echo json_encode($data_json);

	// 	$fp = fopen('./uploaded/pohon_kota.json', 'w');
	//     fwrite($fp, json_encode($data_json));
	//     // if ( ! write_file('./uploaded/pohon_kota.json', $arr))
	//     // {
	//     //     echo 'Unable to write the file';
	//     // }
	//     // else
	//     // {
	//     //     echo 'file written';
	//     // }   
	// }

	//Tanpa Strategi
	// public function pohon_kota()
	// {

	// 	$data_isi = $this->m_tag_indikator_kota->get('row');
	// 	$data_misi = $this->m_tag_indikator_kota->misi();

	// 	$array_link = array('name' => '', 'nodeName' => '', 'direction' => 'ASYN');

	// 	$data_json['tree']['nodeName'] = 'VISI';
	// 	$data_json['tree']['name'] = $data_isi->visi;
	// 	$data_json['tree']['type'] = 'type1';
	// 	$data_json['tree']['code'] = '';
	// 	$data_json['tree']['label'] = 'Visi';
	// 	$data_json['tree']['version'] = '-';
	// 	$data_json['tree']['link'] = $array_link;

	// 	foreach ($data_misi as $i => $row_i) {
	// 		$_misi[$i] = $row_i;
	// 		$_tujuan[$row_i['id_misi']] = $this->m_tag_indikator_kota->tujuan($row_i['id_misi']);
	// 		foreach ($_tujuan[$row_i['id_misi']] as $t => $row_t) {
	// 			$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']] = $this->m_tag_indikator_kota->sasaran($row_t['id_indikator_tujuan']);
	// 			foreach ($_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']] as $it => $row_it) {
	// 				$_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']] = $this->m_tag_indikator_kota->program($row_it['id_indikator_sasaran']);
	// 				foreach ($_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']] as $key_stra => $row_stra) {
	// 					$_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['children'] = [];
	// 					$_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['nodeName'] = 'PROGRAM';
	// 					$_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['type'] = 'type5';
	// 					// $_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['code'] = '';
	// 					$_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['label'] = 'Program';
	// 					$_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['link'] = $array_link;
	// 				}

	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['nodeName'] = 'SASARAN';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['type'] = 'type4';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['code'] = '';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['label'] = 'Sasaran';
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['link'] = $array_link;
	// 				$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['children'] = $_program[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']];
	// 			}
	// 			$_tujuan[$row_i['id_misi']][$t]['nodeName'] = 'TUJUAN';
	// 			$_tujuan[$row_i['id_misi']][$t]['type'] = 'type3';
	// 			$_tujuan[$row_i['id_misi']][$t]['code'] = '';
	// 			$_tujuan[$row_i['id_misi']][$t]['label'] = 'Tujuan';
	// 			$_tujuan[$row_i['id_misi']][$t]['link'] = $array_link;
	// 			$_tujuan[$row_i['id_misi']][$t]['children'] = $_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']];
	// 		}
	// 		$_misi[$i]['nodeName'] = 'MISI';
	// 		$_misi[$i]['type'] = 'type2';
	// 		$_misi[$i]['code'] = '';
	// 		$_misi[$i]['label'] = 'Misi';
	// 		$_misi[$i]['version'] = '-';
	// 		$_misi[$i]['link'] = $array_link;
	// 		$_misi[$i]['children'] = $_tujuan[$row_i['id_misi']];
	// 	}

	// 	$data_json['tree']['children'] = $_misi;
	// 	// $this->data['jison'] = json_encode($data_json);
	// 	// echo $this->data['jison'];
		
	// 	echo json_encode($data_json);

	// 	$fp = fopen('./uploaded/pohon_kota.json', 'w');
	//     fwrite($fp, json_encode($data_json));
	//     // if ( ! write_file('./uploaded/pohon_kota.json', $arr))
	//     // {
	//     //     echo 'Unable to write the file';
	//     // }
	//     // else
	//     // {
	//     //     echo 'file written';
	//     // }   
	// }

	public function pohon_pd($unit_id)
	{
		$where_unit_id['unit_id'] = $unit_id;
		$pd = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$data_misi = $this->m_tag_indikator_kota->misi_pd($unit_id);

		$array_link = array('name' => '', 'nodeName' => '', 'direction' => 'ASYN');

		$data_json['tree']['nodeName'] = '-';
		$data_json['tree']['name'] = $pd->unit_name;
		$data_json['tree']['type'] = 'type3';
		$data_json['tree']['code'] = '';
		$data_json['tree']['label'] = 'PD';
		$data_json['tree']['version'] = 'PD';
		$data_json['tree']['link'] = $array_link;

		foreach ($data_misi as $i => $row_i) {
			$_misi[$i] = $row_i;
			$_tujuan[$row_i['id_misi']] = $this->m_tag_indikator_kota->tujuank_pd($unit_id, $row_i['id_misi']);
			foreach ($_tujuan[$row_i['id_misi']] as $t => $row_t) {
			// 	$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']] = $this->m_tag_indikator_kota->sasaran($row_t['id_indikator_tujuan']);
			// 	foreach ($_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']] as $it => $row_it) {
			// 		$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']] = $this->m_tag_indikator_kota->strategi($row_it['id_indikator_sasaran']);
			// 		foreach ($_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']] as $key_stra => $row_stra) {
			// 		// 	$_strategiumum[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$row_stra['id_strategi']] = $this->m_tag_indikator_kota->strategi_umum($row_stra['id_strategi']);

			// 			$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['children'] = [];
			// 			$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['nodeName'] = 'STRATEGI UMUM';
			// 			$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['type'] = 'type4';
			// 			$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['code'] = '';
			// 			$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['label'] = 'Strategi Umum';
			// 			$_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['link'] = $array_link;
			// 			// $_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$key_stra]['children'] = $_strategiumum[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']][$row_stra['id_strategi']];
			// 		}

			// 		$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['nodeName'] = 'SASARAN';
			// 		$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['type'] = 'type3';
			// 		$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['code'] = '';
			// 		$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['label'] = 'Sasaran';
			// 		$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['link'] = $array_link;
			// 		$_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$it]['children'] = $_strategi[$row_i['id_misi']][$row_t['id_indikator_tujuan']][$row_it['id_indikator_sasaran']];
			// 	}
				$_tujuan[$row_i['id_misi']][$t]['nodeName'] = 'TUJUAN';
				$_tujuan[$row_i['id_misi']][$t]['type'] = 'type1';
				$_tujuan[$row_i['id_misi']][$t]['code'] = '';
				$_tujuan[$row_i['id_misi']][$t]['label'] = 'Tujuan';
				$_tujuan[$row_i['id_misi']][$t]['link'] = $array_link;
				// $_tujuan[$row_i['id_misi']][$t]['children'] = $_sasaran[$row_i['id_misi']][$row_t['id_indikator_tujuan']];
			}
			$_misi[$i]['nodeName'] = 'MISI';
			$_misi[$i]['type'] = 'type2';
			$_misi[$i]['code'] = '';
			$_misi[$i]['label'] = 'Misi';
			$_misi[$i]['version'] = '-';
			$_misi[$i]['link'] = $array_link;
			$_misi[$i]['children'] = $_tujuan[$row_i['id_misi']];
		}

		$data_json['tree']['children'] = $_misi;
		$this->data['jison'] = json_encode($data_json, true);

		print_r($this->data['jison']);
	}

	public function view_pohon_kota()
	{	
		$this->data['unit_id'] = '';
		$this->load->view('contents/5/_pohon_full', $this->data);
	}

	public function view_pohon_kotav2()
	{	
		$this->data['unit_id'] = '';
		$this->load->view('contents/5/_pohon_full2', $this->data);
	}

	public function view_pohon_pd($unit_id)
	{	
		$this->data['unit_id'] = $unit_id;
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->load->view('contents/5/_pohon_full', $this->data);
	}

	public function info()
	{	
		echo phpinfo();
	}
}