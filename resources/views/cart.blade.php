@extends('layouts.app')

@section('content')


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive mt-5">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
<tr>
    <th scope="row">
        <div class="d-flex align-items-center">
            <img src="/img/{{$item->img1}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
        </div>
    </th>
    <td>
        <p class="mb-0 mt-4">{{$item->name}}</p>
    </td>
    <td>
        <p class="mb-0 mt-4 price-column" data-price="{{$item->price}}">{{$item->price}} KM</p>
    </td>
    <td>
        <div class="input-group quantity mt-4" style="width: 100px;">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border minusBtn">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input class="quantityInput form-control form-control-sm text-center border-0" type="text" value="1">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border plusBtn">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </td>
    <td>
        <p class="mb-0 mt-4 total-column">{{$item->price}} KM</p>
    </td>
    <td>
        <button class="btn btn-md rounded-circle bg-light border mt-4" >
            <a href="{{route('deleteFromCart',['id'=>$item->id])}}"><i class="fa fa-times text-danger"></i></a>

        </button>
    </td>
</tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (Auth::user())
        <div class="container">
            <div class="row" style="border:1px dotted black">
                <div class="col-6 offset-3">
                    @if (count($cart) === 0)
                        <h4 class="display-4 text-center">Vasa korpa je prazna</h4>
                    @endif



                </div>
            </div>
        </div>

        @endif



        {{-- <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div> --}}
        @if (count($cart)!=0)
        <!-- Checkout Page Start -->

        @include('templates.details')

        @endif

        <!-- Cart Page End -->


<script>
    //JavaScript kod
var minusButtons = document.querySelectorAll('.minusBtn');
var plusButtons = document.querySelectorAll('.plusBtn');
var quantityInputs = document.querySelectorAll('.quantityInput');
var totalColumns = document.querySelectorAll('.total-column');

for (var i = 0; i < minusButtons.length; i++) {
    minusButtons[i].addEventListener('click', function() {
        decrementQuantity(this);
    });
}

for (var i = 0; i < plusButtons.length; i++) {
    plusButtons[i].addEventListener('click', function() {
        incrementQuantity(this);
    });
}

for (var i = 0; i < quantityInputs.length; i++) {
    quantityInputs[i].addEventListener('input', function() {
        updateTotalColumn(this);
    });
}

function incrementQuantity(button) {
    var quantityInput = button.closest('.quantity').querySelector('.quantityInput');
    var currentValue = parseInt(quantityInput.value);

    // Povećaj vrednost samo ako je trenutna vrednost manja od nekog maksimuma
    if (currentValue < 10) {
        quantityInput.value = currentValue + 1;
        updateTotalColumn(quantityInput);
        updateSubtotal();
    }
}

function decrementQuantity(button) {
    var quantityInput = button.closest('.quantity').querySelector('.quantityInput');
    var currentValue = parseInt(quantityInput.value);

    // Smanji vrednost samo ako je trenutna vrednost veća od nekog minimuma
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        updateTotalColumn(quantityInput);
        updateSubtotal();
    }
}

function updateTotalColumn(input) {
    var row = input.closest('tr');
    var price = parseFloat(row.querySelector('.price-column').getAttribute('data-price'));
    var quantity = parseInt(input.value);
    var total = price * quantity;

    row.querySelector('.total-column').textContent = total.toFixed(2) + ' KM';
}


// Pronađite sve elemente sa klasom 'total-column'
// Pronađite sve elemente sa klasom 'total-column'
var totalColumns = document.querySelectorAll('.total-column');

// Ažurirajte HTML element koji prikazuje subtotal
var subtotalElement = document.getElementById('subtotal');

function updateSubtotal() {
    // Inicijalizujte promenljivu za čuvanje ukupne vrednosti
    var subtotal = 0;

    // Iterirajte kroz sve 'total-column' elemente
    totalColumns.forEach(function(totalColumn) {
        // Parsirajte vrednost totala i dodajte je ukupnoj vrednosti
        subtotal += parseFloat(totalColumn.textContent);
    });

    // Ažurirajte HTML element koji prikazuje subtotal
    subtotalElement.textContent = '$' + subtotal.toFixed(2);

    var total = subtotal + 7; // Dodajte 7 na subtotal
    var totalElement = document.getElementById('total');
    totalElement.textContent = '$' + total.toFixed(2)
}

// Odmah pozovite updateSubtotal kako biste postavili početnu vrednost
updateSubtotal();

// Dodajte ovo na kraju vašeg JavaScript koda



</script>

@endsection

