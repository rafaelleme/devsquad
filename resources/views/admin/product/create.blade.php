@extends('layouts.app-admin')

@section('content')

<div div class="col-sm-7 col-lg-8">

	<form method="POST" action="{{ route('products.store') }}">

		@csrf

		<div class="row">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary agis-medium mr-3">SAVE</button>
				<a href="{{ route('products.index') }}" class="btn btn-secondary agis-medium mr-3">CANCEL</a>
				<!-- <a class="btn btn-danger agis-medium mr-4">DELETE</a> -->
				<!-- <a class="btn btn-primary agis-medium ml-4">PREVIEW</a> -->
			</div>
		</div>

		<div class="row mt-5">

			<div class="col-sm-5">
				<form class="form" method="POST">
					<div class="form-group mb-4">
						<input type="text" name="name" class="form-control agis-medium" placeholder="Product Name" value="{{ old('name') }}" />
						@if ($errors->has('name'))
							<span class="validation-laravel text-danger" role="alert">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
						@endif
					</div>

					<div class="form-group mb-4">
						<input type="text" name="subName" class="form-control agis-medium" placeholder="Product Sub Name" value="{{ old('subName') }}" />
						@if ($errors->has('subName'))
							<span class="validation-laravel text-danger" role="alert">
	                            <strong>{{ $errors->first('subName') }}</strong>
	                        </span>
						@endif
					</div>

					<div class="form-group mb-4">
						<input type="text" name="price" class="form-control agis-medium price" placeholder="Price" value="{{ old('price') }}" />
						@if ($errors->has('price'))
							<span class="validation-laravel text-danger" role="alert">
	                            <strong>{{ $errors->first('price') }}</strong>
	                        </span>
						@endif
					</div>

					<div class="form-group">
						<textarea rows="8" name="description" class="form-control agis-medium" placeholder="Description" style="resize: none;">{{ old('description') }}</textarea>
						@if ($errors->has('description'))
							<span class="validation-laravel text-danger" role="alert">
	                            <strong>{{ $errors->first('description') }}</strong>
	                        </span>
						@endif
					</div>
				</form>
			</div>

			<div class="col-sm-5">
				<div class="agis-medium">
					<b>IMAGES</b>
				</div>

				<div class="admin-product-image mb-5">
					<!-- <div class="admin-product-image-thumb float-left mr-4">
						<img src="{{ url('/storage/products/...') }}" alt="Product 1 - Vintage Ecommerce">
					</div> -->
					<button type="button" class="btn btn-primary agis-medium float-right" data-toggle="modal" data-target="#modalUpload">ADD</button>
					<input type="hidden" name="imgs" id="files" />
				</div>


				<div class="row">
					<div class="col-sm-12 mb-1 form-group float-left">
						<select id="tag-s2" class="form-control agis-medium mr-3" multiple name="tags[]">
							@if (!empty($tags))
								@foreach ($tags as $key => $tag)
									<option {{ old('tags') && in_array($tag->id, old('tags')) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
								@endforeach
							@endif
						</select>
						@if ($errors->has('tags'))
							<span class="validation-laravel text-danger" role="alert">
	                            <strong>{{ $errors->first('tags') }}</strong>
	                        </span>
						@endif
					</div>
				</div>

				<div class="admin-product-tag">
					<!-- <span class="badge badge-primary agis-medium mr-1">PREMIUM</span>
					<span class="badge badge-primary agis-medium mr-1">GOLD</span>
					<span class="badge badge-primary agis-medium">BLACK</span> -->
				</div>

			</div>

		</div>

	</form>

</div>

<!-- Modal -->
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUpload" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title agis-medium" id="modalUploadTitle">UPLOAD IMAGE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('product-upload') }}" class="dropzone agis-medium" id="dropzone-upload" enctype="multipart/form-data">
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