@extends('app')

@section('content')

    <h1>About Me {{ $first }} {{ $last }}</h1>

    @if(count($people))
        <h3>People I like:</h3>
        <ul>
            @foreach($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
    @endif

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi debitis dicta dolorum ducimus molestias neque perferendis quaerat. Adipisci aperiam consequuntur facere ipsam, iusto labore sed totam. Debitis dignissimos id provident!
    </p>

@stop