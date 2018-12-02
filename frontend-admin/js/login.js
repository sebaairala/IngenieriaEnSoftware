$(document).ready(function () {
  $("#button-login").click(function () {
    var js_user = $("#user-input").val();
    var js_password = $("#password-input").val();
    var js_remember = $("remember-input").is(":checked");
    var hasError = false;

    if ('' == js_user) {
      alert("Introduzca un usuario para logear")
      hasError = true;
    }

    if ("" == js_password) {
      alert("Introduzca un password para logear")
      hasError = true;
    }
    if(!hasError)
    {
      URL = "http://52.15.159.160/login/"+js_user+"/"+js_password;
      jQuery.ajax({
        type: "GET",
        url: URL,
        success: function (response) {
          if(response.status)
          {
            if (js_remember)
            {
              setCookie("token",response.token, 20)
              setCookie("user",response.user, 20)
              setCookie("email",response.email, 20)
              setCookie("name",response.name, 20)
              setCookie("rol",response.rol, 20)
            }
            else
            {
              setCookie("token",response.token)
              setCookie("user",response.user)
              setCookie("email",response.email)
              setCookie("name",response.name)
              setCookie("rol",response.rol)
            }
            $(location).attr('href', 'index.html')
          } else
          {
            alert("User / Password incorrect!")
          }
        }
      });
      return false;
    }
  });
});
