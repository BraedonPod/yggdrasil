@extends('layouts.app')
<?php $pageTitle = "All Movies"; ?>
@section('content')
    <div class="container">
        <h2>All Movies</h2>
        @foreach ($movies as $movie)
            <h3>{{ $movie->title }}</h3>
            <small>Release Date: {{ $movie->release_date or 'N/A' }}</small>
            <p>{{ $movie->description }}</p>
            
            
            <p><a href="/movie/{{$movie->slug}}">Read More</a></p>
        @endforeach
        
        
        <div class="pagination-links">
            {{ $movies->links() }}
        </div>
        
    </div>

@endsection