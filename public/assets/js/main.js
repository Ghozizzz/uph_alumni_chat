var uph = {};

$("#btn_login_modal").on('click',function(){
    $(this).text('Please Wait ...');
    uph.login_modalbtn();
});

$("#btn_signup_modal").on('click',function(){
    $(this).prop('disabled', true).text('Please Wait ...');
    uph.signup();
});

$("#btn_forget_modal").on('click',function(){
    if($.trim($("#forget-email").val()) == ""){
      alert('Please fill your email');
    }else if($.trim($("#forget-nim").val()) == ""){
      alert('Please fill your nim');
    }else{
      $(this).prop('disabled', true).text('Please Wait ...');
      uph.forget_password();
    }
});

$('#submit-verification').on('click',function(){
    if($.trim($("#ver-fullname").val()) == ""){
      alert('Please fill your fullname');
    }else if($.trim($("#ver-email").val()) == ""){
      alert('Please fill your email');
    }else if($.trim($("#ver-phonenumber").val()) == ""){
      alert('Please fill your phone number');
    }else if($.trim($("#ver-studyprogram").val()) == ""){
      alert('Please fill your study program');
    }else if($.trim($("#ver-batchyear").val()) == ""){
      alert('Please fill your batch year');
    }else if($.trim($("#ver-file").val()) == ""){
      alert('Please upload your identity');
    }else{
      $(this).prop('disabled', true);
      $('#form_verification').submit(); 
    }
});

uph.forget_password = function(){
  const email = $('#forget-email').val();
  const nim = $('#forget-nim').val();

    const forgetData = {
      'nim' : nim,
      'email' : email
    }

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: forgetData,
      url: uph.base_url+'/forget_password',
      type: 'post',
      complete: function() {
      },
      error : function(data){
        var error = JSON.parse(data);
        alert(error.message);
      },
      success: function(data) {
        var response = JSON.parse(data);
        if(response.error == 0){
          // window.location.href = uph.success_reg;
          $('#success_forget_email').text(response.email);

          $("#modal-account .modal-dialog").eq(0).css("display", "flex");
          $("#modal-account .modal-dialog").eq(1).css("display", "none");
          $(".modal-body form").css("display", "none");
          $(".modal-header").eq(0).css("display", "none");
          $(".sign-up-success").eq(0).css("display", "none");
          $(".sign-up-failed").eq(0).css("display", "none");
          $(".forget-success").eq(0).css("display", "block");
        }else{
          alert(response.message);

          $("#modal-account .modal-dialog").eq(0).css("display", "flex");
          $("#modal-account .modal-dialog").eq(1).css("display", "none");
          $(".modal-body form").css("display", "none");
          $(".modal-header").eq(0).css("display", "none");
          $(".sign-up-success").eq(0).css("display", "none");
          $(".sign-up-failed").eq(0).css("display", "block");
          $(".forget-success").eq(0).css("display", "none");
        }
        $('#btn_forget_modal').text('SUBMIT').prop('disabled', false);
      }
    });
}

uph.signup = function(){
  const phone = $('#phoneNumber').val();
  const birthdate = $('#birthdate').val();
  const nim = $('#studentId').val();

    const signupData = {
      'nim' : nim,
      'birthdate' : birthdate,
      'phone' : phone
    }

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: signupData,
      url: uph.base_url+'/signup',
      type: 'post',
      complete: function() {
      },
      error : function(data){
        var error = JSON.parse(data);
        alert(error.message);
      },
      success: function(data) {
        var response = JSON.parse(data);
        if(response.error == 0){
          // window.location.href = uph.success_reg;
          $('#success_email').text(response.email);
          uph.signup_success();
        }else if(response.error == 1){
          alert(response.message);

          $("#modal-account .modal-dialog").eq(0).css("display", "flex");
          $("#modal-account .modal-dialog").eq(1).css("display", "none");
          $(".modal-body form").css("display", "none");
          $(".modal-header").eq(0).css("display", "none");
          $(".sign-up-success").eq(0).css("display", "none");
          $(".sign-up-failed").eq(0).css("display", "block");
          $(".forget-success").eq(0).css("display", "none");
        }else{
          alert(response.message);
        }
        $('#btn_signup_modal').text('SIGN UP').prop('disabled', false);
      }
    });
}

uph.signup_success = function(){
    $("#modal-account .modal-dialog").eq(0).css("display", "flex");
    $("#modal-account .modal-dialog").eq(1).css("display", "none");
    $(".modal-body form").css("display", "none");
    $(".modal-header").eq(0).css("display", "none");
    $(".sign-up-success").eq(0).css("display", "block");
    $(".sign-up-failed").eq(0).css("display", "none");
    $(".forget-success").eq(0).css("display", "none");
}

uph.failed_verified = function(){
    $("#modal-account .modal-dialog").eq(0).css("display", "flex");
    $("#modal-account .modal-dialog").eq(1).css("display", "none");
    $(".modal-body form").css("display", "none");
    $(".modal-header").eq(0).css("display", "none");
    $(".sign-up-success").eq(0).css("display", "none");
    $(".sign-up-failed").eq(0).css("display", "block");
    $(".forget-success").eq(0).css("display", "none");
}

uph.login_modalbtn = function(){
    const email_login = $("#modal_email").val();
    const password_login = $("#modal_password").val();
    
    if(email_login === '' || password_login === ''){
      alert("your email or password can't be blank");
      return false;
    }

    const requestData = {
      'login_type' : 1, //Dari Modal
      'email' : email_login,
      'password' : password_login,
    }

    doLogin(requestData);
}

uph.login_homebtn = function(){
    const email_login = $("#inputEmail").val();
    const password_login = $("#inputPassword").val();
    
    if(email_login === '' || password_login === ''){
      alert("your email or password can't be blank");
      return false;
    }

    const requestData = {
      'login_type' : 1, //Dari Modal
      'email' : email_login,
      'password' : password_login,
    }

    doLogin(requestData);
}

function doLogin(requestData){
    $.ajax({
  		headers: {
  			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		},
  		data: requestData,
  		url: uph.base_url+'/login',
  		type: 'post',
  		complete: function() {
  		},
  		error : function(data){
  			var error = JSON.parse(data);
  			alert(error.message);
  		},
  		success: function(data) {
  			var response = JSON.parse(data);
  			if(response.error === 0){
  				location.reload();
  			}else{
          $('#btn_login_modal').text('LOGIN');
  			 	alert(response.message);
  			}
  		}
    });
}

//Hide Alert
setTimeout(function() {
    $(".alertime").hide(500);
}, 5000);