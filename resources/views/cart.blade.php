<x-guest-layout>

  
    <div class="container">
        <div class="row">
          <div class="col-md-8">
        
            <div class="col-4 g-0 mb-2 d-flex"><a href="{{route("cart")}}" class="fa-2x" style="color:black;"><i class="bi bi-cart3 fa-lg"></i></a><br><h2>Winkelwagentje</h2></div>
            <div>
                @foreach($cart as $product)
                <div class="card p-3 mb-2">
                  <div></div>
                  <div></div>
                <div><img src="{{url("images/".$product)}}" width="50" alt=""></div>
               
                </div>
                
                @endforeach
               
            </div>
             
            
          </div>
          <div class="card col-md-4 h-50 p-4 mt-5">
            <!-- Totale prijs -->
            <h2>Overzicht</h2>
            <p>artikelen: 100</p>
            <p>Te betalen: 100 euro</p><hr>
            <button class="btn btn-primary w-50">Ga door naar betalen</button>
          </div>
        </div>
      </div>
</x-guest-layout>



<!--<div class="container">
   
    <div class="row ">
        
       
        <div class="card col-8 mb-2"><p></p></div>
        

        
   
</div>
  
</div>-->

