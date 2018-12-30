@extends('layouts.app-admin')

@section('content')

<div div class="col-sm-7 col-lg-8">

	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-primary agis-medium mr-3">UPDATE</a>
			<a class="btn btn-secondary agis-medium mr-3">CANCEL</a>
			<a class="btn btn-danger agis-medium mr-4">DELETE</a>
			<a class="btn btn-primary agis-medium ml-4">PREVIEW</a>
		</div>
	</div>

	<div class="row mt-5">

		<div class="col-sm-5">
			<form class="form" method="POST">
				<div class="form-group mb-4">
					<input type="text" name="name" class="form-control agis-medium" placeholder="Product Name" />
				</div>

				<div class="form-group mb-4">
					<input type="text" name="sub-name" class="form-control agis-medium" placeholder="Product Sub Name" />
				</div>

				<div class="form-group mb-4">
					<input type="text" name="price" class="form-control agis-medium" placeholder="Price" />
				</div>

				<div class="form-group">
					<textarea rows="8" name="description" class="form-control agis-medium" placeholder="Description" style="resize: none;">
					</textarea>
				</div>
			</form>
		</div>

		<div class="col-sm-7">
			<div class="agis-medium">
				<b>IMAGES</b>				
			</div>
			

		</div>

	</div>


</div>

@endsection
