@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Directory</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                    <div id="container"></div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
        <div class="col-md-8">
            @foreach($Cards as $card)
	            <div class="col-md-3 onhover" id="{{$card->id}}" style="display: inline-block;">
	                <div class="module_holder">
	                    <div id="col-md-3">
	                        <input type="hidden" name="txtID" class="txtClass" value="{{$card->id}}">
	                        <img src="{{ URL::asset('images/') }}/{{$card->image}}" height="196px" width="100%">
	                        {{ $card->description }}
	                        <br>
	                        {{ $card->card_name }}
	                    </div>
	                </div>
	            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection