@extends('layouts.app')

@section('title', 'Admin page')

@section('content')
    <h3>Activities list</h3>
    @if ($activities)
        <table>
        <tr>
            <td>URL</td><td>Количество визитов</td><td>Последнее посещение</td>
        <tr>    	
        @foreach ($activities as $activity)             
            <tr>
                <td>{{ $activity['url'] }}</td> <td>{{ $activity['total'] }}</td> <td>{{ $activity['accured_at'] }}</td>
            </tr>
        @endforeach
        </table>
        <p>{{ $activities->links() }}</p>       
    @endif    
@stop
