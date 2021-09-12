$(document).ready(function() {
  var i = 0;
  $("#anothermember").click(function () {
      ++i;
      $("#addmember").append(
        '<div id="member">'+
         '<hr style="background: black">'+
         '<div class="form-row align-items-center">'+
            '<div class="col-sm-4 my-1">'+
              '<div class="form-group">'+
                '<label for="firstname">Firstname</label>'+
                '<input type="text" class="form-control" id="firstname" name="addMoreInputFields['+i+'][firstname]" required placeholder="Enter Firstname">'+
                '<span class="text-danger error-text addMoreInputFields'+i+'firstname_err">&nbsp;</span>'+
              '</div>'+
            '</div>'+
            '<div class="col-sm-4 my-1">'+
              '<div class="form-group">'+
                '<label for="middleInitial">Middle Initial</label>'+
                '<input type="text" maxLength="1" class="form-control" id="middleInitial" name="addMoreInputFields['+i+'][middleInitial]" placeholder="Enter Middle Initial">'+
                '<span class="text-danger error-text addMoreInputFields'+i+'middleInitial_err">&nbsp;</span>'+
              '</div>'+
            '</div>'+
            '<div class="col-sm-4 my-1">'+
              '<div class="form-group">'+
                '<label for="lastname">Last Name</label>'+
                '<input type="text" class="form-control" id="lastname" name="addMoreInputFields['+i+'][lastname]" required placeholder="Enter Lastname">'+
                '<span class="text-danger error-text addMoreInputFields'+i+'lastname_err">&nbsp;</span>'+
              '</div>'+
            '</div>'+
          '</div>'+

          '<div class="form-row align-items-center">'+
            '<div class="col-sm-6 my-1">'+
                '<div class="form-group">'+
                  '<label for="contactno">Contact No.</label>'+
                  '<input type="text" class="form-control" maxLength="11" id="contactno" name="addMoreInputFields['+i+'][contactno]" required placeholder="Enter Contact No.">'+
                  '<span class="text-danger error-text addMoreInputFields'+i+'contactno_err">&nbsp;</span>'+
                '</div>'+
              '</div>'+
              '<div class="col-sm-6 my-1">'+
                '<div class="form-group">'+
                  '<label for="birthday">Birthday</label>'+
                  '<input type="date" class="form-control" id="birthday" name="addMoreInputFields['+i+'][birthday]" required>'+
                  '<span class="text-danger error-text addMoreInputFields'+i+'birthday_err">&nbsp;</span>'+
                '</div>'+
              '</div>'+
          '</div>'+

          '<div class="form-row align-items-center">'+
              '<div class="col-sm-12 my-1">'+
                   '<div class="form-group">'+
                      '<label for="address" class="col-form-label">Address</label>'+
                      '<input name="addMoreInputFields['+i+'][address]" required class="form-control" placeholder="Enter Address" type="text" id="address">'+
                      '<span class="text-danger error-text addMoreInputFields'+i+'address_err">&nbsp;</span>'+
                   '</div>'+
              '</div>'+
          '</div>'+

          '<div class="form-row align-items-center">'+
            '<div class="col-sm-6 my-1">'+
                '<div class="form-group">'+
                  '<label for="plateno">Plate No.</label>'+
                  '<input type="text" maxLength="30" class="form-control" id="plateno" name="addMoreInputFields['+i+'][plateno]" required placeholder="Enter Plate No.">'+
                  '<span class="text-danger error-text addMoreInputFields'+i+'plateno_err">&nbsp;</span>'+
                '</div>'+
              '</div>'+
              '<div class="col-sm-6 my-1">'+
                '<div class="form-group">'+
                  '<label for="licenseno">License No.</label>'+
                  '<input type="text" class="form-control" id="licenseno" name="addMoreInputFields['+i+'][licenseno]" maxLength="30" required placeholder="Enter License No.">'+
                  '<span class="text-danger error-text addMoreInputFields'+i+'licenseno_err">&nbsp;</span>'+
                '</div>'+
              '</div>'+
          '</div>'+

          '<div class="form-group">'+
            '<label for="email">Email address</label>'+
            '<input type="email" class="form-control" name="addMoreInputFields['+i+'][email]" required id="email" aria-describedby="emailHelp" placeholder="Enter email">'+
            '<small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>'+
            '<span class="text-danger error-text addMoreInputFields'+i+'email_err">&nbsp;</span>'+
          '</div>'+

          '<div class="form-group">'+
            '<label for="password">Password</label>'+
            '<input type="password" class="form-control" name="addMoreInputFields['+i+'][password]" id="password" required autocomplete="new-password" placeholder="Password">'+
            '<span class="text-danger error-text addMoreInputFields'+i+'password_err">&nbsp;</span>'+
          '</div>'+

          '<div class="form-group">'+
            '<label for="password_confirmation">Confirm Password</label>'+
            '<input type="password" class="form-control" name="addMoreInputFields['+i+'][password_confirmation]" id="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">'+
            '<span class="text-danger error-text addMoreInputFields'+i+'password_confirmation_err">&nbsp;</span>'+
          '</div>'+

          '<div class="form-group">'+
            '<button type="button" class="btn btn-flat btn-outline-danger remove-input-field" style="width: 100px">Delete</button>'+
          '</div>'+
        '</div>'
      );
  });

  $(document).on('click', '.remove-input-field', function () {
      $(this).parents('#member').remove();
  });
});