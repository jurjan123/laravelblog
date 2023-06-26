<x-guest-layout>
 
  <form id="myform" action="{{route("cart.address.store")}}" method="POST">
    @csrf
    <div class="row ">
      <h2>Bezorggegevens</h2>
      <div class="col-md-8 lh-md">
        <div class="card p-3">
          
        <div class="row ">
            <div class="col-md-6 mb-3">
              <label for="firstName">Voornaam</label>
              <input type="text" class="form-control" value="{{old("first_name", )}}" id="first_name" name="first_name">
              @error("first_name")
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Achternaam</label>
              <input type="text" class="form-control" id="last_name" value="{{old("last_name")}}" name="last_name">
              @error("last_name")
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Straat</label>
                <input type="text" class="form-control" id="street" value="{{old("street")}}" name="street">
                @error("street")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Huisnummer</label>
                <input type="text" class="form-control" id="house_number" value="{{old("house_number",)}}" name="house_number">
                @error("house_number")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Postcode</label>
                <input type="text" class="form-control" id="postal_code" value="{{old("postal_code",)}}" name="postal_code">
                @error("postal_code")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
            
              <div class="col-md-6 mb-3">
                <label for="lastName">Plaats</label>
                <input type="text" class="form-control" id="city" value="{{old("city", )}}" name="city">
                @error("city")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              
              <div class="row d-flex flex-column">
              <div class="col-md-6 mb-3">
                <label for="lastName">Telefoonnummer</label>
                <input type="text" class="form-control" id="phone_number" value="{{old("phone_number", )}}" name="phone_number">
                @error("phone_number")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Emailadres</label>
                <input type="text" class="form-control" id="email" value="{{old("email",)}}" name="email">
                @error("email")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              
        </div>
        </div>
        </div>
        
        <div class="mt-3">
          
          <input type="checkbox" value="" id="billingCheckbox" name="billingcheckbox" @if($errors->hasbag("billing")) checked @else  @endif>
        <label for="horns">Ander Factuur adres</label>
        <input type="hidden" id="billingInput" name="billingInput">
        
        </div>
          
          <div id="billingfield" style="visibility: hidden  " class=" mt-3 card  p-3 "> 
            
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">Voornaam</label>
                  <input type="text" class="form-control" value="{{old("billing_first_name",)}}" id="billing_first_name" name="billing_first_name">
                 <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_first_name')}}</p>
                 </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Achternaam</label>
                  <input type="text" class="form-control" id="billing_last_name" value="{{old("billing_last_name",)}}" name="billing_last_name" >
                  <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_last_name') }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Straat</label>
                    <input type="text" class="form-control" id="billing_street" value="{{old("billing_street")}}" name="billing_street">
                    <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_street')}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Huisnummer</label> 
                    <input type="text" class="form-control" id="billing_house_number" value="{{old("billing_house_number",)}}" name="billing_house_number">
                    <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_house_number') }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Postcode</label>
                    <input type="text" class="form-control" id="billing_postal_code" value="{{old("billing_postal_code",)}}" name="billing_postal_code">
                    <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_postal_code') }}</p>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="lastName">Plaats</label>
                    <input type="text" class="form-control" id="billing_city" value="{{old("billing_city",)}}" name="billing_city">
                    <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_city') }}</p>
                </div>
      
                <div class="row d-flex flex-column">
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Telefoonnummer</label>
                    <input type="text" class="form-control" id="billing_phone_number" value="{{old("billing_phone_number")}}" name="billing_phone_number">
                    <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_phone_number') }}</p>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Emailadres</label>
                    <input type="text" class="form-control" id="billing_email" value="{{old("billing_email",)}}" name="billing_email">
                    <p class="text-red-500 text-xs mt-1">{{$errors->billing->first('billing_email') }}</p>
                  </div>
                </div>
              </div>
          </div>
          
        </div>
             
  </form>
        
      <div class="col-md-4 order-md-2 mb-4">
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
            <strong><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($subtotal, 2))}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>BTW</span>
            <strong><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($btw, 2))}}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Totaal</span>
            <strong><i class="bi bi-currency-euro"></i>{{str_replace(".", ",",number_format($subtotal_incl, 2))}}</strong>
          </li>
          <li class="list-group-item d-flex float-right justify-content-between">
            <a href="{{route("cart")}}" class="vertical-align-middle mt-2">Wijzig winkelmandje</a>
            <button class="btn btn-primary float-right btn-md p-2" type="submit"><a class="nav-link active">Doorgaan naar betalen</a></button>
          </li>
        </ul>
       
      </div>
      
    </div>

    



    @if($errors->hasbag("billing"))
    <script>
       document.getElementById("billingCheckbox").checked = true;
   document.getElementById("billingInput").value = true;  
   var billingcheckbox = document.getElementById("billingfield")
    billingcheckbox.style.visibility = "visible"  
    </script>
    @endif
    
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

@if(null !== session('customer')) 
@php
    $customer = (session()->get("customer"));
    $keys0 = $customer[0]; 
    $keys1 = $customer[1];  
    $removetype = array_shift($keys0);
    $removetype = array_shift($keys1);
@endphp
@if($keys0 === $keys1)
<script>
  document.getElementById("billingInput").value = false;
    var billingcheckbox = document.getElementById("billingfield")
    billingcheckbox.style.visibility = "hidden"  
    document.getElementById("billingCheckbox").checked = false;  
</script>

@if($errors->hasbag("billing"))
<script>
   document.getElementById("billingCheckbox").checked = true;
   document.getElementById("billingInput").value = true;  
   var billingcheckbox = document.getElementById("billingfield")
    billingcheckbox.style.visibility = "visible"  
</script>
@endif


@foreach($keys0 as $key => $value) 
<script type="text/javascript">
  var input = document.getElementById("{{$key}}").value = "{{$value}}"
  </script>
  @endforeach

@else
 
@foreach($keys0 as $key => $value) 
<script type="text/javascript">

  document.getElementById("billingCheckbox").checked = true;
  var billingcheckbox = document.getElementById("billingfield")
    billingcheckbox.style.visibility = "visible"    
  var input = document.getElementById("{{$key}}").value = "{{$value}}"
  </script>
  @endforeach

  @foreach($keys1 as $key => $value) 
  <script type="text/javascript">
  var input = document.getElementById("billing_{{$key}}").value = "{{$value}}"
 
  document.getElementById("billingInput").value = true;
  </script>
  @endforeach

@endif
@endif





</x-guest-layout>