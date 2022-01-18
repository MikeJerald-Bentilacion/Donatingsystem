<div id="addModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Schedule</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Schedule ID:</label>
                                <input name="txt_schedule" class="form-control input-sm" type="int" placeholder="Schedule ID"/>
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <input name="txt_date" class="form-control input-sm" type="date" placeholder="Date"/>
                            </div>
                            <div class="form-group">
                                <label>Time:</label>
                                <input name="txt_time" class="form-control input-sm" type="time" placeholder="Time"/>
                            </div>
                            <div class="form-group">
                                <label>Donor ID:</label>
                                <input name="txt_donor" class="form-control input-sm" type="int" placeholder="Donor ID"/>
                            </div>
                            <div class="form-group">
                                <label>Donor's Information:</label>
                                <input name="txt_donor_info" class="form-control input-sm" type="text" placeholder="Donor's Information"/>
                            </div>
                            <div class="form-group">
                                <label>Rider ID:</label>
                                <input name="txt_rider" class="form-control input-sm" type="int" placeholder="Rider ID"/>
                            </div>
                            <div class="form-group">
                                <label>Item ID:</label>
                                <input name="txt_item" class="form-control input-sm" type="int" placeholder="Item ID"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add" value="Add Schedule"/>
                </div>
            </div>
        </div>
    </form>
</div>