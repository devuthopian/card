<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<title>MISBITS</title>
<link rel="shortcut icon" href="{{ URL::asset('images/favicon.png') }}" type="image/x-icon" />
<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/styles.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/style.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">

<script src="{{ URL::asset('assets/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/scripts.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

<script type="text/javascript">
	var base_url = {!! json_encode(url('/')) !!}
</script>