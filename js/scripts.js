var reference = document.querySelector('body > section > div > div > div > div:nth-child(1) > div:nth-child(2)');
var popper = document.querySelector('.my-popper');

$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var addVendorButton = document.querySelector(['body > section > div > div > div > button']);
    $(addVendorButton).click(function(){
        $('.visibleDiv').hide();
        $('.hidden').show();
    });

    $(popper).hide();
    $(reference).click(function(){
        $(popper).show();
        var anotherPopper = new Popper(reference, popper,{
            placement:'right'
        });
    });

});

