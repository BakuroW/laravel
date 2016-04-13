<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="/css/app.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
                                <li>{!! link_to_route('post.create', 'Create post') !!}</li>
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">
            <div class="col-md-3 .col-md-pull-9">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body" align="left">
                        <h3>Navigation:</h3>
                        <h5>By published/unpublished:</h5>
                        <p>{!! link_to_route('posts','Published') !!}</p>
                        <p>{!! link_to_route('posts.unpublished','Unpublished') !!}</p>
                        <h5>By categories:</h5>
                        <p>{!! link_to_route('posts.category1','Category1') !!}</p>
                        {{--{!! Form::open(['route' => 'posts.category']) !!}
                        --}}{{--{!! Form::open(array('url' => 'post/' . $post->id, 'class' => 'pull-right')) !!}--}}{{--
                        {!! Form::hidden('_method', 'POST') !!}
                        {!! Form::submit('Category1',  array('url' => 'posts.category' . $request->Category1, 'class' => 'pull-right')) !!}
                        {!! Form::close() !!}--}}
                        <p>{!! link_to_route('posts.category2','Category2') !!}</p>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
