<!-- Modal -->
<div id="inviteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send Invitation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => 'invite', 'id' => 'invite')) }}
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label>Email</label>
                            </div>  
                            <div class="col-sm-10">
                                <input type="text" data-role="tagsinput" name="email" id="email" class="invite tagsinput">
                            </div>                          
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 text-right">
                                <button type="button" onclick="return sendInvitation()" class="btn btn-success buttonsubmit">Send Invitation</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>
</div>