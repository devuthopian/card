@extends('admin.layouts.main')

@section('content')
    <div class="admin_cont">
        <div class="tracking_cont">

        	@if (session('success'))
	            <div class="alert alert-success">
	                {{ session('success') }}
	            </div>
	        @endif 

            <h2>
            	Connections
            </h2>
        </div>
    </div>
    @include('admin.notes.partials.notePopup')
@endsection
@section('page_scripts')
<script src="{{ asset('js/admin/notes/index.js') }}"></script>
@endsection