$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var addVendorButton = document.querySelector(['body > section > div > div > div > button']);
    $(addVendorButton).click(function(){
        $('.visibleDiv').hide();
        $('.hidden').show();


    });
});


var ref = $('.vendor');
var popper = $('.popper');
$(popper).hide();
$(ref).click(function(){
    $(popper).show();

    /*
    var anotherPopper = new Popper (ref, popper,{
        placement:'right'
    });
    */
});
/*
$(ref).click(function(){
    $(this).attr('class', 'vandor vendorChange');
});
*/