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
  function removeAllActiveButtonMenu()
  {
    $("#button-menu-dashboard").removeClass("active")
    $("#button-menu-museum").removeClass("active")
    $("#button-menu-inventions").removeClass("active")
    $("#button-menu-inventors").removeClass("active")
    $("#button-menu-users").removeClass("active")
  }
  function hiddenAllPages()
  {
    $('#dashboard').attr('hidden','hidden');
    $('#museum').attr('hidden','hidden');
    $('#inventions').attr('hidden','hidden');
    $('#inventor').attr('hidden','hidden');
    $('#user').attr('hidden','hidden');
    $('#userprofile').attr('hidden','hidden');
  }

  //logout-button in top bar -> logout
  $("#user-profile-button").click(function ()
  {
    hiddenAllPages();
    logged_email = getCookieValue("email")
    logged_user = getCookieValue("user")
    logged_name = getCookieValue("name")
    $('#user-label-profile').text(logged_user);
    $('#email-input-profile').val(logged_email);
    $('#name-input-profile').val(logged_name);
    $('#userprofile').removeAttr('hidden');
  });



  $("#button-menu-dashboard").click(function ()
  {
    $("#button-menu-dashboard").addClass( "active" );
    removeAllActiveButtonMenu();
    hiddenAllPages();
    $('#dashboard').removeAttr('hidden');
  });


  function loadMuseumTable()
  {
    $('#dataTables-museum').empty();
    $('#dataTables-museum').append("<thead><tr><th>Name</th><th>Schedule</th><th>Address</th><th>Create User</th></tr></thead>");
    URL = URLBASE+"/museum";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          $('#dataTables-museum').append("<tbody id='dataTables-tbody-museum'></tbody>");
          var count = 0;
          jQuery.each(response.museum, function() {
            $('#dataTables-tbody-museum').append("<tr id='dataTables-tr-museum-"+count+"' class='odd gradeX'>");
            $('#dataTables-tr-museum-'+count).append("<td>"+this.Nombre+"</td>");
            $('#dataTables-tr-museum-'+count).append("<td>"+this.Horario+"</td>");
            $('#dataTables-tr-museum-'+count).append("<td>"+this.Direccion+"</td>");
            $('#dataTables-tr-museum-'+count).append("<td>1</td>");
            $('#dataTables-tbody-museum').append("</tr>");
            ++count;
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });
  }

  function loadInventorTable()
  {
    $('#dataTables-inventor').empty();
    $('#dataTables-inventor').append("<thead><tr><th>Name</th><th>Address</th><th>Birhtday</th><th>Create User</th></tr></thead>");
    URL = URLBASE+"/inventor";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          $('#dataTables-inventor').append("<tbody id='dataTables-tbody-inventor'></tbody>");
          var count = 0;
          jQuery.each(response.inventor, function() {
            $('#dataTables-tbody-inventor').append("<tr id='dataTables-tr-inventor-"+count+"' class='odd gradeX'>");
            $('#dataTables-tr-inventor-'+count).append("<td>"+this.Nombre+"</td>");
            $('#dataTables-tr-inventor-'+count).append("<td>"+this.Direccion+"</td>");
            $('#dataTables-tr-inventor-'+count).append("<td>"+this.FechaNacimiento+"</td>");
            $('#dataTables-tr-inventor-'+count).append("<td>"+this.CargaUsuario+"</td>");
            $('#dataTables-tbody-inventor').append("</tr>");
            ++count;
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });
  }

  $("#submit-button-inventions").click(function ()
  {
    name = $('#name-input-inventions').val();
    birthday = $('#birthday-input-inventions').val();
    inventor = $('#inventor-input-inventions').val();
    state = $('#state-input-inventions').val();
    museum = $('#museum-input-inventions').val();
    type = $('#type-input-inventions').val();
    garbage = $('#garbage-input-inventions').val();
    logged_token = getCookieValue("token");

    if(logged_token != "")
    {
      URL = URLBASE+"/invention";
      myData = 'idmuseo=' + museum + '&idinventor=' + inventor + '&idtipo=' + type + '&idestado=' + state + '&nombre=' + name + '&enalmacendescarte=' + garbage + '&token=' + logged_token;
      jQuery.ajax({
        type: "POST",
        url: URL,
        data: myData,
        success: function (response) {
          if(response.status)
          {
            alert("Invention loaded")
            loadInventionsTable();
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

  function loadSelectInfoInventions()
  {
    $('#state-input-inventions').empty();
    URL = URLBASE+"/inventionstate";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          jQuery.each(response.inventionsstate, function() {
            $('#state-input-inventions').append("<option value='"+this.Id+"'>"+this.Descripcion+"</option>");
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });

    $('#inventor-input-inventions').empty();
    URL = URLBASE+"/inventor";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          jQuery.each(response.inventor, function() {
            $('#inventor-input-inventions').append("<option value='"+this.Id+"'>"+this.Nombre+"</option>");
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });
    $('#museum-input-inventions').empty();
    URL = URLBASE+"/museum";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          jQuery.each(response.museum, function() {
            $('#museum-input-inventions').append("<option value='"+this.Id+"'>"+this.Nombre+"</option>");
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });
    $('#type-input-inventions').empty();
    URL = URLBASE+"/typeinvention";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          jQuery.each(response.inventionstype, function() {
            $('#type-input-inventions').append("<option value='"+this.Id+"'>"+this.Descripcion+"</option>");
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });
  }
  function loadInventionsTable()
  {
    $('#dataTables-inventions').empty();
    $('#dataTables-inventions').append("<thead><tr><th>Name</th><th>CreateDate</th><th>Create User</th><th>Inventor</th><th>Museum</th><th>Status</th><th>Garbage</th></tr></thead>");
    URL = URLBASE+"/invention";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          $('#dataTables-inventions').append("<tbody id='dataTables-tbody-inventions'></tbody>");
          var count = 0;
          jQuery.each(response.inventions, function() {
            $('#dataTables-tbody-inventions').append("<tr id='dataTables-tr-inventions-"+count+"' class='odd gradeX'>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.Nombre+"</td>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.FechaCreado+"</td>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.UsuarioNombre+"</td>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.InventorNombre+" "+this.InventorApellido+"</td>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.MuseoNombre+"</td>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.EstadoDescripcion+"</td>");
            $('#dataTables-tr-inventions-'+count).append("<td>"+this.EnAlmacenDescarte+"</td>");
            $('#dataTables-tbody-inventions').append("</tr>");
            ++count;
          });
        }
        else
        {
          alert("Error when change user data")
        }
      }
    });
  }

  function loadUserTable()
  {
    $('#dataTables-user').empty();
    $('#dataTables-user').append("<thead><tr><th>User</th><th>Name</th><th>Email</th><th>Rol</th></tr></thead>");
    URL = URLBASE+"/user";
    jQuery.ajax({
      type: "GET",
      url: URL,
      success: function (response) {
        if(response.status)
        {
          $('#dataTables-user').append("<tbody id='dataTables-tbody-user'></tbody>");
          var count = 0;
          jQuery.each(response.user, function() {
            $('#dataTables-tbody-user').append("<tr id='dataTables-tr-user-"+count+"' class='odd gradeX'>");
            $('#dataTables-tr-user-'+count).append("<td>"+this.Usuario+"</td>");
            $('#dataTables-tr-user-'+count).append("<td>"+this.Nombre+"</td>");
            $('#dataTables-tr-user-'+count).append("<td>"+this.Email+"</td>");
            $('#dataTables-tr-user-'+count).append("<td>"+this.RolDescripcion+"</td>");
            $('#dataTables-tbody-user').append("</tr>");
            ++count;
          });
        }
        else
        {
          alert("Error when change get data")
        }
      }
    });
  }

  $("#button-menu-museum").click(function ()
  {
    removeAllActiveButtonMenu();
    $("#button-menu-museum").addClass( "active" );
    hiddenAllPages();
    $('#museum').removeAttr('hidden');
    loadMuseumTable();
  });

  $("#button-menu-inventions").click(function ()
  {
    removeAllActiveButtonMenu();
    $("#button-menu-inventions").addClass( "active" );
    hiddenAllPages();
    loadSelectInfoInventions();
    $('#inventions').removeAttr('hidden');
    loadInventionsTable();
  });

  $("#button-menu-inventors").click(function ()
  {
    removeAllActiveButtonMenu();
    $("#button-menu-inventors").addClass( "active" );
    hiddenAllPages();
    $('#inventor').removeAttr('hidden');
    loadInventorTable();
  });

  $("#button-menu-users").click(function ()
  {
    removeAllActiveButtonMenu();
    $("#button-menu-users").addClass( "active" );
    hiddenAllPages();
    $('#user').removeAttr('hidden');
    loadUserTable();
  });

  $("#submit-button-profile").click(function ()
  {
    logged_user = $('#user-label-profile').text();
    logged_email = $('#email-input-profile').val();
    logged_name = $('#name-input-profile').val();
    logged_password = $('#password-input-profile').val();

    if(logged_password != "")
    {
      URL = URLBASE+"/user";
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


  /*************************************************
  *************************************************/
  //Museum
  $("#submit-button-museum").click(function ()
  {
    input_name = $('#name-input-museum').val();
    input_schedule = $('#schedule-input-museum').val();
    input_address = $('#address-input-museum').val();
    logged_token = getCookieValue("token");

    URL = URLBASE+"/museum";
    myData = 'name=' + input_name + '&hour=' + input_schedule + '&address=' + input_address + '&token=' + logged_token;
    jQuery.ajax({
      type: "POST",
      url: URL,
      data: myData,
      success: function (response) {
        if(response.status)
        {
          loadMuseumTable();
          alert("Museum loaded in databse")
        }
        else
        {
          alert("Error when load museum data")
        }
      }
    });
  });
  $("#submit-button-inventor").click(function ()
  {
    input_name = $('#name-input-inventor').val();
    input_lastname = $('#lastname-input-inventor').val();
    input_address = $('#address-input-inventor').val();
    logged_token = getCookieValue("token");

    URL = URLBASE+"/inventor";
    myData = 'name=' + input_name + '&lastname=' + input_lastname + '&address=' + input_address + '&token=' + logged_token;
    jQuery.ajax({
      type: "POST",
      url: URL,
      data: myData,
      success: function (response) {
        if(response.status)
        {
          loadInventorTable();
          alert("inventor loaded in databse")
        }
        else
        {
          alert("Error when load inventor data")
        }
      }
    });
  });


});
