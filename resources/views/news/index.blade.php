@extends('layouts.app')

@section('title', 'News page')

@section('content')
    @if ($news)
        @foreach ($news as $newsArticle)
             <h3>{{ $newsArticle->title }}</h3>
             <p>{{ $newsArticle->content }}</p>
        @endforeach
        <p>{{ $news->links() }}</p>       
    @endif    
@stop