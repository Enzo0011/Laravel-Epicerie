@extends('layouts.app')

@section('content')
<div class="container mt-5 p-0">
    <form id="payementForm" action="{{route('cart.checkout.validate')}}" method="get">
        @csrf
        <div class="card px-4 bg-light" style="border: 2px solid #ff00ff; border-radius: 10px;">
            <div class="alert alert-danger mt-2" id="alert" style="display: none; background-color: #ff0000;">
                <p class="text-danger" id="error-text" style="color: #ffffff;">Please fill all fields</p>
            </div>
            @if(session('error'))
                <div class="alert alert-danger mt-2" style="background-color: #ff0000;">
                    {{ session('error') }}
                </div>
            @endif
            <a href="{{route('cart')}}" class="btn btn-primary mt-2 w-25" style="background-color: #ff00ff;">Back to Cart</a>
            <p class="h8 py-3">Payment Details</p>
            <hr/>
            <div class="row gx-3">
                <div class="col-12">
                    <input name="address" type="text" placeholder="Address" class="form-control mb-3" id="address" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-12">
                    <input name="city" type="text" placeholder="City" class="form-control mb-3" id="city" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-12">
                    <input name="country" type="text" placeholder="Country" class="form-control mb-3" id="country" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-12">
                    <input name="zip" type="text" placeholder="Zip" class="form-control mb-3" id="zip" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-12">
                    <input class="form-control mb-3" type="text" placeholder="Person Name" id="name" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-12">
                    <input class="form-control mb-3" type="text" placeholder="Card Number" maxlength="16"
                           minlength="16" id="cardNumb" name="cardNumb" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-6">
                    <input class="form-control mb-3" type="text" placeholder="Expiry (MM/YYYY)" maxlength="7"
                           name="expiDate" id="expiDate" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-6">
                    <input class="form-control mb-3 pt-2 " type="password" placeholder="CVV/CVC (***)" maxlength="3"
                           minlength="3" name="cvc" id="cvc" style="background-color: #ffff00; border: 2px solid #00ff00;">
                </div>
                <div class="col-12" onclick="testPayment()">
                    <div class="btn btn-primary mb-3" style="background-color: #ff00ff; border: 2px solid #ff0000;">
                        <span>Pay @if(session('promo'))
                                {{ session('promo')['priceAfterDiscount'] }}
                            @else
                                {{ session('total') }}
                            @endif$</span>
                        <span class="fas fa-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

<script>
    function testPayment() {
        let form = document.getElementById('payementForm');

        let name = document.getElementById('name').value;
        let cardNumber = document.getElementById('cardNumb').value;
        let expiry = document.getElementById('expiDate').value;
        let cvv = document.getElementById('cvc').value;
        let address = document.getElementById('address').value;
        let city = document.getElementById('city').value;
        let country = document.getElementById('country').value;
        let zip = document.getElementById('zip').value;

        if (address === '' || city === '' || country === '' || zip === '' || name === '' || cardNumber === '' || expiry === '' || cvv === '') {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('error-text').innerText = 'Please fill all fields';
            return;
        }

        let errorText = document.getElementById('error-text');

        if (name.length === 0 || cardNumber.length === 0 || expiry.length === 0 || cvv.length === 0 || address.length === 0 || city.length === 0 || country.length === 0 || zip.length === 0) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'Please fill all fields';
            return;
        }

        if (cardNumber.length !== 16) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'Card number must be 16 digits';
            return;
        }

        let expiryRegex = /^(0[1-9]|1[0-2])\/[0-9]{4}$/;
        if (!expiryRegex.test(expiry)) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'Expiry must be in MM/YYYY format';
            return;
        }

        let cvvRegex = /^[0-9]{3}$/;
        if (!cvvRegex.test(cvv)) {
            document.getElementById('alert').style.display = 'block';
            errorText.innerText = 'CVV must be 3 digits';
            return;
        }

        document.getElementById('alert').style.display = 'none';
        form.submit();
    }
</script>
