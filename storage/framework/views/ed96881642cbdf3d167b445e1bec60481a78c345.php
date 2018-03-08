<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cards</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Card</button>
                    <div id="container"></div>
                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="col-md-8">
            <?php $__currentLoopData = $Cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 onhover" id="<?php echo e($card->id); ?>" style="display: inline-block;">
                <div class="module_holder">
                    <div id="col-md-3">
                        <input type="hidden" name="txtID" class="txtClass" value="<?php echo e($card->id); ?>">
                        <img src="<?php echo e(URL::asset('images/')); ?>/<?php echo e($card->image); ?>" height="196px" width="100%">
                        <?php echo e($card->description); ?>


                        <br>

                        <?php echo e($card->card_name); ?>


                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Card</h4>
                </div>
                <div class="modal-body">
                    <form action="card/save" method="post" enctype="multipart/form-data" class="formid">
                        <?php echo e(csrf_field()); ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Card Name</label>
                                    <input type="text" name="txtName" class="txtName">
                                </div>
                                <div class="col-md-8">
                                    <textarea rows="4" cols="34" name="txtDescription" class="txtDescription"></textarea>
                                </div>
                                <div class="col-md-8">
                                    <img src="" class="imagealb" height="70%" width="100%">
                                    <input type="file" name="image" class="image">
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-success buttonsubmit">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.imagealb').hide();
        $(".onhover",this).hover(function() {
            var id = $(this).attr('id');
            $( this ).append( $( '<button type="button" class="mybutton btn btn-primary" >Edit Card</button><button id="Delete">Delete</button>' ) );
            //$("#container").append('<div class="module_holder"></div>');
            $('.mybutton').click(function(event) {
                //var id  = $(this).attr('id');
               // var id = $(this).find(".txtID").val(); 
                console.log(id);           
                $.ajax({
                    url: '/edit/card/'+id,
                    type: 'POST',
                    //data: {title: title, body: body, published_at: published_at},
                })
                .done(function(data) {
                    $('.imagealb').show();
                    var response = JSON.parse(data);

                    $('.modal-title').text('Edit Card');
                    $('.txtName').val(response.card_name);
                    $('.txtDescription').text(response.description);
                    $('.imagealb').attr('src',"<?php echo e(URL::asset('images/')); ?>/"+response.image);
                    $('.formid').attr('action', 'card/update/'+id);
                    $('.buttonsubmit').text('Update');
                    //console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                $('#myModal').modal();
            });

            $('#Delete').click(function(event) {
                $.ajax({
                    url: '/card/delete/'+id,
                    type: 'GET',
                    //data: {title: title, body: body, published_at: published_at},
                }).done(function(data) {
                    var response = JSON.parse(data);
                    if(response == 'success'){
                        location.reload();          
                    }
                    //console.log("success");
                });
            });
            },
        function() {
            $( this ).find( "button" ).remove();
        }
        );

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>