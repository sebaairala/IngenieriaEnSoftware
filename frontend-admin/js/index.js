$(document).ready(function () {

  //Show user name in top bar.
  logged_user = getCookieValue("user")
  $("#logged-user").text(logged_user)


  //logout-button in top bar -> logout
  $("#logout-button").click(function ()
  {
    deleteCookie("token");
    deleteCookie("user");
    deleteCookie("email");
    deleteCookie("rol");
    deleteCookie("name");
    window.location.reload();
  });

  //logout-button in top bar -> logout
  $("#user-profile-button").click(function ()
  {
    $('#dashboard').attr('hidden','hidden');
    logged_email = getCookieValue("email")
    logged_user = getCookieValue("user")
    logged_name = getCookieValue("name")
    $('#user-label-profile').text(logged_user);
    $('#email-input-profile').val(logged_email);
    $('#name-input-profile').val(logged_name);
    $('#userprofile').removeAttr('hidden');
  });

  $("#submit-button-profile").click(function ()
  {
    logged_user = $('#user-label-profile').text();
    logged_email = $('#email-input-profile').val();
    logged_name = $('#name-input-profile').val();
    logged_password = $('#password-input-profile').val();

    if(logged_password != "")
    {
      URL = "http://52.15.159.160/user";
      myData = 'name=' + logged_name + '&email=' + logged_email + '&user=' + logged_user + '&password=' + logged_password;
      jQuery.ajax({
        type: "PUT",
        url: URL,
        data: myData,
        success: function (response) {
          if(response.status)
          {
            deleteCookie("email");
            deleteCookie("name");
            setCookie("email",logged_email)
            setCookie("name",logged_name)
            alert("User data changed")
          }
          else
          {
            alert("Error when change user data")
          }
        }
      });
    } else
    {
        alert("Password empty, please enter it.")
    }
    return false;
  });

});
