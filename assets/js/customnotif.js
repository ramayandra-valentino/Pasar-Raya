document.getElementById('btnlogin').addEventListener('click', (e) => {
    Swal.fire({
        icon: "success",
        title: "Success"
    })
})

$('.btn-login').on('click', function (e) {
	e.preventDefault();
	<?php if ($this->session->set_flashdata('error'))
        {
	?>
        Swal.fire({
  		icon: 'error',
  		title: 'Oops...',
  		text: 'Something went wrong!',
  		footer: 'Why do I have this issue?'
		})
	<?php
		}
	?>
})