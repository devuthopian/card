<div class="modal fade" id="createNoteModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 id="note_title">Add Note</h4>        
      </div>
      <div class="modal-body">
        {{ Form::open(array('route' => 'admin.notes.add', 'id' => 'addNote')) }}
          <div class="profile_cont">

            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, array('size' => '30x30', 'id' => 'description', 'required'=> true, 'placeholder'=>'Description')) }}
            <br>
            <input type="submit" value="Save" onclick="return validateNote()">
          </div>
          <input type="hidden" name="id" id="id">
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>