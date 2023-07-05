// function test () {
// 	Pleasure.handleToastrSettings(true, "toast-top-full-width", false, "success", "true", null, "Test");
// }
var base_url = window.location.origin;
var base_url = base_url+"/deploy/"
var Gooder4 = {

	settings: {
		name: "Gooder Javascript",
		version: "1.0.0",

		paths: { 
			pd_tujuan_tipe: "dashboard/verif/pd_tujuan_tipe",
			pd_sasaran_tipe: "dashboard/verif/pd_sasaran_tipe",
			pd_program_tipe: "dashboard/verif/pd_program_tipe",
			pd_kegiatan_tipe: "dashboard/verif/pd_kegiatan_tipe",
			pd_sub_kegiatan_tipe: "dashboard/verif/pd_sub_kegiatan_tipe",
			narasi: "dashboard/verif/narasi",
			modal_kembali_narasi: "dashboard/verif/modal_kembali_narasi",
			aksi_kembali_narasi: "dashboard/verif/aksi_kembali_narasi",
			indikator: "dashboard/verif/indikator",
			modal_kembali_indikator: "dashboard/verif/modal_kembali_indikator",
			aksi_kembali_indikator: "dashboard/verif/aksi_kembali_indikator",
			refresh_indikator: "dashboard/verif/refresh_indikator",

			narasi_pd_tujuan_tipe: "dashboard/narasi/pd_tujuan_tipe",
			narasi_pd_sasaran_tipe: "dashboard/narasi/pd_sasaran_tipe",
			narasi_pd_program_tipe: "dashboard/narasi/pd_program_tipe",
			narasi_pd_kegiatan_tipe: "dashboard/narasi/pd_kegiatan_tipe",
			narasi_pd_sub_kegiatan_tipe: "dashboard/narasi/pd_sub_kegiatan_tipe",

			pd_program_: "dashboard/program/pd_program_",
			pd_kegiatan_: "dashboard/program/pd_kegiatan_",
			pd_sub_kegiatan_: "dashboard/program/pd_sub_kegiatan_",
			save_pd_program_: "dashboard/program/save_pd_program_",
			save_pd_kegiatan_: "dashboard/program/save_pd_kegiatan_",
			save_pd_sub_kegiatan_: "dashboard/program/save_pd_sub_kegiatan_",

			save_pd_tujuan_misi: "dashboard/deploy/save_pd_tujuan_misi",

			pd_sub_kegiatan2_: "dashboard/program/pd_sub_kegiatan2_",
			save_pd_sub_kegiatan2_: "dashboard/program/save_pd_sub_kegiatan2_",

			pd_sub_kegiatan3_: "dashboard/program/pd_sub_kegiatan3_",
			save_pd_sub_kegiatan3_: "dashboard/program/save_pd_sub_kegiatan3_",

			verif_pa: "dashboard/verif/pd_sub_kegiatan",
			modal_kembali: "dashboard/verif/modal_kembali",
			aksi_kembali: "dashboard/verif/aksi_kembali",
			
			modal_tag: "dashboard/verif/modal_tag",
			aksi_tag: "dashboard/verif/aksi_tag",
			modal_detil_tag: "dashboard/verif/modal_detil_tag",

			modal_upload_pendukung: "dashboard/verif/modal_upload_pendukung",
			modal_upload_pendukung_view: "dashboard/verif/modal_upload_pendukung_view",

			modal_tag_wa: "dashboard/verif/modal_tag_wa",
			aksi_tag_wa: "dashboard/verif/aksi_tag_wa",
			modal_view_kdh: "dashboard/verif/modal_view_kdh",

			modal_ka: "dashboard/dashboard/modal_ka",
			aksi_ka: "dashboard/dashboard/aksi_ka",

			modal_cluster: "dashboard/narasi/modal_cluster",
			aksi_cluster: "dashboard/narasi/aksi_cluster",
			modal_view_cluster: "dashboard/narasi/modal_view_cluster",

			modal_crosscut: "dashboard/narasi/modal_crosscut",
			aksi_crosscut: "dashboard/narasi/aksi_crosscut",
			modal_view_crosscut: "dashboard/narasi/modal_view_crosscut",

			modal_ket_cross: "dashboard/narasi/modal_ket_cross",
			aksi_ket_cross: "dashboard/narasi/aksi_ket_cross",
			modal_view_ket_cross: "dashboard/narasi/modal_view_ket_cross",


			modal_link: "dashboard/program/modal_link",
			aksi_link: "dashboard/program/aksi_link",
			modal_view_link: "dashboard/program/modal_view_link",

			modal_link_narasi: "dashboard/program/modal_link_narasi",
			aksi_link_narasi: "dashboard/program/aksi_link_narasi",
			modal_view_link_narasi: "dashboard/program/modal_view_link_narasi",

			rekap: "dashboard/admin/rekap",
			rekap_: "dashboard/admin/rekap_",
			rekap2: "dashboard/admin/rekap2",
			rekap2_: "dashboard/admin/rekap2_",
			rekap2_excel: "dashboard/admin/rekap2_excel",
			rekap3_: "dashboard/admin/rekap3_",
			rekap4_: "dashboard/admin/rekap4_",
			rekap5_: "dashboard/admin/rekap5_",
			rekap6_: "dashboard/admin/rekap6_",
			rekap7_: "dashboard/admin/rekap7_",
			rekap72_: "dashboard/admin/rekap72_",
			rekap73_: "dashboard/admin/rekap73_",
			rekap8_: "dashboard/admin/rekap8_",
			rekap9_: "dashboard/admin/rekap9_",
			rekap10_: "dashboard/admin/rekap10_",
			rekap11_: "dashboard/admin/rekap11_",
			rekap12_: "dashboard/admin/rekap12_",
			rekap13_: "dashboard/admin/rekap13_",
			rekap14_: "dashboard/admin/rekap14_",
			rekap14do_: "dashboard/admin/rekap14do_",
			rekap15_: "dashboard/admin/rekap15_",
			rekap16_: "dashboard/admin/rekap16_",
			rekap17_: "dashboard/admin/rekap17_",
			rekap18_: "dashboard/admin/rekap18_",
			rekap19_: "dashboard/admin/rekap19_",
			rekap20_: "dashboard/admin/rekap20_",
			rekap21_: "dashboard/admin/rekap21_",
			rekap22_: "dashboard/admin/rekap22_",
			rekap23_: "dashboard/admin/rekap23_",
			rekap24_: "dashboard/admin/rekap24_",
			rekap25_: "dashboard/admin/rekap25_",
			rekap26_: "dashboard/admin/rekap26_",
			rekap27_: "dashboard/admin/rekap27_",
			rekap28_: "dashboard/admin/rekap28_",
			rekap29_: "dashboard/admin/rekap29_",
			rekap152_: "dashboard/admin/rekap152_",
			rekap32_: "dashboard/admin/rekap32_",
			rekap42_: "dashboard/admin/rekap42_",
			rekap43_: "dashboard/admin/rekap43_",
			rekap4321_: "dashboard/admin/rekap4321_",
			rekap321_: "dashboard/admin/rekap321_",
			rekap3212_: "dashboard/admin/rekap3212_",
			rekap43212_: "dashboard/admin/rekap43212_",
			rekap82_: "dashboard/admin/rekap82_",
			rekap_dora_hitung: "dashboard/dora/rekap_hitung",
			rekap_dora_isi: "dashboard/dora/rekap_isi",
			rekap_dora: "dashboard/dora/rekap",
			rekapba_: "dashboard/admin/rekapba_",
			rekap_cascading_simple2: "dashboard/admin/rekap_cascading_simple2",
			rekap_cascading_simple3: "dashboard/admin/rekap_cascading_simple3",
			rekap_cascading_kota: "dashboard/admin/rekap_cascading_kota",
			rekap_cascading_kota2: "dashboard/admin/rekap_cascading_kota2",
			cascading_pd_: "dashboard/admin/cascading_pd_",
			cascading_pd_csf_: "dashboard/admin/cascading_pd_csf_",
			pohon_kinerja_kota: "dashboard/admin/pohon_kinerja_kota",
			pohon_kinerja_pd: "dashboard/admin/pohon_kinerja_pd",
			pohon_kinerja_pd_halaman: "dashboard/admin/pohon_kinerja_pd_halaman",
			rekap_level4_indikator: "dashboard/admin/rekap_level4_indikator",
			rekap_level4_bidang: "dashboard/admin/rekap_level4_bidang",
			tabel_pohon_kinerja: "dashboard/admin/tabel_pohon_kinerja",
			rekap_tabel_renstra: "dashboard/admin/rekap_tabel_renstra",
			rekap_bidang_renstra: "dashboard/admin/rekap_bidang_renstra",
			iku_pd: "dashboard/admin/iku_pd",
			koentji: "dashboard/admin/koentji",
			aksi_koentji: "dashboard/admin/aksi_koentji",

			view_rekap2: "dashboard/admin/view_rekap2",

			view_tag: "dashboard/dashboard/view_tag",
			view_kdh: "dashboard/admin/rekap10_",
			
			note: "dashboard/verif/note",
			aksi_note: "dashboard/verif/aksi_note",

			upload: "dashboard/upload/upload",
			isiUpload: "dashboard/upload/isiUpload",
			hapus: "dashboard/upload/hapus"
		},
	},

	pd_tujuan: function () {
		$('body').on('click', '#pd_tujuan_verif', function(event){
			$('.menu').removeClass('active');
			unit_id = $(this).attr('data-unit_id');
			login = $(this).attr('data-login');
			// alert(unit_id);
			$.ajax({
				url: Gooder4.settings.paths.pd_tujuan_tipe + '/' + login,
				data: {'unit_id': unit_id},
				type: 'POST',
				beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
			});
			$(this).addClass('active');
		});

		$('body').on('click', '.btn-buka-v-sasaran-pd', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			login = $(this).attr('data-login');

			$.ajax({
				url: Gooder4.settings.paths.pd_sasaran_tipe + '/' + login,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-sasaran-pd-"+id).fadeIn();
				},
				success: function(data){
					$("#div-sasaran-pd-"+id).html(data);
					$("#overlay-sasaran-pd-"+id).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-buka-v-sub-kegiatan-pd', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			login = $(this).attr('data-login');
			id_sasaran = $(this).attr('data-id_sasaran');
			kode_sub_kegiatans = $(this).attr('data-kode_kegiatans');

			kode = kode_sub_kegiatans.split('-');
			kode[3] = kode[3].replace('.', 'pp');

			$.ajax({
				url: Gooder4.settings.paths.pd_sub_kegiatan_tipe + '/' + login,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id, 'id_sasaran': id_sasaran, 'kode_sub_kegiatans': kode_sub_kegiatans},
				beforeSend: function(){
					$("#overlay-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).fadeIn();
				},
				success: function(data){
					$("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html(data);
					$("#overlay-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-verif-tujuan', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi tujuan',
		        text: 'Verifikasi tujuan'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.narasi,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id},
					beforeSend: function(){
						$("#div-tujuan-pd").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-tujuan-pd").html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-verif-sasaran', function(event){
			id = $(this).attr('data-id');
			id_tujuan = $(this).attr('data-id_tujuan');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi sasaran',
		        text: 'Verifikasi sasaran'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.narasi,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_tujuan': id_tujuan},
					beforeSend: function(){
						$("#div-sasaran-pd-"+id_tujuan).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-sasaran-pd-"+id_tujuan).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-verif-sub-kegiatan', function(event){
			id = $(this).attr('data-id');
			id_sasaran = $(this).attr('data-id_sasaran');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			kode_sub_kegiatans = $(this).attr('data-kode_sub_kegiatans');

			kode = kode_sub_kegiatans.split('-');
			kode[3] = kode[3].replace('.', 'pp');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi Sub Kegiatan',
		        text: 'Verifikasi Sub Kegiatan beserta Program dan Kegiatannya'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.narasi,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_sasaran': id_sasaran, 'kode_sub_kegiatans': kode_sub_kegiatans},
					beforeSend: function(){
						$("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-kembali-narasi', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			unit_id = $(this).attr('data-unit_id');
			id_tujuan = $(this).attr('data-id_tujuan');
			id_sasaran = $(this).attr('data-id_sasaran');
			kode_sub_kegiatans = $(this).attr('data-kode_sub_kegiatans');

			$.ajax({
				url: Gooder4.settings.paths.modal_kembali_narasi,
				type: 'POST',
				data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_tujuan': id_tujuan, 'id_sasaran': id_sasaran, 'kode_sub_kegiatans': kode_sub_kegiatans},
				beforeSend: function(){
					$(".div-modal-kembali-narasi").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-kembali-narasi").html(data);
				}
			});
		});

		$('body').on('click', '.btn-kembali-tujuan-aksi', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_narasi,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id},
					beforeSend: function(){
						$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$(".div-modal-kembali-narasi").html();
						$(".fullcontent").html(data);
						$('#modal-kembali-narasi').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-kembali-sasaran-aksi', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_tujuan = $(this).attr('data-id_tujuan');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_narasi,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id, 'id_tujuan': id_tujuan},
					beforeSend: function(){
						$("#div-sasaran-pd-"+id_tujuan).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-sasaran-pd-"+id_tujuan).html(data);
						$(".div-modal-kembali-narasi").html();
						$('#modal-kembali-narasi').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-kembali-sub_kegiatan-aksi', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_sasaran = $(this).attr('data-id_sasaran');
			kode_sub_kegiatans = $(this).attr('data-kode_sub_kegiatans');

			kode = kode_sub_kegiatans.split('-');
			kode[3] = kode[3].replace('.', 'pp');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_narasi,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id, 'id_sasaran': id_sasaran, 'kode_sub_kegiatans': kode_sub_kegiatans},
					beforeSend: function(){
						$("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html(data);
						$(".div-modal-kembali-narasi").html();
						$('#modal-kembali-narasi').modal('toggle');
					}
				});
			}
		});

		//bidangurusan
		$('body').on('click', '.btn-kembali', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			unit_id = $(this).attr('data-unit_id');

			$.ajax({
				url: Gooder4.settings.paths.modal_kembali,
				type: 'POST',
				data: {'id': id, 'tipe': tipe, 'unit_id': unit_id},
				beforeSend: function(){
					$(".div-modal-kembali").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-kembali").html(data);
				}
			});
		});

		//bidangurusan
		$('body').on('click', '.aksi-kembali', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id},
					beforeSend: function(){
						$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$(".div-modal-kembali").html();
						$(".fullcontent").html(data);
						$('#modal-kembali').modal('toggle');
					}
				});
			}
		});

		$('body').on("change",".select2-pd",function(){
			unit_id = $(this).find('option:selected').val();
			tipe = $(this).find('option:selected').data('tipe');

        	$.ajax({
                url: Gooder4.settings.paths.pd_tujuan_tipe + '/' + tipe,
                type: 'POST',
                data: {'unit_id':unit_id,'tipe':tipe},
                beforeSend: function(){
					$(".tampil_tujuan_pd").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".tampil_tujuan_pd").html(data);
				}
            });
        });

		$('body').on('click', '.btn-kembali-indikator', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			unit_id = $(this).attr('data-unit_id');
			id_tujuan = $(this).attr('data-id_tujuan');
			id_sasaran = $(this).attr('data-id_sasaran');
			id_program = $(this).attr('data-id_program');
			id_kegiatan = $(this).attr('data-id_kegiatan');
			id_sub_kegiatan = $(this).attr('data-id_sk');

			$.ajax({
				url: Gooder4.settings.paths.modal_kembali_indikator,
				type: 'POST',
				data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_tujuan': id_tujuan, 'id_sasaran': id_sasaran, 'id_program': id_program, 'id_kegiatan': id_kegiatan, 'id_sub_kegiatan': id_sub_kegiatan},
				beforeSend: function(){
					$(".div-modal-kembali-indikator").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-kembali-indikator").html(data);
				}
			});
		});

		$('body').on('click', '.btn-verif-indikator-tujuan', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			id_tujuan = $(this).attr('data-id_tujuan');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi Indikator',
		        text: 'Verifikasi Indikator Tujuan'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_tujuan': id_tujuan},
					beforeSend: function(){
						$("#div-indikator-tujuan-pd-"+id_tujuan).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-tujuan-pd-"+id_tujuan).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});


		$('body').on('click', '.btn-kembali-indikator-tujuan', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_tujuan = $(this).attr('data-id_tujuan');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id, 'id_tujuan': id_tujuan},
					beforeSend: function(){
						$("#div-indikator-tujuan-pd-"+id_tujuan).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-tujuan-pd-"+id_tujuan).html(data);
						$(".div-modal-kembali-indikator").html();
						$('#modal-kembali-indikator').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-verif-indikator-sasaran', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			id_sasaran = $(this).attr('data-id_sasaran');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi Indikator',
		        text: 'Verifikasi Indikator Sasaran'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_sasaran': id_sasaran},
					beforeSend: function(){
						$("#div-indikator-sasaran-pd-"+id_sasaran).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-sasaran-pd-"+id_sasaran).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-kembali-indikator-sasaran', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_sasaran = $(this).attr('data-id_sasaran');
			id_program = $(this).attr('data-id_program');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id},
					beforeSend: function(){
						$("#div-indikator-sasaran-pd-"+id_sasaran).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-sasaran-pd-"+id_sasaran).html(data);
						$(".div-modal-kembali-indikator").html();
						$('#modal-kembali-indikator').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-verif-indikator-program', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			id_sasaran = $(this).attr('data-id_sasaran');
			id_program = $(this).attr('data-id_program');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi Indikator',
		        text: 'Verifikasi Indikator Program'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_program': id_program, 'id_sasaran': id_sasaran},
					beforeSend: function(){
						$("#div-indikator-program-pd-"+id_sasaran+"-"+id_program).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-program-pd-"+id_sasaran+"-"+id_program).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-kembali-indikator-program', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_sasaran = $(this).attr('data-id_sasaran');
			id_program = $(this).attr('data-id_program');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id, 'id_program': id_program, 'id_sasaran': id_sasaran},
					beforeSend: function(){
						$("#div-indikator-program-pd-"+id_sasaran+"-"+id_program).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-program-pd-"+id_sasaran+"-"+id_program).html(data);
						$(".div-modal-kembali-indikator").html();
						$('#modal-kembali-indikator').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-verif-indikator-kegiatan', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			id_sasaran = $(this).attr('data-id_sasaran');
			id_kegiatan = $(this).attr('data-id_kegiatan');

			kode = id_kegiatan.split('-');
			kode[3] = kode[3].replace('.', 'pp');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi Indikator',
		        text: 'Verifikasi Indikator Kegiatan'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_kegiatan': id_kegiatan, 'id_sasaran': id_sasaran},
					beforeSend: function(){
						$("#div-indikator-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-kembali-indikator-kegiatan', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_sasaran = $(this).attr('data-id_sasaran');
			id_kegiatan = $(this).attr('data-id_kegiatan');

			kode = id_kegiatan.split('-');
			kode[3] = kode[3].replace('.', 'pp');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'txt': txt, 'unit_id': unit_id, 'id_kegiatan': id_kegiatan, 'id_sasaran': id_sasaran},
					beforeSend: function(){
						$("#div-indikator-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html(data);
						$(".div-modal-kembali-indikator").html();
						$('#modal-kembali-indikator').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-verif-indikator-sub_kegiatan', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			id_sk = $(this).attr('data-id_sk');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Verifikasi',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Verifikasi Indikator',
		        text: 'Verifikasi Indikator Sub Kegiatan'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_sk': id_sk},
					beforeSend: function(){
						$("#div-indikator-sub-kegiatan-pd-"+id_sk).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-sub-kegiatan-pd-"+id_sk).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-kembali-indikator-sub_kegiatan', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			txt = $('.input-alasan').val();
			unit_id = $(this).attr('data-unit_id');
			id_sub_kegiatan = $(this).attr('data-id_sub_kegiatan');

			if (txt == null || txt == '') {
				$(".alert-label").html('Dimohon memberi penjelasan.');
			} else {
				$.ajax({
					url: Gooder4.settings.paths.aksi_kembali_indikator,
					type: 'POST',
					data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_sub_kegiatan': id_sub_kegiatan},
					beforeSend: function(){
						$("#div-indikator-sub-kegiatan-pd-"+id_sub_kegiatan).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-sub-kegiatan-pd-"+id_sub_kegiatan).html(data);
						$(".div-modal-kembali-indikator").html();
						$('#modal-kembali-indikator').modal('toggle');
					}
				});
			}
		});

		$('body').on('click', '.btn-add-tujuan-pd-', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id).fadeIn();
			$('#input-'+tipe+'-'+id).val('');
			$('#btn-save-'+tipe+'-'+id).fadeIn();
			$('#btn-cancel-'+tipe+'-'+id).fadeIn();
		});

		$('body').on('click', '.btn-save-tujuan-', function(event){
			tipe = $(this).attr('data-tipe');
			id_parent = $(this).attr('data-id_parent');
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			txt = $('#input-'+tipe+'-'+id_parent).val();

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-save-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-cancel-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-add-'+tipe+'-'+id_parent).fadeIn();

			$.ajax({
				url: Gooder4.settings.paths.save_pd_tujuan_misi,
				type: 'POST',
				data: {'txt': txt, 'unit_id': unit_id, 'id_parent': id_parent, 'id': id},
				beforeSend: function(){
					$("#div-program-kota-"+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$("#div-program-kota-"+id_parent).html(data);
					// $('#input-misi').val(txt);
				}
			});
		});

		$('body').on('click', '.btn-buka-program-pd-narasi-', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.pd_program_,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id).html(data);
					$("#overlay-"+tipe+"-"+id).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-add-program-pd-narasi-', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id).fadeIn();
			$('#input-'+tipe+'-'+id).val('');
			$('#btn-save-'+tipe+'-'+id).fadeIn();
			$('#btn-cancel-'+tipe+'-'+id).fadeIn();
		});

		$('body').on('click', '.btn-save-program-pd-narasi', function(event){
			tipe = $(this).attr('data-tipe');
			id_parent = $(this).attr('data-id_parent');
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			txt = $('#input-'+tipe+'-'+id_parent).val();

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-save-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-cancel-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-add-'+tipe+'-'+id_parent).fadeIn();

			$.ajax({
				url: Gooder4.settings.paths.save_pd_program_,
				type: 'POST',
				data: {'txt': txt, 'unit_id': unit_id, 'id_parent': id_parent, 'id': id},
				beforeSend: function(){
					$("#div-"+tipe+"-"+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$("#div-"+tipe+"-"+id_parent).html(data);
					// $('#input-misi').val(txt);
				}
			});
		});

		$('body').on('click', '.btn-buka-kegiatan-pd-narasi-', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.pd_kegiatan_,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id).html(data);
					$("#overlay-"+tipe+"-"+id).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-add-kegiatan-pd-narasi-', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id).fadeIn();
			$('#input-'+tipe+'-'+id).val('');
			$('#btn-save-'+tipe+'-'+id).fadeIn();
			$('#btn-cancel-'+tipe+'-'+id).fadeIn();
		});

		$('body').on('click', '.btn-save-kegiatan-pd-narasi', function(event){
			tipe = $(this).attr('data-tipe');
			id_parent = $(this).attr('data-id_parent');
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			txt = $('#input-'+tipe+'-'+id_parent).val();

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-save-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-cancel-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-add-'+tipe+'-'+id_parent).fadeIn();

			$.ajax({
				url: Gooder4.settings.paths.save_pd_kegiatan_,
				type: 'POST',
				data: {'txt': txt, 'unit_id': unit_id, 'id_parent': id_parent, 'id': id},
				beforeSend: function(){
					$("#div-"+tipe+"-"+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$("#div-"+tipe+"-"+id_parent).html(data);
					// $('#input-misi').val(txt);
				}
			});
		});

		$('body').on('click', '.btn-buka-sub-kegiatan-pd-narasi-', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.pd_sub_kegiatan_,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id).html(data);
					$("#overlay-"+tipe+"-"+id).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-add-sub-kegiatan-pd-narasi-', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id).fadeIn();
			$('#input-'+tipe+'-'+id).val('');
			$('#btn-save-'+tipe+'-'+id).fadeIn();
			$('#btn-cancel-'+tipe+'-'+id).fadeIn();
		});

		$('body').on('click', '.btn-save-sub-kegiatan-pd-narasi', function(event){
			tipe = $(this).attr('data-tipe');
			id_parent = $(this).attr('data-id_parent');
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			txt = $('#input-'+tipe+'-'+id_parent).val();

			$(this).fadeOut();
			$('#input-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-save-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-cancel-'+tipe+'-'+id_parent).fadeOut();
			$('#btn-add-'+tipe+'-'+id_parent).fadeIn();

			$.ajax({
				url: Gooder4.settings.paths.save_pd_sub_kegiatan_,
				type: 'POST',
				data: {'txt': txt, 'unit_id': unit_id, 'id_parent': id_parent, 'id': id},
				beforeSend: function(){
					$("#div-"+tipe+"-"+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$("#div-"+tipe+"-"+id_parent).html(data);
					// $('#input-misi').val(txt);
				}
			});
		});

		$('body').on("change",".select2-pd-narasi",function(){
			unit_id = $(this).find('option:selected').val();
			// tipe = $(this).find('option:selected').data('tipe');

        	$.ajax({
                url: Gooder4.settings.paths.narasi_pd_tujuan_tipe,
                type: 'POST',
                data: {'unit_id':unit_id},
                beforeSend: function(){
					$(".tampil-tujuan-narasi").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".tampil-tujuan-narasi").html(data);
				}
            });
        });

        $('body').on('click', '.btn-buka-sasaran-pd-narasi', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.narasi_pd_sasaran_tipe,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id).html(data);
					$("#overlay-"+tipe+"-"+id).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-buka-program-pd-narasi', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.narasi_pd_program_tipe,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id).html(data);
					$("#overlay-"+tipe+"-"+id).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-buka-kegiatan-pd-narasi', function(event){
			no = $(this).attr('data-no');
			id_sasaran = $(this).attr('data-id_sasaran');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');
			narasi_iprogram = $(this).attr('data-narasi_iprogram');

			$.ajax({
				url: Gooder4.settings.paths.narasi_pd_kegiatan_tipe,
				type: 'POST',
				data: {'id_sasaran': id_sasaran, 'no': no, 'unit_id': unit_id, 'narasi_iprogram': narasi_iprogram},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id_sasaran+"-"+no).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id_sasaran+"-"+no).html(data);
					$("#overlay-"+tipe+"-"+id_sasaran+"-"+no).fadeOut();
				}
			});
		});

		$('body').on('click', '.btn-buka-sub-kegiatan-pd-narasi', function(event){
			unit_id = $(this).attr('data-unit_id');
			id_sasaran = $(this).attr('data-id_sasaran');
			kode_urusan = $(this).attr('data-kode_urusan');
			kode_bidang_urusan = $(this).attr('data-kode_bidang_urusan');
			kode_program = $(this).attr('data-kode_program');
			kode_kegiatan = $(this).attr('data-kode_kegiatan');
			kode_kegiatan_fiks = kode_kegiatan.replace('pp', '.')
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.narasi_pd_sub_kegiatan_tipe,
				type: 'POST',
				data: {'id_sasaran': id_sasaran, 'kode_urusan': kode_urusan, 'kode_bidang_urusan': kode_bidang_urusan, 'kode_program': kode_program, 'kode_kegiatan_fiks': kode_kegiatan_fiks, 'unit_id': unit_id},
				beforeSend: function(){
					$("#overlay-"+tipe+"-"+id_sasaran+"-"+kode_urusan+"-"+kode_bidang_urusan+"-"+kode_program+"-"+kode_kegiatan).fadeIn();
				},
				success: function(data){
					$("#div-"+tipe+"-"+id_sasaran+"-"+kode_urusan+"-"+kode_bidang_urusan+"-"+kode_program+"-"+kode_kegiatan).html(data);
					$("#overlay-"+tipe+"-"+id_sasaran+"-"+kode_urusan+"-"+kode_bidang_urusan+"-"+kode_program+"-"+kode_kegiatan).fadeOut();
				}
			});
		});
	},

	upload: function () {
		$('body').on('click','.upload',function(e){
            e.preventDefault();
            var unit_id = $(this).data('unit_id');
            var file_data = $("#upload").prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);
            $.ajax({
                url: Gooder4.settings.paths.upload + "/" + unit_id, // point to server-side PHP script
                dataType: 'json',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                beforeSend: function(){
                $("#pesan-upload").html("Proses ...");
           		},
                success: function(data,status){
                    //alert(php_script_response); // display response from the PHP script, if any
                    if (data.status!='error') {
                        $('#upload').val('');
                        // alert(data.msg);
                        $("#pesan-upload").html(data.msg);
                        $.ajax({
							url: Gooder4.settings.paths.isiUpload + "/" + unit_id,
							type: 'POST',
							// data: {'renja': renja},
							beforeSend: function(){
								$("#isi-upload").html("Tunggu ...");
							},
							success: function(data){
								$("#isi-upload").html(data);
							}
						});
                    }else{
                        // alert(data.msg);
                        $("#pesan-upload").html(data.msg);
                    }
                }
            });
        });

        $('body').on('click','.hapus-file',function(e){
            var unit_id = $(this).data('unit_id');
            var file = $(this).data('file');

            Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Hapus',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Hapus',
		        text: 'hapus File Upload'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.hapus,
					data: {'unit_id': unit_id, 'file': file},
					type: 'POST',
					beforeSend: function(){
						$('#isi-upload').html("Tunggu ...");
					},
					success: function(data){
						$('#isi-upload').html(data);
						$('#pesan-upload').html('');
					}
				});
			  } else if (result.isDenied) {
			  }
			})        
		});

		$('body').on('click', '.btn-refresh-indikator-tujuan-pd', function(event){
			id = $(this).attr('data-id');

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'Refresh',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: 'Refresh Indikator Tujuan',
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.refresh_indikator,
					type: 'POST',
					data: {'id': id},
					beforeSend: function(){
						$("#div-indikator-tujuan-pd-"+id).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$("#div-indikator-tujuan-pd-"+id).html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '.btn-tag-indikator-sub_kegiatan', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			id_sk = $(this).attr('data-id_sk');

			$.ajax({
				url: Gooder4.settings.paths.modal_tag,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id, 'id_sk': id_sk},
				beforeSend: function(){
					$(".div-modal-tag").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-tag").html(data);
				}
			});
		});

		$('body').on('click', '.btn-tag-indikator', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			id_sk = $(this).attr('data-id_sk');
			id_sasaran = $(this).attr('data-id_sasaran');

			id_sas_kota = $('.select-indikator-sasaran-kota').find('option:selected').val();
			iid_tujuan = $('.select-indikator-tujuan').find('option:selected').val();
			iid_sasaran = $('.select-indikator-sasaran').find('option:selected').val();
			iid_program = $('.select-indikator-program').find('option:selected').val();
			iid_kegiatan = $('.select-indikator-kegiatan').find('option:selected').val();
			
			$.ajax({
				url: Gooder4.settings.paths.aksi_tag,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id, 'id_sk': id_sk, 'id_tujuan': iid_tujuan, 'id_sasaran': iid_sasaran, 'id_program': iid_program, 'id_kegiatan': iid_kegiatan, 'id_sas_kota': id_sas_kota},
				beforeSend: function(){
					$("#div-indikator-sub-kegiatan-pd-"+id_sk).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$("#div-indikator-sub-kegiatan-pd-"+id_sk).html(data);
					$(".div-modal-tag").html();
					$('#modal-tag').modal('toggle');
				}
			});
		});

		$('body').on('click', '.btn-detil-tag-indikator', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			id_sk = $(this).attr('data-id_sk');
			id_sasaran = $(this).attr('data-id_sasaran');
			kode_urusan = $(this).attr('data-kode_urusan');
			kode_bidang_urusan = $(this).attr('data-kode_bidang_urusan');
			kode_program = $(this).attr('data-kode_program');
			kode_kegiatan = $(this).attr('data-kode_kegiatan');

			$.ajax({
				url: Gooder4.settings.paths.modal_detil_tag,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id, 'id_sk': id_sk},
				beforeSend: function(){
					$(".div-modal-detil-tag").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-detil-tag").html(data);
				}
			});
		});

		$('body').on('click', '.btn-upload-pendukung', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.modal_upload_pendukung,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id, 'tipe': tipe},
				beforeSend: function(){
					$(".div-modal-upload-pendukung").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-upload-pendukung").html(data);
				}
			});
		});

		$('body').on('click', '.btn-upload-pendukung-view', function(event){
			id = $(this).attr('data-id');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.modal_upload_pendukung_view,
				type: 'POST',
				data: {'id': id, 'unit_id': unit_id, 'tipe': tipe},
				beforeSend: function(){
					$(".div-modal-upload-pendukung-view").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-upload-pendukung-view").html(data);
				}
			});
		});

		$('body').on('click', '.btn-tag-wa', function(event){
			id = $(this).attr('data-id');

			$.ajax({
				url: Gooder4.settings.paths.modal_tag_wa,
				type: 'POST',
				data: {'id': id},
				beforeSend: function(){
					$(".div-modal-tag-wa").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-tag-wa").html(data);
				}
			});
		});

		$('body').on('click', '.btn-save-wa', function(event){
	        selected = $('.select-indikator-kdh').val();
	        unit_id = $(this).attr('data-unit_id');
	        id = $(this).attr('data-id');
	        id_sasaran = $(this).attr('data-id_sasaran');
	        kode_sub_kegiatans = $(this).attr('data-kode_sub_kegiatans');

	        kode = kode_sub_kegiatans.split('-');
			kode[3] = kode[3].replace('.', 'pp');

			if ($('input[name=checkbox-spm]').prop('checked')) {
            	spm = 't';
            } else {
            	spm = 'f';
            }
            if ($('input[name=checkbox-sdgs]').prop('checked')) {
            	sdgs = 't';
            } else {
            	sdgs = 'f';
            }

	        $.ajax({
	            url: Gooder4.settings.paths.aksi_tag_wa,
	            type: 'POST',
	            data: {'unit_id': unit_id, 'selected': selected, 'id': id, 'kode_sub_kegiatans': kode_sub_kegiatans, 'id_sasaran': id_sasaran, 'spm': spm, 'sdgs': sdgs},
	            beforeSend: function(){
	                $("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	            },
	            success: function(data){
	                $("#div-sub-kegiatan-pd-"+id_sasaran+"-"+kode[0]+"-"+kode[1]+"-"+kode[2]+"-"+kode[3]).html(data);
	                $(".div-modal-tag-wa").html();
					$('#modal-tag-wa').modal('toggle');
	            }
	        });
	    });

		$('body').on('click', '.btn-view-kdh', function(event){
			id = $(this).attr('data-id');

			$.ajax({
				url: Gooder4.settings.paths.modal_view_kdh,
				type: 'POST',
				data: {'id': id},
				beforeSend: function(){
					$(".div-modal-view-kdh").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-kdh").html(data);
				}
			});
		});

		$('body').on('click', '.btn-note', function(event){
			$(this).fadeOut();
			$('.div-textarea-note').fadeIn();
			$('.btn-simpan-note').fadeIn();
			$('.btn-batal-note').fadeIn();
		});

		$('body').on('click', '.btn-batal-note', function(event){
			$(this).fadeOut();
			$('.div-textarea-note').fadeOut();
			$('.btn-simpan-note').fadeOut();
			$('.btn-note').fadeIn();
		});

		$('body').on('click', '.btn-simpan-note', function(event){
			unit_id = $(this).attr('data-unit_id');
			txt = $('.textarea-note').val();
			
			$.ajax({
				url: Gooder4.settings.paths.aksi_note,
				type: 'POST',
				data: {'unit_id': unit_id, 'txt': txt},
				beforeSend: function(){
					$(".div-note").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-note").html(data);
				}
			});
		});
	},

	menu: function () {
		$('body').on('click', '#rekap', function(event){
			$('.menu').removeClass('active');
			$.ajax({
				url: Gooder4.settings.paths.rekap,
				type: 'POST',
				beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
			});
			$(this).addClass('active');
		});

		$('body').on('click', '#koentji', function(event){
			$('.menu').removeClass('active');
			$.ajax({
				url: Gooder4.settings.paths.koentji,
				type: 'POST',
				beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
			});
			$(this).addClass('active');
		});

		$('body').on('click', '.btn-koentji', function(event){
			val = $(this).attr('data-val');
			unit_id = $(this).attr('data-unit_id');
			tipe = $(this).attr('data-tipe');

			if (val == 't') {
				confirm_ = 'Koentji';
				title_ = 'Koentji';
				text_ = 'Koentji '+tipe+' PD';
			} else {
				confirm_ = 'Boeka';
				title_ = 'Boeka';
				text_ = 'Boeka Koentji '+tipe+' PD';
			}

			Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: confirm_,
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title: title_,
		        text: text_
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder4.settings.paths.aksi_koentji,
					type: 'POST',
					data: {'val': val, 'unit_id': unit_id, 'tipe': tipe},
					beforeSend: function(){
						$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
					},
					success: function(data){
						$(".fullcontent").html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

        $('body').on('click', '#pd-rekap2', function(event){
			$('.menu').removeClass('active');
			var unit_id = $(this).data('unit_id');
			$.ajax({
                url: Gooder4.settings.paths.rekap2_,
                type: 'POST',
                data: {'unit_id':unit_id},
                beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
            });
			$(this).addClass('active');
		});

		$('body').on('click', '#pd-view-rekap2', function(event){
			$('.menu').removeClass('active');
			var unit_id = $(this).data('unit_id');
			$.ajax({
                url: Gooder4.settings.paths.view_rekap2,
                type: 'POST',
                data: {'unit_id':unit_id},
                beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
            });
			$(this).addClass('active');
		});

		$('body').on("click",".btn-report",function(){
			tipe_rekap = $('.select2-rekap').find('option:selected').val();
			unit_id = $('.select2-pd-rekap').find('option:selected').val();
			tipe = $('.select2-pilih-tahap').find('option:selected').val();

			if (tipe_rekap == '1') {
				url_ = Gooder4.settings.paths.rekap_;
			} else if (tipe_rekap == '2') {
				url_ = Gooder4.settings.paths.rekap2_;
			} else if (tipe_rekap == '3') {
				url_ = Gooder4.settings.paths.rekap3_;
			} else if (tipe_rekap == '4') {
				url_ = Gooder4.settings.paths.rekap4_;
			} else if (tipe_rekap == '5') {
				url_ = Gooder4.settings.paths.rekap5_;
			} else if (tipe_rekap == '6') {
				url_ = Gooder4.settings.paths.rekap6_;
			} else if (tipe_rekap == '7') {
				url_ = Gooder4.settings.paths.rekap7_;
			} else if (tipe_rekap == '8') {
				url_ = Gooder4.settings.paths.rekap8_;
			} else if (tipe_rekap == '9') {
				url_ = Gooder4.settings.paths.rekap9_;
			} else if (tipe_rekap == '10') {
				url_ = Gooder4.settings.paths.rekap10_;
			} else if (tipe_rekap == '11') {
				url_ = Gooder4.settings.paths.rekap11_;
			} else if (tipe_rekap == '12') {
				url_ = Gooder4.settings.paths.rekap12_;
			} else if (tipe_rekap == '13') {
				url_ = Gooder4.settings.paths.rekap13_;
			} else if (tipe_rekap == '14') {
				url_ = Gooder4.settings.paths.rekap14_;
			} else if (tipe_rekap == '15') {
				url_ = Gooder4.settings.paths.rekap15_;
			} else if (tipe_rekap == '16') {
				url_ = Gooder4.settings.paths.rekap16_;
			} else if (tipe_rekap == '17') {
				url_ = Gooder4.settings.paths.rekap17_;
			} else if (tipe_rekap == '18') {
				url_ = Gooder4.settings.paths.rekap18_;
			} else if (tipe_rekap == '19') {
				url_ = Gooder4.settings.paths.rekap19_;
			} else if (tipe_rekap == '20') {
				url_ = Gooder4.settings.paths.rekap20_;
			} else if (tipe_rekap == '21') {
				url_ = Gooder4.settings.paths.rekap21_;
			} else if (tipe_rekap == '22') {
				url_ = Gooder4.settings.paths.rekap22_;
			} else if (tipe_rekap == '23') {
				url_ = Gooder4.settings.paths.rekap23_;
			} else if (tipe_rekap == '24') {
				url_ = Gooder4.settings.paths.rekap24_;
			} else if (tipe_rekap == '25') {
				url_ = Gooder4.settings.paths.rekap25_;
			} else if (tipe_rekap == '26') {
				url_ = Gooder4.settings.paths.rekap26_;
			} else if (tipe_rekap == '27') {
				url_ = Gooder4.settings.paths.rekap27_;
			} else if (tipe_rekap == '28') {
				url_ = Gooder4.settings.paths.rekap28_;
			}  else if (tipe_rekap == '29') {
				url_ = Gooder4.settings.paths.rekap29_;
			} else if (tipe_rekap == '152') {
				url_ = Gooder4.settings.paths.rekap152_;
			} else if (tipe_rekap == '32') {
				url_ = Gooder4.settings.paths.rekap32_;
			} else if (tipe_rekap == '42') {
				url_ = Gooder4.settings.paths.rekap42_;
			} else if (tipe_rekap == '43') {
				url_ = Gooder4.settings.paths.rekap43_;
			} else if (tipe_rekap == '4321') {
				url_ = Gooder4.settings.paths.rekap4321_;
			} else if (tipe_rekap == '321') {
				url_ = Gooder4.settings.paths.rekap321_;
			} else if (tipe_rekap == '3212') {
				url_ = Gooder4.settings.paths.rekap3212_;
			} else if (tipe_rekap == '43212') {
				url_ = Gooder4.settings.paths.rekap43212_;
			} else if (tipe_rekap == '82') {
				url_ = Gooder4.settings.paths.rekap82_;
			} else if (tipe_rekap == 'rekap_dora') {
				url_ = Gooder4.settings.paths.rekap_dora;
			} else if (tipe_rekap == 'rekap_dora_isi') {
				url_ = Gooder4.settings.paths.rekap_dora_isi;
			} else if (tipe_rekap == 'rekap_dora_hitung') {
				url_ = Gooder4.settings.paths.rekap_dora_hitung;
			} else if (tipe_rekap == '72') {
				url_ = Gooder4.settings.paths.rekap72_;
			} else if (tipe_rekap == '73') {
				url_ = Gooder4.settings.paths.rekap73_;
			} else if (tipe_rekap == 'rekapba') {
				url_ = Gooder4.settings.paths.rekapba_;
			} else if (tipe_rekap == '14do') {
				url_ = Gooder4.settings.paths.rekap14do_;
			} else if (tipe_rekap == '2excel') {
				url_ = Gooder4.settings.paths.rekap2_excel;
			} else if (tipe_rekap == 'cascading_simple2') {
				url_ = Gooder4.settings.paths.rekap_cascading_simple2;
			} else if (tipe_rekap == 'cascading_simple3') {
				url_ = Gooder4.settings.paths.rekap_cascading_simple3;
			} else if (tipe_rekap == 'rekap_cascading_kota') {
				url_ = Gooder4.settings.paths.rekap_cascading_kota;
			} else if (tipe_rekap == 'cascading_kota2') {
				url_ = Gooder4.settings.paths.rekap_cascading_kota2;
			} else if (tipe_rekap == 'cascading_pd_') {
				url_ = Gooder4.settings.paths.cascading_pd_;
			} else if (tipe_rekap == 'cascading_pd_csf_') {
				url_ = Gooder4.settings.paths.cascading_pd_csf_;
			} else if (tipe_rekap == 'iku_pd') {
				url_ = Gooder4.settings.paths.iku_pd;
			} else if (tipe_rekap == 'pohon_kinerja_kota') {
				url_ = Gooder4.settings.paths.pohon_kinerja_kota;
			} else if (tipe_rekap == 'pohon_kinerja_pd') {
				url_ = Gooder4.settings.paths.pohon_kinerja_pd;
			} else if (tipe_rekap == 'pohon_kinerja_pd_halaman') {
				url_ = Gooder4.settings.paths.pohon_kinerja_pd_halaman;
			} else if (tipe_rekap == 'rekap_level4_indikator') {
				url_ = Gooder4.settings.paths.rekap_level4_indikator;
			} else if (tipe_rekap == 'rekap_level4_bidang') {
				url_ = Gooder4.settings.paths.rekap_level4_bidang;
			} else if (tipe_rekap == 'tabel_pohon_kinerja') {
				url_ = Gooder4.settings.paths.tabel_pohon_kinerja;
			} else if (tipe_rekap == 'rekap_tabel_renstra') {
				url_ = Gooder4.settings.paths.rekap_tabel_renstra;
			} else if (tipe_rekap == 'rekap_bidang_renstra') {
				url_ = Gooder4.settings.paths.rekap_bidang_renstra;
			}

        	$.ajax({
                url: url_,
                type: 'POST',
                data: {'unit_id':unit_id, 'tipe':tipe, 'tipe_rekap':tipe_rekap},
                beforeSend: function(){
					$(".tampil_rekap").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".tampil_rekap").html(data);
				}
            });
        });

        $('body').on('click', '#pd-rekap8', function(event){
			$('.menu').removeClass('active');
			var unit_id = $(this).data('unit_id');
			$.ajax({
				url: Gooder4.settings.paths.view_tag,
				type: 'POST',
				data: {'unit_id':unit_id},
				beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
			});
			$(this).addClass('active');
		});

		$('body').on('click', '#pd-rekap11', function(event){
			$('.menu').removeClass('active');
			var unit_id = $(this).data('unit_id');
			var tipe = $(this).data('tipe');
			$.ajax({
				url: Gooder4.settings.paths.rekap11_,
				type: 'POST',
				data: {'unit_id':unit_id, 'tipe':tipe},
				beforeSend: function(){
					$(".fullcontent").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".fullcontent").html(data);
				}
			});
			$(this).addClass('active');
		});

		$('body').on('click', '.btn-setuju', function(event){
			unit_id = $(this).attr('data-unit_id');

			$.ajax({
				url: base_url + 'dashboard/dashboard/modal_ka',
				type: 'POST',
				data: {'unit_id': unit_id},
				beforeSend: function(){
					$(".div-modal-view-ka").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-ka").html(data);
				}
			});
		});

		$('body').on('click', '.btn-setuju-aksi', function(event){
			unit_id = $(this).attr('data-unit_id');
			value = $(this).attr('data-value');

			$.ajax({
				url: base_url + 'dashboard/dashboard/aksi_ka',
				type: 'POST',
				data: {'unit_id': unit_id, 'value': value},
				beforeSend: function(){
					$(".body-setuju").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					// $('#modal-view-ka').modal('toggle');
					$(".fullcontent_bersih").html(data);
					$('.modal-backdrop').hide();
				}
			});
		});
	},

	menu_baru: function () {
		$('body').on('click', '.btn-cluster', function(event){
			id = $(this).attr('data-id');
			id_parent = $(this).attr('data-id_parent');

			$.ajax({
				url: Gooder4.settings.paths.modal_cluster,
				type: 'POST',
				data: {'id': id, 'id_parent': id_parent},
				beforeSend: function(){
					$(".div-modal-cluster").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-cluster").html(data);
				}
			});
		});

		$('body').on('click', '.btn-save-cluster', function(event){
	        selected = $('.select-cluster').find('option:selected').val();
	        id = $(this).attr('data-id');
			id_parent = $(this).attr('data-id_parent');

	        $.ajax({
	            url: Gooder4.settings.paths.aksi_cluster,
	            type: 'POST',
	            data: {'selected': selected, 'id': id, 'id_parent': id_parent},
	            beforeSend: function(){
	                $("#div-program-pd-"+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	            },
	            success: function(data){
	                $(".div-modal-cluster").html();
					$('#modal-cluster').modal('toggle');
	                $("#div-program-pd-"+id_parent).html(data);
	            }
	        });
	    });

	    $('body').on('click', '.btn-view-cluster', function(event){
			id = $(this).attr('data-id');

			$.ajax({
				url: Gooder4.settings.paths.modal_view_cluster,
				type: 'POST',
				data: {'id': id},
				beforeSend: function(){
					$(".div-modal-view-cluster").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-cluster").html(data);
				}
			});
		});

		$('body').on('click', '.btn-crosscut', function(event){
			id = $(this).attr('data-id');
			id_parent = $(this).attr('data-id_parent');

			$.ajax({
				url: Gooder4.settings.paths.modal_crosscut,
				type: 'POST',
				data: {'id': id, 'id_parent': id_parent},
				beforeSend: function(){
					$(".div-modal-crosscut").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-crosscut").html(data);
				}
			});
		});

		$('body').on('click', '.btn-save-crosscut', function(event){
	        selected = $('.select-crosscut').val().join(";");
	        id = $(this).attr('data-id');
			id_parent = $(this).attr('data-id_parent');

	        $.ajax({
	            url: Gooder4.settings.paths.aksi_crosscut,
	            type: 'POST',
	            data: {'selected': selected, 'id': id, 'id_parent': id_parent},
	            beforeSend: function(){
	                $("#div-sub-kegiatan-pd-"+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	            },
	            success: function(data){
	                $(".div-modal-crosscut").html();
					$('#modal-crosscut').modal('toggle');
	                $("#div-sub-kegiatan-pd-"+id_parent).html(data);
	            }
	        });
	    });

	    $('body').on('click', '.btn-view-crosscut', function(event){
			id = $(this).attr('data-id');

			$.ajax({
				url: Gooder4.settings.paths.modal_view_crosscut,
				type: 'POST',
				data: {'id': id},
				beforeSend: function(){
					$(".div-modal-view-crosscut").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-crosscut").html(data);
				}
			});
		});

		$('body').on('click', '.btn-ket-cross', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			$.ajax({
				url: Gooder4.settings.paths.modal_ket_cross,
				type: 'POST',
				data: {'id': id, 'tipe': tipe},
				beforeSend: function(){
					$(".div-modal-ket-cross").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-ket-cross").html(data);
				}
			});
		});

		$('body').on('click', '.btn-save-ket-cross', function(event){
	        val = $('.text-ket-cross').val();
	        id = $(this).attr('data-id');
	        tipe = $(this).attr('data-tipe');

	        $.ajax({
	            url: Gooder4.settings.paths.aksi_ket_cross,
	            type: 'POST',
	            data: {'val': val, 'id': id, 'tipe': tipe},
	            beforeSend: function(){
	                // $("#div-"+tipe+'-'+id).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	            },
	            success: function(data){
	                $(".div-modal-ket-cross").html();
					$('#modal-ket-cross').modal('toggle');
	                $("#div-"+tipe+'-'+id).html(data);
	            }
	        });
	    });

	    $('body').on('click', '.btn-view-ket-cross', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.modal_view_ket_cross,
				type: 'POST',
				data: {'id': id, 'tipe': tipe},
				beforeSend: function(){
					$(".div-modal-view-ket-cross").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-ket-cross").html(data);
				}
			});
		});

		$('body').on('click', '.btn-link', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			unit_id = $(this).attr('data-unit_id');
			id_parent = $(this).attr('data-id_parent');
			$.ajax({
				url: Gooder4.settings.paths.modal_link,
				type: 'POST',
				data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_parent': id_parent},
				beforeSend: function(){
					$(".div-modal-link").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-link").html(data);
				}
			});
		});

		$('body').on('click', '.btn-save-link', function(event){
			selected = $('.select-link').val().join(";");
			tipe_selected = $('.select-link option:selected').map(function() {
			  return $(this).data("tipe");
			}).get().join(";");
	        id = $(this).attr('data-id');
	        tipe = $(this).attr('data-tipe');
	        unit_id = $(this).attr('data-unit_id');
			id_parent = $(this).attr('data-id_parent');

			// alert(selected);
			// alert(tipe_selected);
	        $.ajax({
	            url: Gooder4.settings.paths.aksi_link,
	            type: 'POST',
	            data: {'tipe_selected': tipe_selected,'selected': selected, 'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_parent': id_parent},
	            beforeSend: function(){
	                $("#div-indikator-"+tipe+'-'+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	                // $(".div-pesan-link").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	            },
	            success: function(data){
	                $(".div-modal-link").html();
					$('#modal-link').modal('toggle');
	                $("#div-indikator-"+tipe+'-'+id_parent).html(data);
	                // $(".div-pesan-link").html(data);
	            }
	        });
	    });

	    $('body').on('click', '.btn-view-link', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.modal_view_link,
				type: 'POST',
				data: {'id': id, 'tipe': tipe},
				beforeSend: function(){
					$(".div-modal-view-link").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-link").html(data);
				}
			});
		});

		$('body').on('click', '.btn-link-narasi', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');
			unit_id = $(this).attr('data-unit_id');
			id_parent = $(this).attr('data-id_parent');
			$.ajax({
				url: Gooder4.settings.paths.modal_link_narasi,
				type: 'POST',
				data: {'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_parent': id_parent},
				beforeSend: function(){
					$(".div-modal-link-narasi").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-link-narasi").html(data);
				}
			});
		});

		$('body').on('click', '.btn-save-link-narasi', function(event){
			selected = $('.select-link-narasi').val().join(";");
			// tipe_selected = $('.select-link-narasi option:selected').map(function() {
			//   return $(this).data("tipe");
			// }).get().join(";");
	        id = $(this).attr('data-id');
	        tipe = $(this).attr('data-tipe');
	        unit_id = $(this).attr('data-unit_id');
			id_parent = $(this).attr('data-id_parent');

			// alert(selected);
			// alert(tipe_selected);
	        $.ajax({
	            url: Gooder4.settings.paths.aksi_link_narasi,
	            type: 'POST',
	            data: {'selected': selected, 'id': id, 'tipe': tipe, 'unit_id': unit_id, 'id_parent': id_parent},
	            beforeSend: function(){
	                $("#div-"+tipe+'-'+id_parent).html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	                // $(".div-pesan-link").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
	            },
	            success: function(data){
	                $(".div-modal-link-narasi").html();
					$('#modal-link-narasi').modal('toggle');
	                $("#div-"+tipe+'-'+id_parent).html(data);
	                // $(".div-pesan-link").html(data);
	            }
	        });
	    });

	    $('body').on('click', '.btn-view-link-narasi', function(event){
			id = $(this).attr('data-id');
			tipe = $(this).attr('data-tipe');

			$.ajax({
				url: Gooder4.settings.paths.modal_view_link_narasi,
				type: 'POST',
				data: {'id': id, 'tipe': tipe},
				beforeSend: function(){
					$(".div-modal-view-link-narasi").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-modal-view-link-narasi").html(data);
				}
			});
		});
	},
	// Initialitation All Function
	init: function(){
		Gooder4.pd_tujuan();
		Gooder4.upload();
		Gooder4.menu();
		Gooder4.menu_baru();
	}
};

$(document).ready(function() {
	Gooder4.init();
});