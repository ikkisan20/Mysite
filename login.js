
$(document).ready(function(){
  $('.login-info-box').fadeOut();
  $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
  if($('#log-login-show').is(':checked')) {
      $('.register-info-box').fadeOut(); 
      $('.login-info-box').fadeIn();
      
      $('.white-panel').addClass('right-log');
      $('.register-show').addClass('show-log-panel');
      $('.login-show').removeClass('show-log-panel');
      
  }
  else if($('#log-reg-show').is(':checked')) {
      $('.register-info-box').fadeIn();
      $('.login-info-box').fadeOut();
      
      $('.white-panel').removeClass('right-log');
      
      $('.login-show').addClass('show-log-panel');
      $('.register-show').removeClass('show-log-panel');
  }
});

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

var typingEffect = new Typed(".multiText",{
  strings : ["Login"],
  loop : true,
  typeSpeed : 100,
  backSpeed: 80,
  backDelay : 1500, 
})

var typingEffect = new Typed(".multiText1",{
  strings : ["Register"],
  loop : true,
  typeSpeed : 100,
  backSpeed: 80,
  backDelay : 1500, 
})