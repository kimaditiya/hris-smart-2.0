
   function WinClose() {
             $.ajax({
               url: yiiOptions.logoff,
               type:'POST'
             });
             // return true;
    }

    
    window.onbeforeunload = WinClose;