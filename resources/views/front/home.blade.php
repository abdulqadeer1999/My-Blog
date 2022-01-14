@extends('front/layout.layout')

@section('title','Home Page')

@section('page_name','My First Blog')

@section('container')

<div class="container px-4 px-lg-5">
	<div class="row gx-4 gx-lg-5 justify-content-center">
		<div class="col-md-10 col-lg-8 col-xl-7">
			<!-- Post preview-->

			@foreach ($result as $list )
				
			<div class="post-preview">
				<a href="{{url('post/'.$list->id)}}">
					<h2 class="post-title">{{$list->title}}</h2>
					<h3 class="post-subtitle">{{$list->short_desc}}</h3>
				</a>
				<p class="post-meta">
				Posted on {{$list->post_date}}
				</p>

				@endforeach

			</div>
		</div>
	</div>
</div>
@endsection