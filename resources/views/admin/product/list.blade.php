@extends('layouts.app-admin')

@section('content')

<div div class="col-sm-7 col-lg-8">

	<div class="row">
		<div class="col-sm-6">
			<a href="{{ route('products.create') }}" class="btn btn-primary agis-medium mr-2">ADD PRODUCT</a>
			<button class="btn btn-primary agis-medium">IMPORT PRODUCT</button>
		</div>

		<div class="col-sm-6 form-inline">
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" class="form-control agis-medium" id="search" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-primary mb-2 agis-medium">SEARCH</button>
		</div>
	</div>

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
					
					@for ($i = 0; $i < 3; $i++)
					<tr>
						<td>Gold + Black</td>
						<td>The eros</td>
						<td>$ 119,00</td>
						<td>
							<a href="javascript:;" class="btn btn-primary float-left">EDIT</a>
							<a href="javascript:;" class="btn btn-danger float-right">DELETE</a>
						</td>
					</tr>
					@endfor
					
				</tbody>
			</table>
		</div>
	</div>

</div>

@endsection
