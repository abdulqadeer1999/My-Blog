@extends('front/layout.layout')

@section('title',$result[0]->title)

@section('page_name',$result[0]->title)


@section('container')

<p>{{$result[0]->long_desc}}</p>
			
@endsection