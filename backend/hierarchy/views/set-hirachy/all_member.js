$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#hr-hirachy-id-create', function(ehead){        
      $('#modal-member').modal('show')
      .find('#modalContentmember').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });