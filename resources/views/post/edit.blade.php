@extends('app')

@section('content')

    <h1 align="center">Update post</h1>

        {!! Form::model($post,['method' => 'PATCH', 'route' => ['post.update', $post->id]]) !!}
            <ul>

                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    <p></p>
                @endforeach
            </ul>

            <div class="form-group">
                {!! Form::label('slug') !!}
                {!! Form::text('slug', null, ['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title') !!}
                {!! Form::text('title', null, ['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Category') !!}
                {!! Form::text('Category', null, ['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('excerpt') !!}
                {!! Form::textarea('excerpt', null, ['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('published') !!}
                {!! Form::checkbox('published', null, false) !!}
            </div>
            <div class="form-group">
                {!! Form::label('published_at') !!}
                {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update', array('class' => 'btn btn-xs btn btn-danger')) !!}
            </div>
        {!! Form::close() !!}

@stop