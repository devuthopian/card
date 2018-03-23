<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=edge" >
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<title>MISBITS</title>
<link rel="shortcut icon" href="{{ URL::asset('images/favicon.png') }}" type="image/x-icon" />

<!-- style -->
<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/styles.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/fontawesome.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/fontawesome-all.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/JcCrop/css/jquery.Jcrop.css') }}" />




<!-- scripts -->
<script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap-social.css') }}" />
<script src="{{ URL::asset('assets/scripts.js') }}"></script>
<script src="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootbox/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/fine-uploader/jquery.fine-uploader.js') }}"></script>
<script src="{{ asset('assets/JcCrop/js/jquery.Jcrop.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

<script type="text/javascript">
  var base_url = {!! json_encode(url('/')) !!}
</script>