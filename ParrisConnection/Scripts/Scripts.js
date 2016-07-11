$(document).ready(function () {
    $("#FaceBookLink").click(function (e) {
        e.preventDefault();
        SelectLinkType("Facebook");
    });
    $("#GooglePlusLink").click(function (e) {
        e.preventDefault();
        SelectLinkType("Googleplus");
    });
    $("#YouTubeLink").click(function (e) {
        e.preventDefault();
        SelectLinkType("Youtube");
    });
    $("#LinkedInLink").click(function (e) {
        e.preventDefault();
        SelectLinkType("Linkedin");
    });
    $("#TwitterLink").click(function (e) {
        e.preventDefault();
        SelectLinkType("Twitter");
    });
    $("#PersonalLink").click(function (e) {
        e.preventDefault();
        SelectLinkType("Personal");
    });
});

function ToggleEdit(togglebutton)
{   
  $(togglebutton).toggle();
}

function SelectLinkType(type)
{
    $("#typelabel").text(type);
    $('input[name="secondtypelabel"]').val(type);
    
}



