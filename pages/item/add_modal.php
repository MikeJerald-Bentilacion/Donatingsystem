<div id="addModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item ID:</label>
                                <input name="txt_item" class="form-control input-sm" type="int" placeholder="Item ID"/>
                            </div>
                            <div class="form-group">
                                <label>Donor ID:</label>
                                <input name="txt_donor" class="form-control input-sm" type="int" placeholder="Donor ID"/>
                            </div>
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
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add" value="Add Item"/>
                </div>
            </div>
        </div>
    </form>
</div>