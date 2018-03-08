<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=edge" >
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title>MISBITS</title>
<link rel="icon" type="image/png" href="images/logo.png">

<!-- style -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/bootstrap.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/vendor/css/styles.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/fontawesome.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/fontawesome-all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/sweetalert2/dist/sweetalert2.min.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- scripts -->
<script src="<?php echo e(URL::asset('assets/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/scripts.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/sweetalert2/dist/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/bootbox/bootbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/common.js')); ?>"></script>

<script type="text/javascript">
  var base_url = <?php echo json_encode(url('/')); ?>

</script>