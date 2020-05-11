function formFieldsSignUp() {
    document.getElementById('loginForm').style.display = 'none'; 
    document.getElementById('signUpForm').style.display = 'block';
}

function formFieldsLogin() { 
    document.getElementById('signUpForm').style.display = 'none'; 
    document.getElementById('loginForm').style.display = 'block';
}

$(document).ready(function(){
    $("#btn-sup-ia").click(function(){
      $(".content-active").animate({left: '305px'});
    });
  });

  $(document).ready(function(){
    $("#btn-log-ia").click(function(){
      $(".content-active").animate({left: '625px'});
    });
  });