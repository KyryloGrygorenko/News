(function($) {
    $(function() {
      if (!$.cookie('smartCookies')) {

        function getWindow(){
          $('.offer').arcticmodal({
            closeOnOverlayClick: false,
            closeOnEsc: true
          });
        };

        setTimeout (getWindow, 10000);
      }

       $.cookie('smartCookies', true, {
         expires: 180,
         path: '/'
       });

    })
  })(jQuery)