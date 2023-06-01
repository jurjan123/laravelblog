<x-guest-layout>

  <div class="container g-0">
      <div class=" text-left">
        <h2>winkelwagen</h2>
      </div>
    
      <div class="row">
        <div class="col-md-4 order-sm-2   mb-4" >
          <h4 class="d-flex justify-content-between align-items-center ">
            <span class="text-muted">Je winkelwagen</span>
          </h4>
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
              <strong>5</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal</span>
              <strong>40,00</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>BTW</span>
              <strong>21%</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Totaal</span>
              <strong>48.40</strong>
            </li>
            </ul>
          <button class="btn btn-primary btn-lg" type="submit">Bestellen en betalen</button>
        </div>

        
  
        
        <div class="col-md-8 g-0 mt-2 p-3 lh-lg order-sm-1">
          @if(session("cart"))
          @foreach(session("cart") as $id => $details)
         
          <form class="needs-validation">
          <div class="card d-flex p-3">
            <div class="row">
              <div class="col-2">
              
                <img src="{{url("images/".$details["image"])}}" width="100" alt="">
              </div>
              <div class="col-8">
                <h4>{{$details["name"]}}</h4>
                <select class="form-select w-25 mt-3" id="amount" id="user" value="" aria-label="Default select example" name="quantity">
                  <option value="{{$details["quantity"]}}" selected>{{$details["quantity"]}}</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option  value="3" >3</option>
                  <option  value="4" >4</option>
                  <option  value="5" >5</option>
                  <option  value="6" >6</option>
                  <option  value="7" >7</option>
                  <option  value="8" >8</option>
                  <option value="9" >9</option>
                  <option id="more">meer</option>
              </select>
              </div>

              <div class="col-2 d-column">
                <p class="mb-0">Prijs per stuk  </p>
                <p>20.00</p>
               
              </div>
            </div>
            
          </div>
        </form><br>
        @endforeach
        @endif
    
      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
      
    
      <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
      <div class="container text-center">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
          <div class="col">Column</div>
          <div class="col">Column</div>
          <div class="col">Column</div>
          <div class="col">Column</div>
        </div>
      </div>
      <!-- Columns are always 50% wide, on mobile and desktop -->
    
    

    </div>

    
  </x-guest-layout>