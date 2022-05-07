(function($) {
  showSwal = function(type) {
    'use strict';
    
    
    if (type === 'warning-message-and-cancel') {
      swal({
       // title: 'Are you sure?',
        title:'Do you really want to delete?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
          }
        }
      })

    } 
})(jQuery);