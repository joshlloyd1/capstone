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