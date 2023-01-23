<div class="modal fade interest-paid-details-modal-lg{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h4 class="modal-title" id="myModalLabel">See details below.</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Date Diff</td>
                            <td>Y0 : M1: D0</td>
                        </tr>
                        <tr>
                            <td>OR Number</td>
                            <td>{{ $ornumber }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>