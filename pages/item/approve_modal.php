<div id="approveModal<?php echo $row['pid'];?>" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Receive Donation</h4>
                </div>
                <div class="modal-body">
                    <?php
                        echo '
                            <input type="hidden" value="'.$row['pid'].'" name="hidden_id" id="hidden_id"/>';
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Donation Type:</label>
                                <input name="txt_donation" class="form-control input-sm" type="text" placeholder="Type of Donation"/>
                            </div>
                        <div class="form-group">
                            <label>Total Item:</label>
                            <input name="txt_no" class="form-control input-sm" type="int" placeholder="Number of Item"/>
                        </div>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                <input type="submit" class="btn btn-primary btn-sm" name="btn_approve" value="Receive"/>
            </div>
        </div>
    </form>
</div>