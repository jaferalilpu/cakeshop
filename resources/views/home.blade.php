@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

           <style>
            .card-title {
    float: none!important;
}
           </style>

@if(auth()->user())
    @if(auth()->user()->isAdmin == 1)
    <div class="col-12 row text-right py-3">
    <div class="div">
    <a class='btn btn-primary' href='{{route("cake.create")}}'>Create</a>
    <a class='btn btn-success' href='{{route("cake.index")}}'>View All</a>
    </div>
    </div>
    @endif
@endif

<div class="row col-12 py-5">
    <div class="col-6">
        <h3>Karthikeya Cake Shop</h3>

        <p>"Welcome to Karthikeya Cake Home! We bring joy and flavor to every treat and drink. Our shop is perfect for anyone who loves desserts and drinks, offering a range of delicious cakes and refreshing beverages. Come in, relax, and enjoy our tasty options that are sure to brighten your day."

</p>
    </div>
    <div class="col-6">

<div id="demo" class="carousel slide" data-ride="carousel">



<!-- The slideshow -->
<div class="carousel-inner">

@foreach($allCakes as $key => $cake)

  <div class="carousel-item ">
    <img src=" {{ Storage::url($cake->image)}}"  width="100%" height="300">
  </div>

  @endforeach

</div>



<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

    </div>
</div>


<div class="row col-12 py-5 text-center">
    All Products
</div>





<div class="col-12 row">

                    @foreach($allCakes as $key => $cake)
                    <div class="col-4">
                    <div class="card  text-center" >
                    <img  class="m-auto"  src=" {{ Storage::url($cake->image)}}"  width='100' height='150'>
                    <div class="card-body  text-center">
                        <h4 class="card-title" style="font-size: 18px;">{{ $cake->name }}</h4>

                    <p class="card-text text-center"> Rs. {{ $cake->price;}}</p>
                    </div>
                </div>
                    </div>

                    @endforeach
                    </div>



        </div>
    </div>
</div>



 <!-- Contact Section -->
 <div class="contact-section">
    <h4>Contact Us</h4>
    <p>Karthikeya Cake Shop</p>
    <p>Ring Center, Thotamula, Madhira Road , Gampalagudem, pin:521403</p>
    <p>Email: karthikeyacakehome@gmail.com.com</p>
    <p>Phone:8985349198</p>
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/8985349198" target="_blank" class="fab fa-whatsapp"></a>
        <a href="mailto:karthikeyacakehome@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
    </div>
</div>
<style>
    .card-title {
        float: none !important;
    }
    .contact-section {
        text-align: center;
        background-color: #4093dc; /* Light color */
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
    }
    .contact-section h4 {
        color: #fcf8f8ec; /* Darker color */
        font-weight: bold;
    }
    .contact-section p, .contact-section a {
        color: #f9f3f3; /* Neutral text color */
        margin: 5px 0;
    }
    .social-icons a {
        margin: 0 10px;
        font-size: 24px;
        color: #555;
        text-decoration: none;
        transition: color 0.3s;
    }
    .social-icons a:hover {
        color: #fbfdff; /* Hover color */
    }
</style>
<!-- Include Font Awesome for social media icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


@endsection

<script>
    setTimeout(() => {
        document.querySelectorAll('.carousel-item')[0].classList.add('active')
    }, 500);
</script>
