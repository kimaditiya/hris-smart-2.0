
// js modal create
$.fn.modal.Constructor.prototype.enforceFocus = function(){};  
    $(document).on('click','#hr-departement-id-create', function(ehead){        
      $('#modal-departement').modal('show')
      .find('#modalContentdepartement').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      .load(ehead.target.value);
    });

$.fn.modal.Constructor.prototype.enforceFocus = function(){};
     $('#modal-department-view').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var modal = $(this)
      var title = button.data('title')
      var href = button.attr('href')
      //modal.find('.modal-title').html(title)
      modal.find('.modal-body').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
      $.post(href)
        .done(function( data ) {
          modal.find('.modal-body').html(data)
        });
      })