<x-guest-layout>
 
  <form class="needs-validation" action="{{route("cart.address.store")}}" method="POST">
    @csrf
<div class="container">
    <div class="py-3 text-left">
      <h2>Bezorggegevens</h2>
    </div>
  
    <div class="row h-100">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center ">
          
        </h4>
        <ul class="list-group mb-3" id="list-group">
          <!-- Loop through cart items -->
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Overzicht</h6>
            </div>
            
          </li>
          <!-- Total amount -->
          <li class="list-group-item d-flex justify-content-between">
            <span>Artikelen:</span>
            <strong>{{$articles}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Subtotal</span>
            <strong><i class="bi bi-currency-euro"></i>{{number_format($subtotal, 2)}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>BTW</span>
            <strong><i class="bi bi-currency-euro"></i>{{number_format($btw, 2)}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Totaal</span>
            <strong><i class="bi bi-currency-euro"></i>{{number_format($subtotal_incl, 2)}}</strong>
          </li>
        </ul>
        <button class="btn btn-primary p-2" type="submit">Verder naar bestellen</button>
      </div>
      <div class="col-md-8 card p-3 lh-lg order-md-1">
        
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Voornaam</label>
              <input type="text" class="form-control" value="{{old("first_name")}}" id="firstName" name="first_name">
              @error("first_name")
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Achternaam</label>
              <input type="text" class="form-control" id="lastName" value="{{old("last_name")}}" name="last_name">
              @error("last_name")
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Straat</label>
                <input type="text" class="form-control" id="lastName" value="{{old("street")}}" name="street">
                @error("street")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Huisnummer</label>
                <input type="text" class="form-control" id="lastName" value="{{old("house_number")}}" name="house_number">
                @error("house_number")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Postcode</label>
                <input type="text" class="form-control" id="lastName" value="{{old("postal_code")}}" name="postal_code">
                @error("postal_code")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
            
              <div class="col-md-6 mb-3">
                <label for="lastName">Plaats</label>
                <input type="text" class="form-control" id="lastName" value="{{old("city")}}" name="city">
                @error("city")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              
              <div class="row d-flex flex-column">
              <div class="col-md-6 mb-3">
                <label for="lastName">Telefoonnummer</label>
                <input type="text" class="form-control" id="lastName" value="{{old("phone_number")}}" name="phone_number">
                @error("phone_number")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Emailadres</label>
                <input type="text" class="form-control" id="lastName" value="{{old("email")}}" name="email">
                @error("email")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
          </div>
      </div>
            
          <!-- Other form fields... -->
  
        
      </div>
      
    </div>
    
  </div>


  <div class="mt-3 fs-5">
  
  <input type="checkbox" value="" id="billingCheckbox" name="billingcheckbox" {{$errors->hasbag("billing") ? "checked" : ""}}>
  <label for="horns">Ander Factuur adres</label>
  </div>


  <input type="hidden" id="billingInput" name="billingInput">
  
  
 

    @php
        echo '<script>  document.getElementById("billingInput").value = "true"
        </script>'  
    @endphp
    
    <div id="billingfield" style="visibility: {{$errors->hasbag("billing") ? "visible" : "hidden"}}" class="col-md-8 mt-3 card g-0 p-3 lh-lg order-md-3"> 
      
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Voornaam</label>
            <input type="text" class="form-control" value="{{old("billing_first_name")}}" id="firstName" name="billing_first_name">
           <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_first_name') }}</p>
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Achternaam</label>
            <input type="text" class="form-control" id="lastName" value="{{old("billing_last_name")}}" name="billing_last_name" >
            <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_last_name') }}</p>
          </div>
          <div class="col-md-6 mb-3">
              <label for="lastName">Straat</label>
              <input type="text" class="form-control" id="lastName" value="{{old("billing_street")}}" name="billing_street">
              <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_street') }}</p>
          </div>
          <div class="col-md-6 mb-3">
              <label for="lastName">Huisnummer</label> 
              <input type="text" class="form-control" id="lastName" value="{{old("billing_house_number")}}" name="billing_house_number">
              <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_house_number') }}</p>
          </div>
          <div class="col-md-6 mb-3">
              <label for="lastName">Postcode</label>
              <input type="text" class="form-control" id="lastName" value="{{old("billing_postal_code")}}" name="billing_postal_code">
              <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_postal_code') }}</p>
          </div>
          
          <div class="col-md-6 mb-3">
              <label for="lastName">Plaats</label>
              <input type="text" class="form-control" id="lastName" value="{{old("billing_city")}}" name="billing_city">
              <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_city') }}</p>
          </div>

          <div class="row d-flex flex-column">
            <div class="col-md-6 mb-3">
              <label for="lastName">Telefoonnummer</label>
              <input type="text" class="form-control" id="lastName" value="{{old("billing_phone_number")}}" name="billing_phone_number">
              <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_phone_number') }}</p>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Emailadres</label>
              <input type="text" class="form-control" id="lastName" value="{{old("billing_email")}}" name="billing_email">
              <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_email') }}</p>
            </div>
        </div> 
        <!-- Other form fields... -->

      
    </div>
    
  </form>
  </div>
  
  
  <script>
    var checkbox = document.querySelector("input[name=billingcheckbox]");

checkbox.addEventListener('change', function() {
  if (this.checked) {
    document.getElementById("billingInput").value = true;
    var billingcheckbox = document.getElementById("billingfield")
    billingcheckbox.style.visibility = "visible"
  } else {
    document.getElementById("billingInput").value = false;
    var billingcheckbox = document.getElementById("billingfield")
    billingcheckbox.style.visibility = "hidden"    
  }

  
});
</script>


</x-guest-layout>