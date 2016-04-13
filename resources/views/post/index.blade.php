@extends('app')

@section('content')

    @foreach($posts as $post)
        <article>
            <div class="list-group">
                        <a href="#" class="list-group-item active">
                            <h4 class="list-group-item-heading"  align="center">{!!$post->title!!}</h4>
                            <p class="list-group-item-text" align="left">Category: {!!$post->Category!!}</p>
                            <p class="list-group-item-text" align="left">{!!$post->excerpt!!}</p>
                            <p class="list-group-item-text" align="left"> Published: {{$post->published_at}}</p>

                <span class="pull-right">
                        @if (Auth::check())
                        {!! link_to_route('post.edit','Update',$post->id, array('class' => 'btn btn-xs btn btn-success pull-right')) !!}
                        {!! Form::open(array('url' => 'post/' . $post->id, 'class' => 'pull-right')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('DELETE', array('class' => 'btn btn-xs btn btn-danger')) !!}
                        {!! Form::close() !!}
                        @endif
                </span>
                        </a>
                <div>
                    <p>&nbsp</p>
                </div>
            </div>
        </article>

    @endforeach

@stop