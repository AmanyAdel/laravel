@extends("layouts/index")


@section("styles")
	<style>
		h1 {
			color: red;
		}
	</style>
@endsection


@section("content")
	<div class="col-md-6 col-md-offset-3">
		@foreach($tasks as $task)
		<ul>
			<li>{{ $task->title }}</li>
			<li>{{ $task->description }}</li>
			<li>
				<a href="{{ URL('/delete') }}/{{ $task->id }}" class="btn btn-danger">Delete</a>
				<a href="{{ URL('/edit') }}/{{ $task->id }}" class="btn btn-primary">Edit</a>
			</li>
			
		</ul>
		@endforeach

		<form  action="#" method="POST" novalidate>
			{{-- {{ csrf_token() }} --}}
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<input type="text" name="description" class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Add Task" class="btn btn-primary">
			</div>
		</form>
	</div>