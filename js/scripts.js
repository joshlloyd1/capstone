$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

});
$( function() {
    $( "#datepicker" ).datepicker();
} );
$(function(){
    $('input[type="time"][value="time"]').each(function(){
        var d = new Date(),
            h = d.getHours()+2,
            m = d.getMinutes();
        if(h < 10) h = '0' + h;
        if(m < 10) m = '0' + m;
        $(this).attr({
            'value': h + ':' + m
        });
    });
});
