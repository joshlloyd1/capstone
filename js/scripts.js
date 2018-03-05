$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var addVendorBtn = $('#addVendorBtn');
    var editVendorBtn = $('#editVendorBtn');
    var viewVendorsBtn = $('#viewVendorsBtn');

    var addVendorForm = $('#addVendorForm');
    var editVendorForm = $('#editVendorForm, #selectVendorForm');
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


    var addInventoryBtn = $('#addInventoryBtn');
    var editInventoryBtn = $('#editInventoryBtn');
    var viewInventoryBtn = $('#viewInventoryBtn');

    var addInventoryForm = $('#addInventoryFormDisabled');
    var selectVendorForm = $('#inventorySelectVendorForm');
    var selectModelForm = $('#selectModelForm'); /*things are getting out of hand*/
    var editInventoryForm = $('#editInventoryForm');
    var viewInventory = $('#viewInventory')

    $(editInventoryForm).hide();
    $(addInventoryForm).hide();
    $(selectVendorForm).hide();
    $(selectModelForm).hide();

    $(addInventoryBtn).click(function(){
        //alert("I am an alert box!");

        $(addInventoryForm).show();
        $(selectVendorForm).show();
        $(selectModelForm).hide();
        $(editInventoryForm).hide();
        $(viewInventory).hide();

    });
    $(viewInventoryBtn).click(function(){
        //alert("I am an alert box!");

        $(addInventoryForm).hide();
        $(selectVendorForm).hide();
        $(selectModelForm).hide();
        $(editInventoryForm).hide();
        $(viewInventory).show();

    });
    $(editInventoryBtn).click(function(){
        //alert("I am an alert box!");

        $(addInventoryForm).hide();
        $(selectVendorForm).hide();
        $(selectModelForm).show();
        $(editInventoryForm).show();
        $(viewInventory).hide();
    });

});
