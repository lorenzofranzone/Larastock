@extends('template.default')

@section('title','Page')
    
@section('content')
    <h1>{{$title}}</h1>
    @foreach($staff as $person)
    <ul>
        <li>{{$staff['name']}}</li>
        <li>{{$staff['lastname']}}</li>
        <li>{{$test}}</li>
    </ul>
    @endforeach

    @endsection