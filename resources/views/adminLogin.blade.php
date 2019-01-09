@include('head')
<body>
	<div class="container">
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


            @if (Session::has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	{!! Session::get('message') !!}
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>
            @endif

			<form action="{{ route('checkLogin') }}" method="post">
				{{ csrf_field() }}
			  	<div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" value="{{ old('username') }}" id="username"  name = "username"  placeholder="Username">
			  	</div>
			  	<div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
@include('foot')