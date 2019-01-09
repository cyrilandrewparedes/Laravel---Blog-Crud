@include('head')
<body>
	<div class="container">
		<h1>Add Post</h1>
		<div class="form-container col-md-6 mx-auto my-auto">
			@if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	{{ $error }}
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>
                @endforeach
            @endif
			<form action="{{ route('addPost') }}" method="post">
				{{ csrf_field() }}
			  	<div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control" value="{{ old('title') }}" id="title" name = "title"  placeholder="Title">
			  	</div>
			  	<div class="form-group">
				    <label for="description">Description</label>
				    <textarea class="form-control" name = "description" id="description" rows="3">{{ old('description') }}</textarea>
			  	</div>
			  	<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
@include('foot')
