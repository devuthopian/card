<div class="modal fade" id="cropImageModal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeCropModal()">&times;</button>  
        <h4>Crop Image</h4>        
      </div>
      <div class="modal-body">
          <div class="profile_cont text-center" id="crop_image_form">
            <img src="" id="imageForCrop" />
            
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <br>
            <input type="button" value="Crop Image" onclick="return croppingImage()" class="btn btn-large btn-inverse" />
            
          </div>
      </div>
    </div>
  </div>
</div>