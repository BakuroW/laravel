@extends('app')

@section('content')
{{--<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>


			</div>
		</div>
	</div>
</div>--}}

    <div class="panel-body">
        <h3 align="center">You are logged in!</h3>
        <p align="center">View recent blog entries - {!! link_to_route('posts','Click here') !!}</p>
    </div>

@endsection
