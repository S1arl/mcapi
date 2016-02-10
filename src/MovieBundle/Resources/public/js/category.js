$('#result-moderate').hide();
$('#result-unknown').hide();
$(".well-known").click(function(){
    $("#result-well_known").toggle();
});
$('.Moderate').click(function() {
   $('#result-moderate') .slideToggle();
});
$('.Unknown').click(function() {
   $('#result-unknown') .toggle();
});

