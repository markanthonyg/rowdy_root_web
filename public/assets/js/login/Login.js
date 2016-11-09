'use strict';
/*! main.js - v0.1.1
 * http://admindesigns.com/
 * Copyright (c) 2015 Admin Designs;*/

/* Login theme functions. Required for
 * Settings Pane and misc functions */
var Login = function() {

  // Demo AdminForm Functions
  var runLoginForms = function() {

    // Prevents directory response when submitting a demo form
    $('#login').on('submit', function(e) {

      e.preventDefault;

      var data = $("#loginform").serializeArray();
      $.ajax({
        url : "/login",
        type: "POST",
        data : data,
        beforeSend: function(){
            // $("#loader-wrapper").show();
        },
        complete: function(){
            // $("#loader-wrapper").hide();
        },
        success:function(data, textStatus, jqXHR)
        {
          // do something on success
          alert(textStatus);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          // do something on error
          alert(errorThrown);
        }
      });


      return false;
    });

    // give file-upload preview onclick functionality
    var fileUpload = $('.fileupload-preview');
    if (fileUpload.length) {

      fileUpload.each(function(i, e) {
        var fileForm = $(e).parents('.fileupload').find('.btn-file > input');
        $(e).on('click', function() {
          fileForm.click();
        });
      });
    }

  }

  return {
    init: function() {
      runLoginForms();
    }
  }
}();
