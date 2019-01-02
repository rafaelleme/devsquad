@extends('layouts.app-admin')

@section('content')

<div div class="col-sm-7 col-lg-8">

	<div class="row">
		<div class="col-sm-6">
			<a href="{{ route('products.create') }}" class="btn btn-primary agis-medium mr-2">ADD PRODUCT</a>
			<button class="btn btn-primary agis-medium" data-toggle="modal" data-target="#modalUpload">IMPORT PRODUCT</button>
		</div>

		<div class="col-sm-6 form-inline">
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" class="form-control agis-medium" id="search" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-primary mb-2 agis-medium">SEARCH</button>
		</div>
	</div>

	@if (Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message') }}
		</div>
	@endif

	<div class="row">
		<div class="admin-product-list agis-medium">
			<table class="table text-center">
				<thead>
					<tr>
						<th scope="col">Product Name</th>
						<th scope="col">Product Sub Name</th>
						<th scope="col">Price</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@if (!empty($products))
						@foreach ($products as $product)
							<tr>
								<td>{{ $product->name }}</td>
								<td>{{ $product->subName }}</td>
								<td>$ {{ $product->price }}</td>
								<td>
									<a href="{{ route('products.edit',['products' => $product->id]) }}" class="btn btn-primary float-left">EDIT</a>
									
									<button type="button" onclick="Main.deleteProduct({!! $product->id !!});" class="btn btn-danger float-right">DELETE</button>

									<form id="formDelete-{{ $product->id }}" method="POST" action="{{ route('products.destroy',$product->id) }}">
										@csrf

										<input type="hidden" name="_method" value="DELETE" />
									</form>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUpload" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title agis-medium" id="modalUploadTitle">UPLOAD CSV</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('product-upload-csv') }}" class="dropzone agis-medium" id="dropzone-upload-csv" enctype="multipart/form-data">
					@csrf
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Upload</button> -->
			</div>
		</div>
	</div>
</div>

@endsection
