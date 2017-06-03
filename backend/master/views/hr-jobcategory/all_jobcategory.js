$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#hr-jobcategory-id-create', function(ehead){        
      $('#modal-jobcategory').modal('show')
      .find('#modalContentjobcategory').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });