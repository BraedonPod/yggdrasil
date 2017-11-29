@extends('profile.index')

@section('data')


	<div class="feed-stream col-md-8">
		{{ $user->library_entries_books }}
		<hr />
		{{ $user->library_entries_movies }}
	</div>
	<div class="feed-sidebar col-sm-4">
		<div class="about-me-panel">
			<h6 class="panel-heading">About Me</h6>
			<p>{{ $user->profile->about or '...' }}</p>
			<ul class="about-me-stats">
				<li class="about-status">
				    <span class="stat-icon"><i class="fa fa-globe" style="color:grey" aria-hidden="true"></i></span> 
				    <strong>Status:</strong> 
				    	<span style="color: green;">Online</span>
				</li>
				<li class="about-status about--gender">
				    <span class="stat-icon">
				        <svg height="10" viewbox="0 0 10 10" width="10" xmlns="http://www.w3.org/2000/svg">
					    <path d="M5 5A2.5 2.5 0 1 0 5.001.001 2.5 2.5 0 0 0 5 5zm0 1.25c-1.669 0-5 .838-5 2.5V10h10V8.75c0-1.662-3.331-2.5-5-2.5z" fill="#686868" fill-rule="evenodd"></path>
					    </svg></span> 
					    
					<strong>Gender:</strong> 
						<span>{{ $user->profile->gender or 'Did you just assume my gender?' }}</span>
				</li>
				<li class="about-status about--location"><span class="stat-icon"><svg height="13" viewbox="0 0 9 13" width="9" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.5.25A4.372 4.372 0 0 0 .125 4.625C.125 7.906 4.5 12.75 4.5 12.75s4.375-4.844 4.375-8.125A4.372 4.372 0 0 0 4.5.25zm0 5.937a1.563 1.563 0 1 1 .001-3.126A1.563 1.563 0 0 1 4.5 6.187z"
						  fill="#686868" fill-rule="evenodd"></path></svg></span>
						  
					<strong>Location:</strong>
						<span>{{ $user->profile->location or 'North Pole' }}</span>
				</li>
				<li class="about-status about--birthday"><span class="stat-icon"><svg height="11" viewbox="0 0 10 11" width="10" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 .262s-.75 1.152-.75 1.571c0 .42.35.786.75.786s.75-.367.75-.786C5.75 1.414 5 .262 5 .262zm-1 2.88v1.572H2c-1.1 0-2 .943-2 2.096 0 .522.195.99.5 1.358V11h9V8.168c.305-.368.5-.836.5-1.358 0-1.153-.9-2.096-2-2.096H6V3.143H4zm-2 2.62h6c.55 0 1 .471 1 1.048 0 .576-.45 1.047-1 1.047-1.1 0-1.5-1.047-1.5-1.047S6 7.857 5 7.857 3.5 6.81 3.5 6.81 3.1 7.857 2 7.857c-.55 0-1-.471-1-1.047 0-.577.45-1.048 1-1.048z"
						  fill="#686868" fill-rule="evenodd"></path></svg></span> 
						  
					<strong>Birthday:</strong> 
						<span>{{ $user->profile->birthday or '...' }}</span>
					</li>
				<li class="about-status about--cal"><span class="stat-icon"><svg height="11" viewbox="0 0 11 11" width="11" xmlns="http://www.w3.org/2000/svg">
					<path d="M3.875 4.958H2.792v1.084h1.083V4.958zm2.167 0H4.958v1.084h1.084V4.958zm2.166 0H7.125v1.084h1.083V4.958zm1.084-3.791H8.75V.083H7.667v1.084H3.333V.083H2.25v1.084h-.542c-.6 0-1.078.487-1.078 1.083L.625 9.833c0 .596.482 1.084 1.083 1.084h7.584c.595 0 1.083-.488 1.083-1.084V2.25c0-.596-.488-1.083-1.083-1.083zm0 8.666H1.708V3.875h7.584v5.958z"
						  fill="#686868" fill-rule="evenodd"></path></svg></span> 
					<strong>Join Date:</strong> 
						<span>{{ $user->created_at }}</span>
					</li>
			</ul>
		</div>
		<div>
			<div class="favorite-series-panel">
				<h6 class="panel-heading">Favorite Series</h6>
				@if ($user->favorites != NULL)
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a aria-expanded="true" class="nav-link active" data-toggle="tab" href="#favorite-movie" role="tab">Movies</a>
						</li>
						<!--<li class="nav-item">-->
						<!--	<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#favorite-tvshow" role="tab">Tv Shows</a>-->
						<!--</li>-->
					</ul>
					<div class="tab-content">
						<div aria-expanded="true" class="tab-pane active" id="favorite-movie" role="tabpanel">
							<div class="favorite-media-grid row">
								@foreach ($user->favorites as $fav)
									<div aria-label="{{ $fav->title }}" class="favorite-item col-xs-3 hint--top hint--bounce hint--rounded">
										<a href="/movie/{{ $fav->slug }}">
										<div class="lazy-image is-loaded"><img src="{{ $fav->img_url }}"></div></a>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection