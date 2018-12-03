$(document).ready(function () {
  if(!existCookie("token"))
  {
    $(location).attr('href', 'login.html')
  }
});
