  $.ui.fancytree.debugLevel = 1; // silence debug output
 function logEvent(event, data, msg){
    msg = msg ? ": " + msg : "";
     $.ui.fancytree.info("Event('" + event.type + "', node=" + data.node + ")" + msg);
  }


$(function(){
$("#fancyree_tree").fancytree({
    
      toggleEffect: { effect: "drop", options: {direction: "left"}, duration: 400 },

    
     activate: function(event, data) {
        // logEvent(event, data);
        var node = data.node;

         $.ajax({
             url: yiiOptions.setmember,
             type: 'GET',
             data: { id: node.key} ,
             dataType: 'html',
            beforeSend: function() {
                $("#member-loading-id").show();
            },
            complete: function(){
                $("#member-loading-id").hide();
            }, 
             success: function(data){
               $('#output').html(data);
             }
         });

         return false; // don't follow the link
        // acces node attributes
        // if( !$.isEmptyObject(node.data) ){
        //  alert("custom node data: " + JSON.stringify(node.data));
        // }
      },
     
    })
  });