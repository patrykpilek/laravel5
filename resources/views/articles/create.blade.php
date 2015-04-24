@extends('app')

@section('content')
    <h1>Write New Article</h1>
    <hr />

    {!! Form::open(['url'=>'articles']) !!}
        @include('articles.form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}

    {{--{{ var_dump($errors) }}--}}
    @include('errors.list')
@stop