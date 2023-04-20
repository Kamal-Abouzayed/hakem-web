
//remove-alert

$(document).on('click', '.remove-button', function (e) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true
  })

  swalWithBootstrapButtons.fire({
    title: 'هل ترغب في حذف العنصر ؟',
    type: 'warning',
    showCancelButton: true,
    heightAuto:true,
    confirmButtonText: 'نعم',
    cancelButtonText: 'لا',
  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons.fire({
        type: 'success',
        title: 'تم الحذف  بنجاح',
        showConfirmButton: false,
        timer: 1000
      });
      $(this).closest(".remove-product").remove();

    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
     
    }
  })

});


$(document).on('click', '.remove-all-btn', function (e) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true
  })

  swalWithBootstrapButtons.fire({
    title: 'هل ترغب في حذف الجميع ؟',
    type: 'warning',
    showCancelButton: true,
    heightAuto:true,
    confirmButtonText: 'نعم',
    cancelButtonText: 'لا',
  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons.fire({
        type: 'success',
        title: 'تم الحذف  بنجاح',
        showConfirmButton: false,
        timer: 1000
      });
      $(".remove-all").remove();

    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
     
    }
  })

});