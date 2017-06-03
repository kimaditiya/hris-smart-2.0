// js modal create
$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#hr-devision-id-create', function(ehead){        
      $('#modal-devision').modal('show')
      .find('#modalContentdevision').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });