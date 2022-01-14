@extends('front/layout.layout')

@section('title',$result[0]->name)

@section('page_name',$result[0]->name)


@section('container')

<style>
body {
  background: #f7f7f7;
}

.form-box {
  max-width: 500px;
  margin: auto;
  padding: 50px;
  background: #ffffff;
  border: 10px solid #f2f2f2;
}

h1, p {
  text-align: center;
}

input, textarea {
  width: 100%;
}

.btn-primary{
    margin-top: 20px;
}
</style>

<p>{{$result[0]->description}}</p>


<div class="form-box">

    <span style="color: green">{{session('msg')}}</span>
    <h1> Contact Us</h1>
    <form action="{{url('contact')}}" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" type="text" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input class="form-control" id="mobile" type="text" name="mobile" required>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" required></textarea>
      </div>
      <input class="btn btn-primary" type="submit" value="Submit" />
      </div>
    </form>
  </div>
			
@endsection