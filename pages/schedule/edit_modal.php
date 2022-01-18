<?php echo '<div id="editModal'.$row['pid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Schedule</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['pid'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Schedule ID: </label>
                    <input name="txt_edit_schedule" class="form-control input-sm" type="int" value="'.$row['schedule_id'].'"/>
                </div>
                <div class="form-group">
                    <label>Date: </label>
                    <input name="txt_edit_date" class="form-control input-sm" type="date" value="'.$row['date'].'"/>
                </div>
                <div class="form-group">
                    <label>Time: </label>
                    <input name="txt_edit_time" class="form-control input-sm" type="time" value="'.$row['time'].'"/>
                </div>
                <div class="form-group">
                    <label>Donor ID: </label>
                    <input name="txt_edit_donor" class="form-control input-sm" type="int" value="'.$row['donor_id'].'"/>
                </div>
                <div class="form-group">
                    <label>Donor Information: </label>
                    <input name="txt_edit_donor_info" class="form-control input-sm" type="text" value="'.$row['donor_info'].'"/>
                </div>
                <div class="form-group">
                    <label>Rider ID: </label>
                    <input name="txt_edit_rider" class="form-control input-sm" type="int" value="'.$row['rider_id'].'"/>
                </div>
                <div class="form-group">
                    <label>Item ID: </label>
                    <input name="txt_edit_item" class="form-control input-sm" type="int" value="'.$row['item_id'].'"/>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>