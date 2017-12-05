@extends('layouts.app')
<?php $pageTitle = $movie->title; ?>
@section('content')
	<div class="media-cover-wrapper">
		<div class="user-cover no-edit">
			<div class="cover-photo" style="background-image: url( {{ $movie->banner_url }} )">
			<!--<div class="cover-photo">-->
				<div class="container">
					<div class="row"></div>
				</div>
				<div class="dark-cover-overlay"></div>
			</div>
		</div>
		<nav class="cover-nav navbar navbar-light">
			<div class="container">
				<div class="row">
					<div class="nav navbar-nav">
						<a class="nav-item nav-link active" href="#">Summary</a> 
						<a class="nav-item nav-link" href="#">Characters</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="is-sticky media-sidebar--sticky">
			<div class="media-sidebar">
				<div class="lazy-image is-loaded">
					<span class="media-poster">
						<div class="media-favorite">
                            
			            </div>
			            <a href="{{ $movie->img_url }}" data-toggle="lightbox">
							<img src="{{ $movie->img_url }}">
						</a>
					</span>
				</div>
				<div class="library-state with-header">
					<span class="entry-state-header"><span>Library Status</span></span>
					
					@if($movie->status_entry() == NULL)
						<?php $status = ''; ?>
					@else
						<?php $status = $movie->status_entry()->status; ?>
					@endif
					
					<library-status
				        item_status="{{ $status }}"
				        item_id="{{ $movie->id }}"
				        item_type="Movie"
				        logged_in="{{ Auth::check() }}"
				    ></library-status>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-8 col-md-9">
					<section class="media--title">
						<h3>{{ $movie->title }} <span class="titleYear">({{ $movie->release_date }})</span></h3>
					</section>
					<section class="media-info">
					    <p>
					        {{ $movie->status }}
					        <span class="ghost">|</span>
					        <time>{{ $movie->movie_length }} min</time>
					        <span class="ghost">|</span>
							@foreach ($movie->genres as $genre)
								@if ($loop->last)
								    <a href="#">{{ $genre->name }}</a>
								@else
									<a href="#">{{ $genre->name }}, </a>
								@endif
							@endforeach
					        
					        <span class="ghost">|</span>
					        {{ humanize_date($movie->release_info) }}
					    </p>
					</section>
					<section class="media-synopsis">
						<p>{{ $movie->description }}</p>
					</section>
					
					<hr />
					
					<section class="media-credits">
					    <div class="credits-item">
						    <strong>Director:</strong>
                                @foreach ($movie->directors as $director)
									{{ $director->name }}
								@endforeach
						</div>
						<div class="credits-item">
							<strong>Stars:</strong>
								@foreach ($movie->stars as $star)
									<a href="#">{{ $star->name }}</a> -
									@if ($loop->last)
									    <a href="#">{{ $star->name }}</a>
									@endif
								@endforeach
					    </div>

					</section>
					
					<section class="media-review">
					    <p>
					        <div class="review-item">
					            <div class="reviewScore score_favorable">
					                <span>{{ $movie->metascore }}</span>
					            </div>
					            <div class="review-item-sub">Metascore</div>
					        </div>
					        <div class="divider"></div>
					        
					        <div class="review-item">
					            <div class="reviewScore score_favorable">
					                <span>{{ mt_rand (1*10, 10*10) / 10 }}</span>
					            </div>
					            <div class="review-item-sub">User Review</div>
					        </div>
					        <div class="divider"></div>
					        <div class="review-item">
						      <like
						        likes_count="{{ $movie->likes_count }}"
						        liked="{{ $movie->isLiked() }}"
						        item_id="{{ $movie->id }}"
						        item_type="Movie"
						        logged_in="{{ Auth::check() }}"
						      ></like>
					        </div>
				        </p>
					</section>
					
					<hr />
					
					<section class="media-comment">
						<h5>Comments</h5>
						<div>
							<div class="stream-add-content">
								<div class="add-content-header">
									@if (Auth::check())
										<form action="/comment/create" method="POST">
											{{ csrf_field() }}
											<input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}" />
                        					<input type="hidden" id="source_id" name="source_id" value="{{ $movie->id }}" />
                        					<input type="hidden" id="source_type" name="source_type" value="Movie" />
                        					<input id="replyid" type="hidden" name="replytoid" value="" />
											<textarea id="body" style="display:none;" rows="5" name="body"></textarea>
											<div id="addcomment" name="test" class="form-control" data-text="Post about {{ $movie->title }}..."
											contenteditable="true" style="min-height:124px;"></div>
											<input type="submit" class="btn btn-primary block-min" value="Publish">
										</form>
										
									@else
										<div style="display: inline-block; font-size: 16px; color: #999; vertical-align: middle;">
											Post about {{ $movie->title }}...
										</div>
									@endif
								</div>
							</div>
						</div>
					</section>
					@if(count($movie->comments) != 0)
						<section class="media-feed">
						    @foreach($movie->comments as $comment)
					            @if($comment->parent_id == NULL)
									<div class="stream-item">
										<div class="stream-item-comments">
											<ul class="media-list">
												<li class="media new-comment">
													<div class="media-left">
														<a href="#">
															<div class="media-object lazy-image is-loaded">
																<img src="https://media.kitsu.io/users/avatars/8718/small.jpeg?1509765670">
															</div>
														</a>
													</div>
													<div class="media-body">
														<h4 class="media-heading"><a href="#">{{ $comment->author->username }}</a></h4>
														<span class="comment-body">
															<p>{{ htmlspecialchars_decode($comment->body) }}</p>
														</span>
														<div class="stream-item-activity">
															<a href="#" class="like-stream-item"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
															<span class="sm-comment-count">{{ rand(1,10) }}</span>
															<span class="seperator"> - </span>
															<small class="comment-reply"><a data-toggle="reply" data-parent="{{ $comment->id }}" data-author="{{ $comment->author->username }}" href="#addcomment">Reply</a></small>
															<span class="seperator"> - </span>
															<small class="comment-time">
																<?php 
																	$now = date("Y-m-d");
																	$now = DateTime::createFromFormat('Y-m-d', $now);
																	$posted = date("Y-m-d", strtotime($comment->created_at));
																	$posted = DateTime::createFromFormat('Y-m-d', $posted);
																	$days = $now->diff($posted)->format("%a");
																	if($days > 1){ $days = $days." days ago"; }
																	else {$days = $days." day ago";}
																?>
																{{ $days }}
															</small>
															<div class="stream-comment-options d-inline-block">
																<span class="more-wrapper">
																	<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="more-drop">
																	  <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
																	</a>
																	<div class="dropdown-menu">
																	  <a href="#"class="dropdown-item">
																		Copy Link to Post
																	  </a>
																	</div>
																</span>
															</div>
														</div>
														<!-- Replies -->
														@if ($comment->replies)
															<ul class="media-list reply-list">
																@foreach($comment->replies as $reply)
																	<li class="media new-comment">
																		<div class="media-left">
																			<a href="#">
																				<div class="media-object lazy-image is-loaded">
																					<img src="https://media.kitsu.io/users/avatars/8718/small.jpeg?1509765670">
																				</div>
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">{{ $reply->author->username }}</a></h4>
																			<span class="comment-body">
																				<p>{{ htmlspecialchars_decode($reply->body) }}</p>
																			</span>
																			<div class="stream-item-activity">
																				<a href="#" class="like-stream-item"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
																				<span class="sm-comment-count">{{ rand(1,10) }}</span>
																				<span class="seperator"> - </span>
																				<small class="comment-reply"><a data-toggle="reply" data-parent="{{ $comment->id }}" data-author="{{ $reply->author->username }}" href="#addcomment">Reply</a></small>
																				<span class="seperator"> - </span>
																				<small class="comment-time">
																					<?php 
																						$now = date("Y-m-d");
																						$now = DateTime::createFromFormat('Y-m-d', $now);
																						$posted = date("Y-m-d", strtotime($reply->created_at));
																						$posted = DateTime::createFromFormat('Y-m-d', $posted);
																						$days = $now->diff($posted)->format("%a");
																						if($days > 1){ $days = $days." days ago"; }
																						else {$days = $days." day ago";}
																					?>
																					{{ $days }}
																				</small>
																				<div class="stream-comment-options d-inline-block">
																					<span class="more-wrapper">
																						<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="more-drop">
																						  <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
																						</a>
																						<div class="dropdown-menu">
																						  <a href="#"class="dropdown-item">
																							Copy Link to Post
																						  </a>
																						</div>
																					</span>
																				</div>
																			</div>
																		</div>
																	</li>
																@endforeach
															</ul>
														@endif
													</div>
												</li>
											</ul>
										</div>
									</div>
								@endif 
						    @endforeach
						</section>
					@endif
				</div>
			</div>
	    </div>
@endsection