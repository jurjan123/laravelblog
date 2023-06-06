<x-guest-layout>
  <div class="container px-4 mt-5">
    <div class="row ">
      
        <div class="col-md-4 order-md-3 mb-4">
        <ul class="list-group mb-3">
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
              <strong><i class="bi bi-currency-euro"></i>{{$subtotal}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>BTW</span>
              <strong><i class="bi bi-currency-euro"></i>{{$btw}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Totaal</span>
              <strong><i class="bi bi-currency-euro"></i>{{$subtotal + $btw}}</strong>
            </li>
        </ul>
          <button class="btn btn-primary p-2" type="submit">Bestelling plaatsen</button>
        </div>

       
        
        <div class="col lh-md card p-3  order-md-1">
            <h2>Bezorgadres</h2>
            <div class="row  fs-5">
               
                <div class="mt-3 mb-3">
                    @foreach($address as $key => $value)
                     {{$value}}<br>
                    @endforeach
                </div>
            </div>
        </div>
      
     
        
        <div class="col card p-3 order-md-2">
            <h2>Factuuradres</h2>
            <div class="row  fs-5">
                <div class="mt-3">
                    @foreach($billingaddress as $key => $value)
                    {{$value}}<br> 
                    @endforeach
                </div>
            </div>
        </div>
    
    </div>
</div> 
</x-guest-layout>