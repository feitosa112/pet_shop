@include('layouts.app')

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
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
                    <!-- ... (ostatak HTML koda) ... -->

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
            <i class="fa fa-times text-danger"></i>
        </button>
    </td>
</tr>

<!-- ... (ostatak HTML koda) ... -->


                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div> --}}
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0" id="subtotal"></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping</h5>
                            <div class="">
                                <p class="mb-0">Flat rate: 7.00 KM</p>
                            </div>
                        </div>

                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4" id="total"></p>
                    </div>
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

<script>
    // Dodajte JavaScript kod
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
