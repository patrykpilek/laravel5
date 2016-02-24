@extends('app')

@section('content')
    <h1>Write New Article</h1>
    <hr />

    {!! Form::model($article = new \App\Article, ['url'=>'articles']) !!}
        @include('articles.form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}

    {{--{{ var_dump($errors) }}--}}
    @include('errors.list')
@stop