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
            	Notes
            	<span class="pull-right">
	            	<a href="javascript:void(0)" class="btn btn-warning" onclick="openCreateNotePopup()">
		        		<i class="fa fa-plus"></i> Add Note
		        	</a>
		        </span>
            </h2>
            <table>
                <tr>
                    <th class="col-sm-4">Description</th>
                    <th class="col-sm-2">Created</th>
                    <th class="col-sm-2">Actions</th>
                </tr>
                @if(!empty($notes))
                    @foreach($notes as $note)
                        <tr>
                            <td>{{strip_tags($note->description)}}</td>
                            <td>{{$note->created_at}}</td>
                            <td>
                            	<a href="javascript:void(0)" onclick="editNote({{$note->id}})">
                            		<i class="fa fa-edit"></i>
                            	</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center"> Not Available</td>
                    </tr>
                @endif
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                {!! $notes->render() !!}
            </div>
        </div>
    </div>
    @include('admin.notes.partials.notePopup')
@endsection
@section('page_scripts')
<script src="{{ asset('js/admin/notes/index.js') }}"></script>
@endsection