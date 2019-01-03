@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <img class="w-100" src="{{ url('img/banner.jpg') }}">  
    </div>
</div>

<div class="container-fluid">
    <div class="row home-product-t">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 agis-medium">
                    <h1>FEATURED</h1>
                    <h2>FOR MAN</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        @if (!empty($products))
            @foreach ($products as $product)
                <div class="col-sm-4 home-product-f">
                    <a href="{{ url('product/' . $product->id) }}">
                        <div class="home-product-image">
                            <img src="{{ url('/storage/products/' . $product->images[0]->name) }}">                
                        </div>
                        <div class="row home-product-title agis-medium">
                            <div class="col-sm-6">
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->subName }}</p>
                            </div>
                            <div class="col-sm-6 agis-medium">
                                <strong>$ {{ number_format($product->price, 2, ',', '') }}</strong>
                            </div>
                        </div>
                    </a>

                    <a href="javascript:;" class="btn-vintage agis-medium">
                        ADD TO CART
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="container-fluid">
    <div class="row home-product-t">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 agis-medium">
                    <h1>FEATURED</h1>
                    <h2>FOR WOMAN</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 mt-5">
    <div class="row">
        @if (!empty($products))
            @foreach ($products as $product)
                <div class="col-sm-4 home-product-f">
                    <a href="{{ url('product/' . $product->id) }}">
                        <div class="home-product-image">
                            <img src="{{ url('/storage/products/' . $product->images[0]->name) }}">                
                        </div>
                        <div class="row home-product-title agis-medium">
                            <div class="col-sm-6">
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->subName }}</p>
                            </div>
                            <div class="col-sm-6 agis-medium">
                                <strong>$ {{ number_format($product->price, 2, ',', '') }}</strong>
                            </div>
                        </div>
                    </a>

                    <a href="javascript:;" class="btn-vintage agis-medium">
                        ADD TO CART
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
	// Main.carousel();
</script>

@endsection
