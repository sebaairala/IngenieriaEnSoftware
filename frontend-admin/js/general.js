website_title = 'Mi museo de ciencias panel de administrador!';
website_link = 'http://museo.hosted.nfoservers.com';
website_title = 'Museo';


$(document).ready(function () {
    $("#website-link").attr("href", website_link)
    $("#website-title").text(website_title)
    document.title = website_title;
});
