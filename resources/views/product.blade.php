@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="product-internal">
                <img src="{{ url('/storage/products/' . $product->images[0]->name) }}">
            </div>
            <div class="form-inline justify-content-center mt-3">
                @if (!empty($product->images))
                    @foreach ($product->images as $key => $image)
                        @if ($key)
                            <div class="product-internal-thumb mr-3">
                                <img class="w-100 h-100" src="{{ url('/storage/products/' . $image->name) }}">
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-6 agis-medium product-internal-info">
            <h1>{{ $product->name }}</h1>
            <h2 class="mb-3">{{ $product->subName }}</h2>
            <strong>$ {{ number_format($product->price, 2, ',', '') }}</strong>
            <p class="mt-4">QUANTITY</p>
            <div class="form-inline agis-medium mb-5">
                <img class="mr-3" src="{{ url('img/min.jpg') }}">
                    1
                <img class="ml-3" src="{{ url('img/max.jpg') }}">
            </div>
            <div class="product-internal-desc mb-4">
                {{ $product->description }}
            </div>
            <div class="product-internal-badge form-inline mb-5">
                @if (!empty($tags))
                    @foreach ($tags as $tag)
                        <span class="badge badge-vintage mr-3">{{ $tag }}</span> 
                    @endforeach
                @endif
            </div>
            <div class="w-100" style="text-align: center;">
                <a href="javascript:;" class="btn-vintage agis-medium">
                    ADD TO CART
                </a>
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

@endsection
