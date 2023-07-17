var Gooder = {

	settings: {
		name: "Gooder Javascript",
		version: "1.0.2",

		paths: { 
			//menu
			// dashboard: "dashboard/dashboard/index",
			hapus: base_url_js + "dashboard/entry/hapus",

			filter: base_url_js + "dashboard/admin/filter",
			excel: base_url_js + "dashboard/admin/excel",
			upload: "upload/upload"
		},
	},

	kunjungan: function () {
		$('#form-login').validate({
		    rules: {
		      username: {
		        required: true,
		      },
		      password: {
		        required: true,
		      },
		    },
		    messages: {
		      username: {
		        required: "Mohon untuk mengisi username.",
		      },
		      password: {
		        required: "Mohon untuk mengisi password.",
		      },
		    },
		    
		    errorElement: 'span',
		    errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		    }
		});

		$.validator.addMethod('filesize', function (value, element, param) {
		    return this.optional(element) || (element.files[0].size <= param)
		}, 'Ukuran file harus lebih kecil dari {0}');

		$('#form-kunjungan').validate({
		    rules: {
		    	petugas: 'required',
		    	seksi: 'required',
		    	giat: 'required',
		    	tanggal: 'required',
		    	alamat: 'required',
		    	rw: 'required',
		    	rt: 'required',
		    	tinjau: 'required',
		    	saran: 'required',
		    	tindaklanjut: 'required',
		    	dokumentasi: {
		            required: true,
		            extension: "JPG|jpg|JPEG|jpeg|PNG|png",
		        },
		    },
		    messages: {
		      petugas: "Mohon untuk mengisi nama Petugas.",
		      seksi: "Mohon untuk memilih Seksi.",
		      giat: "Mohon untuk memilih Dasar Giat.",
		      tanggal: "Mohon untuk mengisi Tanggal.",
		      alamat: "Mohon untuk mengisi Alamat.",
		      rw: "Mohon untuk memilih RW.",
		      rt: "Mohon untuk memilih RT.",
		      tinjau: "Mohon untuk mengisi Hasil Tinjau Lokasi.",
		      saran: "Mohon untuk mengisi Saran Masukan.",
		      tindaklanjut: "Mohon untuk mengisi Tindak Lanjut.",
		      dokumentasi: {
		        required: "Mohon untuk mengupload foto.",                  
		        extension: "File harus foto.",
		      },
		    },
		    submitHandler: function(form) {
		        Swal.fire({
					showDenyButton: true,
					showCloseButton: true,
	 				confirmButtonText: 'Sesuai',
	 				denyButtonText: 'batal',
			        icon: 'warning',
			        title:'Submit',
			        text: 'Apa anda yakin laporan telah sesuai ?'
			    }).then((result) => {
				  if (result.isConfirmed) {
					$("#form-kunjungan").ajaxSubmit(function(data){
						$(".isi-form").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");;
						// $(".keterangan").html('Terima Kasih atas kesediaan saudara/i dalam mengisi form ini.');
						$(".isi-form").html(data);
						$("html, body").animate({ scrollTop: 0 }, "slow");
					});
				  } else if (result.isDenied) {
				  }
				})
		    },
		    errorElement: 'span',
		    errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		    }
		});

		$('body').on('click', '.btn-hapus', function(event){
        	var id = $(this).attr('data-id');

        	 Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'hapus laporan',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title:'Hapus',
		        text: 'Apakah anda yakin untuk menghapus laporan ?'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder.settings.paths.hapus,
					type: 'POST',
					data: {'id': id},
					beforeSend: function(){
						$(".isi-tabel").html("Tunggu ...");
					},
					success: function(data){
						$(".isi-tabel").html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});
	},

	report: function () {
		$('body').on('click', '.btn-filter', function(event){
        	petugas = $('#select2-petugas').find('option:selected').val();
			seksi = $('#select2-seksi').find('option:selected').val();
			giat = $('#select2-giat').find('option:selected').val();
			rt = $('#select2-rt').find('option:selected').val();
			rw = $('#select2-rw').find('option:selected').val();

			$.ajax({
				url: Gooder.settings.paths.filter,
				type: 'POST',
				data: {'petugas': petugas, 'seksi': seksi, 'giat': giat, 'rt': rt, 'rw': rw},
				beforeSend: function(){
					$(".isi-tabel").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					$(".div-export-excel").show();
					$(".isi-tabel").html(data);
				}
			});
		});

		$('body').on('click', '.btn-excel', function(event){
        	petugas = $('#select2-petugas').find('option:selected').val();
			seksi = $('#select2-seksi').find('option:selected').val();
			giat = $('#select2-giat').find('option:selected').val();
			rt = $('#select2-rt').find('option:selected').val();
			rw = $('#select2-rw').find('option:selected').val();

			$.ajax({
				url: Gooder.settings.paths.excel,
				type: 'POST',
				data: {'petugas': petugas, 'seksi': seksi, 'giat': giat, 'rt': rt, 'rw': rw},
				beforeSend: function(){
					// $(".isi-tabel").html("<i class='fa fa-spin fa-spinner'></i> Mohon Tunggu");
				},
				success: function(data){
					// window.open(Gooder.settings.paths.excel + '?petugas=' + petugas + '&seksi=' + seksi + '&giat=' + giat + '&rw=' + rw + '&rt=' + rt, '_blank');
					// window.open(Gooder.settings.paths.excel, '_blank');
					// $(".fullcontent_bersih").html(data);
				}
			});
		});
	},

	upload: function (){
        $('body').on('click','#upload-kunjungan-foto',function(e){
            e.preventDefault();
            var file_data = $('#kunjungan_foto').prop('files')[0];
            var form_data = new FormData();

            var id = $(this).attr('data-id');

            // alert(id);
            form_data.append('file', file_data);
            $.ajax({
                url: Gooder.settings.paths.uploadjpg + '/' + id,
                dataType: 'json', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data, 'id': id,
                type: 'post',
                beforeSend: function(){
                $("#pesan-upload-kunjungan-foto").html("Proses mengunggah ...");
           		},
                success: function(data,status){
                    if (data.status!='error') {
                        $('#kunjungan_foto').val('');
                        $("#pesan-upload-kunjungan-foto").html(data.msg);
                        $.ajax({
							url: Gooder.settings.paths.isiupload,
							type: 'POST',
							data: {'id': id},
							beforeSend: function(){
								$(".isi-upload-kunjungan-foto").html("Tunggu ...");
							},
							success: function(data){
								$(".isi-upload-kunjungan-foto").html(data);
								$.ajax({
									url: Gooder.settings.paths.bidang_nama,
									type: 'POST',
									data: {'id': id},
									beforeSend: function(){
										$(".div-bidang-nama").html("...");
										$("#td-bidang-" + id).html("...");
									},
									success: function(data){
										$(".div-bidang-nama").html(data);
										$("#td-bidang-" + id).html(data);
									}
								});
							}
						});
                    } else {
                        $("#pesan-upload-kunjungan-foto").html(data.msg);
                    }
                }
            });
        });

        $('body').on('click', '.btn-hapus-kunjungan-foto', function(event){
        	var id = $(this).attr('data-id');

        	 Swal.fire({
				showDenyButton: true,
				showCloseButton: true,
 				confirmButtonText: 'hapus foto',
 				denyButtonText: 'batal',
		        icon: 'warning',
		        title:'Hapus',
		        text: 'Apakah anda yakin untuk menghapus foto kunjungan ?'
		    }).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					url: Gooder.settings.paths.hapus_kunjungan_foto,
					type: 'POST',
					data: {'id': id},
					beforeSend: function(){
						$(".isi-upload-kunjungan-foto").html("Tunggu ...");
					},
					success: function(data){
						$(".isi-upload-kunjungan-foto").html(data);
					}
				});
			  } else if (result.isDenied) {
			  }
			})
		});

		$('body').on('click', '[data-toggle="lightbox"]', function(event) {
		    event.preventDefault();
		    $(this).ekkoLightbox();
		});
	},
	
	// Initialitation All Function
	init: function(){
		Gooder.kunjungan();
		Gooder.report();
		Gooder.upload();
	}
};

$(document).ready(function() {
	Gooder.init();
});