<?php
/**
 * Created by PhpStorm.
 * User: iotenti
 * Date: 2/20/2018
 * Time: 10:16 AM
 */
include_once ("adminHeader.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal">
                claick
            </button>
            <div class="modal fade" id="mymodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>HERE IS A TITL</h3>
                        </div>
                        <div class="modal-body">
                            <p>content</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once ("footer.html");