jQuery(function ($) {
    //処理を書く部分
    $('.p-humburger-btn').on('click', function(){
        $('.c-humburger, .c-drawer, .l-content, body').toggleClass('is-active');
      });
  });