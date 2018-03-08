<div class="modal fade" id="invitePeopleModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="col-sm-12 second_inner">
        <div class="invite_link_cont">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Invite People to <?php echo e($profile->name); ?>'s Attic <br> Share this link to let people access this profile</h4>
          <div class="hed">
            <input type="text" name="inviteUrl" id="inviteUrl" value="<?php echo url('share'); ?>?id=<?php echo $profile->id ?>" readonly><input type="button" value="COPY" onclick="copyInviteLink()">
            <p>Invites expire in one day by default</p>
          </div>
          <div class="bot">
            <label>
              <input type="checkbox" name="neverExpire" id="neverExpire"> Set link to never expire
            </label>
            <input type="hidden" name="invitation_id" id="invitation_id">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>