@extends('front/layout.layout')

@section('page_title','Home Page')

@section('container')

<div class="container px-4 px-lg-5">
	<div class="row gx-4 gx-lg-5 justify-content-center">
		<div class="col-md-10 col-lg-8 col-xl-7">
			<!-- Post preview-->

			@foreach ($result as $list )
				
			<div class="post-preview">
				<a href="post.html">
					<h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
					<h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
				</a>
				<p class="post-meta">
					Posted
					on September 24, 2021
				</p>

				@endforeach

			</div>
		</div>
	</div>
</div>
@endsection