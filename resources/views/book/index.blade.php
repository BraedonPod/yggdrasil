@extends('layouts.app')
<?php $pageTitle = "All Books"; ?>
@section('content')
    <div class="container">
        <h2>All Movies</h2>
        @foreach ($books as $book)
            <h3>{{ $book->title }}</h3>
            <small>Release Date: {{ $book->	published or 'N/A' }}</small>
            <p>{{ str_limit($book->description, 200) }}</p>
            
            
            <p><a href="/book/{{$book->slug}}">Read More</a></p>
        @endforeach
        
        
        <div class="pagination-links">
            {{ $books->links() }}
        </div>
        
    </div>

@endsection