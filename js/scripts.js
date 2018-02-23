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

    var addInventoryForm = $('#addInventoryForm, #selectVendorForm');
    var editInventoryForm = $('#editInventoryForm');
    var viewInventory = $('#viewInventory')
    var view = "";
    var add = "";
    var edit = "";

    $(editInventoryForm).hide();
    $(addInventoryForm).hide();

    $(addInventoryBtn).click(function(){
        //alert("I am an alert box!");
        view = "FALSE";
        add = "TRUE";
        edit = "FALSE";
        $(addInventoryForm).show();
        $(editInventoryForm).hide();
        $(viewInventory).hide();

    });

    $(viewInventoryBtn).click(function(){
        //alert("I am an alert box!");
        view = "TRUE";
        add = "FALSE";
        edit = "FALSE";
        $(addInventoryForm).hide();
        $(editInventoryForm).hide();
        $(viewInventory).show();

    });
    $(editInventoryBtn).click(function(){
        //alert("I am an alert box!");
        view = "FALSE";
        add = "FALSE";
        edit = "TRUE";
        $(addInventoryForm).hide();
        $(editInventoryForm).show();
        $(viewInventory).hide();
    });

});
if(window.location.pathname === '/htdocs/capstone/assets/adminInventory.php') {

}
$('.dropdown-menu a').click(function(){
    $('#selected').text($(this).text());
});