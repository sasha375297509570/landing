@extends('layouts.app')

@section('title', $title)

@section('content')
    <h3>{{ $title }}</h3>
    <p>{{ $content }}</p>
@stop