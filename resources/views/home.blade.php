@include('head')
<body>
	<div class="container">
		<div class="form-container col-md-10 mx-auto my-auto">
			<div class="row">
				<div class="col-md-6 mx-auto">
					@if (Session::has('message') == 'Successfully saved!' || Session::has('message') == 'Successfully deleted!')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
						  	{!! Session::get('message') !!}
						  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    	<span aria-hidden="true">&times;</span>
						  	</button>
						</div>
                    @endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 add-button"><a href="{{ route('addPostPage') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Post</a></div>
			</div>
			<table class="table table-bordered">
			  	<thead>
				    <tr>
				      	<th width="20%" scope="col">Title</th>
				      	<th scope="col">Description</th>
				      	<th width="12%" scope="col">Action</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		@foreach($posts as $post)
				    <tr>
			      		<td>{{ $post->title }}</td>
				      	<td>{{ $post->description }}</td>
				      	<td>
					      	<a href="editPostPage/{{ $post->id }}" class="btn btn-xs btn-warning action-icon">Edit</a>
					      	<a href="deletePost/{{ $post->id }}" class="btn btn-xs btn-danger">Delete</a>
				     	</td>
				    </tr>
				    @endforeach
			  	</tbody>
			  	<tfoot>
			  		<tr>
			  			<td colspan="3">
			  				<div class="col-md-12 mx-auto">
								<nav aria-label="Page navigation example">
								  	<ul class="pagination">
								    	{{ $posts->links() }}
								  	</ul>
								</nav>
							</div>
			  			</td>
			  		</tr>
			  	</tfoot>
			</table>
			
		</div>
	</div>
</body>
@include('foot')