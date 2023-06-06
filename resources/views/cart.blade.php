<x-guest-layout>
  <head>
    <style>
      .page-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
}
    </style>
  </head>
  @if(!empty(session("cart")))

  <div class="container g-0">
      <div class=" text-left">
        <h2>winkelwagen</h2>
      </div>
    
      <div class="row">
        <div class="col-md-4 order-sm-2   mb-4" >
          <h4 class="d-flex justify-content-between align-items-center ">
            
          </h4>
          <ul class="list-group mb-3 mt-3">
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
              {{dd($subtotal_inc)}}
              <strong><i class="bi bi-currency-euro"></i>{{$subtotal_inc}}</strong>
            </li>
            </ul>
          <button class="btn btn-primary btn-md p-2" type="submit"><a class="nav-link active" href="{{route("cart.address")}}">Volgende stap</a></button>
        </div>

        
  
        
        <div class="col-md-8 g-0  p-3 lh-lg order-sm-1">
          
          <div class="card ">
            <table class="table align-middle ">
                <thead>
                <tr>
                    <th class="py-2 px-3 border-b">Product</th>
                    <th class="py-2 px-3 border-b"></th>
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
                          <td ><form action="{{route("cart.delete", $id)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $details["name"]}} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form></th>
                        <td class="py-2 px-5 border-b"> <select class="form-select" id="amount" id="user" value=""  aria-label="Default select example" name="quantity">
                          <option value="{{$details["quantity"]}}">{{$details["quantity"]}}</option>
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
                      </select></th>
                        <td class=""><i class="bi bi-currency-euro"></i>{{$details["price"]}}</td>
                        <td class="py-2 px-3 border-b"><i class="bi bi-currency-euro"></i>{{$details["quantity"] * $details["price"].".00"}}</td>
                        
                          
                    </tr>
                    
              </tbody>
                @endforeach
                

                
                
                
            </table>
            @else
              <h1>u heeft nog geen artikelen</h1>
              
              <div class="page-container">
                
                <button class="btn btn-primary btn-lg"><a class="nav-link active" href="{{route("products.index")}}">verder winkelen</a></button>
              </div>
            @endif

        
        
        </div>
    
    </div>

    
  </x-guest-layout>