@extends('layouts.app')
<?php $pageTitle = "Explore"; ?>
@section('content')

    <div class="container">
        <section class="explore-section">
            <h3>Highest Movie Metascore</h3>
            <div class="row">
                @foreach($movies as $movie)
                    <div class="col-sm-2 col-md-2">
                        <div class="lazy-image is-loaded">
                            <img style="height: 220px; width: 155px;" src="{{ $movie->img_url }}">
                        </div>
                    </div>  
                @endforeach
            </div>
        </section>
        
        <section class="explore-section">
            <h3>Highest Book Score</h3>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-sm-2 col-md-2">
                        <div class="lazy-image is-loaded">
                            <img style="height: 220px; width: 155px;" src="{{ $book->img_url }}">
                        </div>
                    </div>  
                @endforeach
            </div>
        </section>
    </div>

@endsection