$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var addVendorBtn = $('#addVendorBtn');
    var editVendorBtn = $('#editVendorBtn');
    var viewVendorsBtn = $('#viewVendorsBtn');

    var addVendorForm = $('#addVendorForm');
    var editVendorForm = $('#editVendorForm');
    var viewVendors = $('#viewVendors')

    $(editVendorForm).hide();
    $(addVendorForm).hide();


    $(addVendorBtn).click(function(){
        //alert("I am an alert box!");

        $(addVendorForm).show();
        $(editVendorForm).hide();
        $(viewVendors).hide();

    });

    $(viewVendorsBtn).click(function(){
        //alert("I am an alert box!");

        $(addVendorForm).hide();
        $(editVendorForm).hide();
        $(viewVendors).show();

    });
    $(editVendorBtn).click(function(){
        //alert("I am an alert box!");

        $(addVendorForm).hide();
        $(editVendorForm).show();
        $(viewVendors).hide();

    });
});