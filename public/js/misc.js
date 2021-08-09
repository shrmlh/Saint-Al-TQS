(function($) {
    'use strict';
    $(function() {
      var sidebar = $('.sidebar');
  
      //Add active class to nav-link based on url dynamically
      //Active class can be hard coded directly in html file also as required
  
      function addActiveClass(element) {
  
        if (current === "") {
          //for root url
          if (element.attr('href').indexOf("index.html") !== -1) {
          //   element.parents('.nav-item').last().addClass('active');
            if (element.parents('.sub-menu').length) {
              element.closest('li').addClass('active');
              element.closest('.collapse').addClass('in');
            }
          }
        } else {
          //for other url
          if (element.attr('href').indexOf(current) !== -1) {
              element.parents('.nav-item').last().addClass('active');
            if (element.parents('.sub-menu').length) {
              element.closest('li').addClass('active');
              element.closest('.collapse').addClass('in');
            }
          }
        }
      }
  
      var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
      $('.metismenu li a', sidebar).each(function() {
        var $this = $(this);
        addActiveClass($this);
      })
    });
  })(jQuery);