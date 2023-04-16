<x-app-layout>
    
    <!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="/css/stylepayment.css">
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
          {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p> --}}
        </div>
        <form class="" action="{{ route('Event.store') }}" method="post">
            @csrf
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price">${{session('Price')}}</span>
              <p class="item-name">Price </p>
              <p class="item-description">amount a day</p>
            </div>
            <div class="item">
              <span class="price">{{session('date')}} day</span>
              <p class="item-name">Time</p>
              <p class="item-description">{{session('arrival')->toDateString()}} -> {{session('departure')->toDateString()}}</p>
              {{-- <p class="item-description">Lorem ipsum dolor sit amet</p> --}}
            </div>
            <div class="total">Total<span class="price">${{session('total')}}</span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Transfer</h3>
            <div class="row">
              
              <div class="form-group col-sm-7">
                <label for="card-number">Card Holder</label>
                <input id="card-number" type="text" class="form-control" value="TRUONG KHANH LINH" aria-label="Card Holder" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="form-group col-sm-5">
                <label for="cvc">Card Number</label>
                <input id="cvc" type="text" class="form-control" value="1018132724" aria-label="Card Holder" aria-describedby="basic-addon1" readonly>
              </div>

              <div class="form-group col-sm-7">
                <label for="card-holder">transfer content</label>
                <input id="card-holder" type="text" class="form-control" value="{{session('name')}}-{{session('phone')}}" aria-label="Card Holder" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="form-group col-sm-5">
                <label for="">bank</label>
                <div class="input-group expiration-date">
                    
                    <input id="cvc" type="text" class="form-control" value="Vietcombank" aria-label="Card Holder" aria-describedby="basic-addon1" readonly>
                </div>
              </div>
              <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                {{-- <a href="{{ route('Booking.store') }}" class="btn btn-primary btn-block">Confirm</a> --}}
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
​
    </x-app-layout>
    