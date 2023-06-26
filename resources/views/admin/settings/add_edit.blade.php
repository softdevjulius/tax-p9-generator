<form method="post" action="{{route("settings_update",['id'=>$id])}}" class="modal-dialog" role="document">
    @csrf
    @method("PUT")
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Billed Amount </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="number" step="0.01" name="billed_amount" class="form-control" value="{{get_settings(\App\Models\Setting::LABEL['BILLED_AMOUNT'])}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>
