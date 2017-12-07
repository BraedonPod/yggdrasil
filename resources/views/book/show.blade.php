@extends('layouts.app')
<?php $pageTitle = $book->title; ?>
@section('content')

	<div class="media-cover-wrapper">
		<div class="user-cover no-edit">
			<div class="cover-photo" style="background-image: url( {{ $book->banner_url }} )">
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
			            <a href="{{ $book->img_url }}" data-toggle="lightbox">
						    <img src="{{ $book->img_url }}">
						</a>
					</span>
				</div>
				<div class="library-state with-header">
					<span class="entry-state-header"><span>Add to Library</span></span>
					
					@if($book->status_entry() == NULL)
						<?php $status = ''; ?>
					@else
						<?php $status = $book->status_entry()->status; ?>
					@endif
					
					<library-status
				        item_status="{{ $status }}"
				        item_id="{{ $book->id }}"
				        item_type="Book"
				        logged_in="{{ Auth::check() }}"
				    ></library-status>
				    
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-8 col-md-9">
					<section class="media--title">
						<h3>{{ $book->title }} <span class="titleYear">({{ date("Y", strtotime($book->published)) }})</span></h3>
						<h5><small>by </small>{{ $book->author }}</h5>
					</section>
					<section class="media-info">
					    <p>
					        {{ $book->status }}
					        <span class="ghost">|</span>
					        <time>{{ $book->pages }} pages</time>
					        <span class="ghost">|</span>
							@foreach ($book->genres as $genre)
							    @if ($loop->last)
							        <a href="#">{{ $genre->name }}</a>
								@else
								    <a href="#">{{ $genre->name }}, </a>
								@endif
							@endforeach
					        
					        <span class="ghost">|</span>
					        {{ $book->publishing_company }}
					        <span class="ghost">|</span>
					        {{ humanize_date($book->published) }}
					    </p>
					</section>
					<section class="media-info">
					    <p>
                            ISBN10: {{ $book->isbn_10 }}
                            <span class="ghost">|</span>
                            ISBN13: {{ $book->isbn_13 }}
					    </p>
					</section>
					<section class="media-synopsis">
						<p>{{ $book->description }}</p>
					</section>
					
					<hr />
					
					<section class="media-review">
					    <p>
					        <div class="review-item">
					            <div class="reviewScore score_favorable">
					                <span>{{ $book->score }}</span>
					            </div>
					            <div class="review-item-sub">Score</div>
					        </div>
					        <div class="divider"></div>
					        
					        <div class="review-item">
					            <div class="reviewScore score_favorable">
					                <span>{{ $book->user_review }}</span>
					            </div>
					            <div class="review-item-sub">User Review</div>
					        </div>
					        <div class="divider"></div>
					        <div class="review-item">
						      <like
						        likes_count="{{ $book->likes_count }}"
						        liked="{{ $book->isLiked() }}"
						        item_id="{{ $book->id }}"
						        item_type="Book"
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
											<input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                        					<input type="hidden" name="source_id" value="{{ $book->id }}" />
                        					<input id="replyid" type="hidden" name="replytoid" value="" />
                        					<input type="hidden" name="source_type" value="Book" />
											<textarea style="max-width: 100%;" class="form-control" rows="5" name="body" 
											placeholder="Post about {{ $book->title }}..."></textarea>
											
											<input type="submit" class="btn btn-primary block-min" value="Publish">
										</form>
									@else
										<div style="display: inline-block; font-size: 16px; color: #999; vertical-align: middle;">
											Post about {{ $book->title }}...
										</div>
									@endif
								</div>
							</div>
						</div>
					</section>
						@if(count($book->comments) != 0)
						<section class="media-feed">
						    @foreach($book->comments as $comment)
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
															<p>{{ $comment->body }}</p>
														</span>
														<div class="stream-item-activity">
															<a href="#" class="like-stream-item"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
															<span class="sm-comment-count">{{ rand(1,10) }}</span>
															<span class="seperator"> - </span>
															<small class="comment-reply"><a href="#">Reply</a></small>
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
																			<p>{{ $reply->body }}</p>
																		</span>
																		<div class="stream-item-activity">
																			<a href="#" class="like-stream-item"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
																			<span class="sm-comment-count">{{ rand(1,10) }}</span>
																			<span class="seperator"> - </span>
																			<small class="comment-reply"><a href="#">Reply</a></small>
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