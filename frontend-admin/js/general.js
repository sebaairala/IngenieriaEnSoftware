website_title = 'Mi museo de ciencias panel de administrador!';
website_link = 'http://museo.hosted.nfoservers.com';
website_title = 'Museo';
URLBASE='http://52.15.159.160';

$(document).ready(function () {
    $("#website-link").attr("href", website_link)
    $("#website-title").text(website_title)
    document.title = website_title;
});
