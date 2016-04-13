@extends('app')

@section('content')

    <h1 align="center">Create</h1>

        {!! Form::open(['route' => 'post.store']) !!}

                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    <p></p>
                @endforeach
            @include('post._form')
        {!! Form::close() !!}

@stop

