<x-guest-layout>
  
  <div class="container  ">
    <div class="row ">
        <h1>Overzicht</h1>
        <div class="col-md-4 order-md-3 mb-4">
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
              <strong><i class="bi bi-currency-euro"></i>{{number_format($subtotal,2)}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>BTW</span>
              <strong><i class="bi bi-currency-euro"></i>{{number_format($btw,2)}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Totaal</span>
              <strong><i class="bi bi-currency-euro"></i>{{number_format($subtotal_incl,2)}}</strong>
            </li>
        </ul>
        <button class="btn btn-primary btn-md p-2" type="submit"><a class="nav-link active" href="{{route("cart.order")}}" >Bestelling plaatsen</a></button>
        </div>

        <div class="col-8">
        <div class="row gy-4 ">
          <div class="col-6 order-md-1">
            <div class="card p-3  ">
              <h2>Factuuradres</h2>
              
                  <div class="mt-3">
                      @foreach($billingaddress as $key => $value)
                      {{$value}}<br> 
                      @endforeach
                  </div>
              
              </div>
          </div>
          

          <div class="col-6 order-md-2">
            <div class="card p-3  ">
              <h2>Factuuradres</h2>
              
                  <div class="mt-3">
                      @foreach($billingaddress as $key => $value)
                      {{$value}}<br> 
                      @endforeach
                  </div>
              
              </div>
          </div>
        </div>

        <div class="card mt-3">
        <table class="table align-middle ">
          <thead>
          <tr>
              <th class="py-2 px-3 border-b">Product</th>
              <th class="py-2 px-3 border-b"></th>
              
              <th class="py-2 px-5 border-b">Aantal</th>
              <th class="px-4 border-b">Prijs</th>
              <th class="py-2 px-3 border-b">Subtotaal</th>
              
          </tr>
          </thead>
          <tbody>
            
            
            
            @foreach(session("cart") as $id => $details)
              <tr class=" fs-9">
                  
                  <td class="py-2 px-3 border-b "><img src="{{url("images/".$details["image"])}}" width="200" height="100" alt=""></td>
                  <td class="py-2 px-3 border-b " width="250">{{$details["name"]}}</th>
                   
                      
                  <td class="py-2 px-5 border-b">{{$details["quantity"]}}</th>
                  <td class=""><i class="bi bi-currency-euro"></i>{{$details["price"]}}</td>
                  <td class="py-2 px-3 border-b"><i class="bi bi-currency-euro"></i>{{$details["quantity"] * $details["price"].".00"}}</td>
                  
                    
              </tr>
              
        </tbody>
          @endforeach
          

          
          
          
      </table>
    </div>
  

    </div>



          
        </div>

       


        <div class="col-md-8 mb-5 g-0 lh-md order-md-4">

          <div class="card ">
            
          
    </div>
</div> 
</x-guest-layout>