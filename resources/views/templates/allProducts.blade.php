<!-- Fruits Shop Start-->
{{-- @dd($products) --}}
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Oprema za vase kucne ljubimce</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>

                        @foreach ($categories as $category)

                        <li class="nav-item">
                            <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 130px;">{{$category}}</span>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">

                                @foreach ($allProducts as $product)
                                {{-- @dd($product->categories) --}}
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item" style="border: 1px solid orange">
                                            <div class="fruite-img">
                                                <img src="img/{{$product->img1}}" alt="" style="width: 100%;height:100%">
                                            </div>

                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">@foreach ($product->categories as $cat)
                                            {{$cat->name}}

                                        </div>
                                        @endforeach


                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{$product->name}}</h4>
                                            <p>{{$product->description}}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$product->price}}</p>
                                                <a href="{{route('addToCart')}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
