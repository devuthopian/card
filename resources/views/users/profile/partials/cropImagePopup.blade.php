<div class="modal fade" id="cropImageModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeCropModal()">&times;</button>  
        <h4>Crop Image</h4>        
      </div>
      <div class="modal-body">
          <div class="profile_cont text-center">
            <img src="" id="imageForCrop" style="max-width: 400px" />
            <img src="" id="preview">
            <form action="crop.php" method="post" onsubmit="return checkCoords();">
              <input type="hidden" id="x" name="x" />
              <input type="hidden" id="y" name="y" />
              <input type="hidden" id="w" name="w" />
              <input type="hidden" id="h" name="h" />
              <br>
              <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
            </form>
          </div>
      </div>
    </div>
  </div>
</div>