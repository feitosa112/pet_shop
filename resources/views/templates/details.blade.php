<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>

            @endforeach
            @endif
        <form action="{{route('orderExecute')}}" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">


                    <div class="form-item">
                        <label class="form-label my-3">Address <sup>*</sup></label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="House Number Street Name">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Town/City<sup>*</sup></label>
                        <input type="text" name="city" value="{{old('city')}}" class="form-control">
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                        <input type="text" name="postcode" value="{{old('postcode')}}" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Phone<sup>*</sup></label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                    </div>





                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        @include('templates.total')
                    </div>


                </div>
            </div>
        </form>
    </div>
</div>
