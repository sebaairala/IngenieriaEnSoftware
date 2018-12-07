$(document).ready(function () {
  URL = URLBASE+"/invention";
  jQuery.ajax({
    type: "GET",
    url: URL,
    success: function (response) {
      if(response.status)
      {
        var count = 0;
        jQuery.each(response.inventions, function() {
          if(count%3 == 0)
          {
            $('#gallery').append("<div class='row'>");
          }
          $('#gallery').append("<div class='col-lg-3 col-md-6 single-blog'><div class='thumb'><img class='img-fluid' src='img/b4.jpg' alt='></div>");
          $('#gallery').append("<p class='date'>10 Jan 2018</p> <a href='#'><h4>"+this.Nombre+"</h4></a><p>Inventor: "+this.InventorNombre+" "+this.InventorApellido+"<br>Museum: "+this.MuseoNombre+"<br>State: "+this.EstadoDescripcion+"</p>");
          $('#gallery').append("<div class='meta-bottom d-flex justify-content-between'><p><span class='lnr lnr-heart'></span> "+Math.floor((Math.random() * 10) + 1)+" Likes</p> </div> </div>");
          if(count !=0 && count%3 == 0)
          {
            $('#gallery').append("</div>");
            count = 0;
          }
          else
          {
            ++count;
          }
        });
      }
      else
      {
      }
    }
  });
});
