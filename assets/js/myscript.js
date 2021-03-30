

const flashData = $('.flash-data').data('flashdata');

	if (flashData) {
		Swal({
			title: 'success',
			text: 'The data ' + flashData,
			type: 'success'
		});
	};

//login
const flashDataLogin = $('.flashdata-login').data('flashdata');

	if (flashDataLogin) {
		Swal.fire({
		  position: 'top-end',
		  type: 'success',
		  title: 'authentication is successful',
		  showConfirmButton: false,
		  timer: 2000
		})
	};
	

$('.log-sweet').on('click', function(e){

	e.preventDefault();
	const href = $(this).attr('href');
	
	Swal({
	  title: 'Logout',
	  text: 'Are you sure you want to quit ?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes!'
	}).then((result) => {
	  if (result.value) {
	  	 document.location.href = href;
	  }
	});
});


//tombol-hapus pada tabel
$('.tombol-hapus').on('click', function(e){
	//mematikan fungsi href dlu utk sweetalert
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
	  title: 'Delete',
	  text: "Are you sure you want to delete this data ?",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, Delete!'
	}).then((result) => {
	  if (result.value) {
	  	 document.location.href = href;
	  }
	});
});

//change password jika gagal
const currentPassword = $('.currentPass').data('flashdata');

	if (currentPassword) {
		Swal.fire({
			title: 'Wrong',
			text: currentPassword,
			type: 'error'
		});
	};

//jika succes
const successChangePass = $('.succes-change-pass').data('flashdata');

	if (successChangePass) {
		Swal.fire({
			title: 'success',
			text: successChangePass,
			type: 'success'
		});
	};

		