// js modal create
$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#hr-section-id-create', function(ehead){        
      $('#modal-section').modal('show')
      .find('#modalContentsection').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });