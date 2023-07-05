var Gooder = {

	settings: {
		name: "Gooder Javascript",
		version: "1.0.0",

		paths: { 
			//menu
			// dashboard: "dashboard/dashboard/index",
			hapus: base_url_js + "dashboard/entry/hapus",

			submit_kunjungan: base_url_js + "awal/submit_kunjungan",
			form_kunjungan: base_url_js + "awal/form_kunjungan",
			form_pertanyaan: base_url_js + "awal/form_pertanyaan",
			modal_kunjungan_aksi: base_url_js + "dashboard/dashboard/modal_kunjungan_aksi",
			aksi_aksi: base_url_js + "dashboard/dashboard/aksi_aksi",
			modal_view_aksi: base_url_js + "dashboard/dashboard/modal_view_aksi",
			uploadjpg: base_url_js + "dashboard/upload/uploadjpg",
			isiupload: base_url_js + "dashboard/upload/isiupload",
			bidang_nama: base_url_js + "dashboard/dashboard/bidang_nama",
			hapus_kunjungan_foto: base_url_js + "dashboard/upload/hapus_kunjungan_foto",
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
		    	alamat: 'required',
		    	rw: 'required',
		    	rt: 'required',
		    	tinjau: 'required',
		    	saran: 'required',
		    	dokumentasi: {
		            required: true,
		            extension: "JPG|jpg|JPEG|jpeg|PNG|png",
		        },
		    },
		    messages: {
		      petugas: "Mohon untuk mengisi nama Petugas.",
		      seksi: "Mohon untuk memilih Seksi.",
		      giat: "Mohon untuk memilih Dasar Giat.",
		      alamat: "Mohon untuk mengisi Alamat.",
		      rw: "Mohon untuk memilih RW.",
		      rt: "Mohon untuk memilih RT.",
		      tinjau: "Mohon untuk mengisi Hasil Tinjau Lokasi.",
		      saran: "Mohon untuk mengisi Saran Masukan.",
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
		Gooder.upload();
	}
};

$(document).ready(function() {
	Gooder.init();
});