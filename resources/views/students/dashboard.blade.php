@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	<p>{{$message}}</p>
</div>

@endif
<div class="row">
	<div class="col-md-12">
		<div class="pull-left">
			<marquee behavior="" directon="">laravel 5.8 from scratch step by step</marquee>
		</div>
		<div style="margin-bottom: 20px;text-align: right;margin-right: 32px;">
			
		</div>
	</div>
</div>

<div class="containter" style="margin-left: 26px;margin-bottom: 30px;">
	<div class="row">
		
		<!-- <div class="col-md-3">
			<form action="/search" method="GET">
				
				<input type="search" name="search" placeholder="search" class="form-control">
				

			
		</div>
		
		<div class="col-md-3">
			<span><button class="btn btn-danger" type="submit">search</button></span>
		</div>
		</form> -->

		<form action="/search" method="get">
			<div class="input-group">
				<input type="search" name="search" class="form-control">
				<span class="input-group">
					<button type="submit">search</button>
				</span>
			</div>
		</form>

		<div class="col-md-6" style="margin-bottom: 20px;">
			<div>
			<a href="{{ route('students.create')}}" class="btn btn-lg btn-success">Register New Student</a>
		</div>
		</div>
	</div>
</div>

	<!-- @foreach($students as $s)
		<label>{{ $s->firstname }}</label>  
	@endforeach -->



<table class="table table-bordered table-dark">
	<tr>
		<th>#</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Country</th>
		<th>City</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
@foreach($students as $key => $student)
	<tr>
		<td>{{++$key}}</td>
		<td>{{$student->firstname}}</td>
		<td>{{$student->lastname}}</td>
		<td>{{$student->gender}}</td>
		<td>{{$student->country}}</td>
		<td>{{$student->city}}</td>
		<td>{{$student->address}}</td>
		<td>
			
		<form action="{{route('students.destroy',$student->id)}}" method="POST">
		@method('DELETE')
		@csrf
		<button type="submit" class="btn btn-danger">DELETE</button>

		<a href="{{route('students.show',$student->id)}}" class="btn btn-warning">SHOW</a>
		<a href="{{route('students.edit',$student->id)}}" class="btn btn-info">EDIT</a>
	</form>
		</td>
	</tr>
@endforeach
</table>
@endsection