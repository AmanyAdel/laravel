@extends("layouts/index")


@section("styles")
	<style>
		h1 {
			color: red;
		}
	</style>
@endsection


@section("content")

	<h1 class="text-center">Edit Your Task</h1>
	<div class="col-md-6 col-md-offset-3">
		<form  method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				{{-- <input type="hidden" name="id" value="{{ $task->id }}"> --}}
				<input type="text" name="name" value="{{ $task->title }}" class="form-control">
			</div>
			<div class="form-group">
				<input type="text" name="description" value="{{ $task->description }}" class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary">
			</div>
		</form>
	</div>
@endsection

@section("scripts")
@endsection