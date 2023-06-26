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

      <div class="row">
        <h2>winkelwagen</h2>
        <div class="col-md-8  ">
          
          <div class="card ">
            <table class="table align-middle ">
                <thead>
                <tr>
                    <th class="py-2 px-3 border-b">Product</th>
                    <th class="py-2 px-3 border-b"></th>
                    <th class="py-2 px-3 border-b"></th>
                    <th class="py-2 px-3 border-b">Aantal</th>
                    <th class="px-4 border-b">Prijs</th>
                    <th class="py-2 px-3 border-b">Subtotaal</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach(session("cart") as $id => $details)
                    <tr class=" fs-9">
                        
                        <td class="py-2 "><a href="{{route("products.show", $id)}}"><img src="{{url("images/".$details["image"])}}" style="cursor:pointer" width="250" height="100" alt=""></a></td>
                        <td class="py-2 px-2 border-b " width="250">{{$details["name"]}}</th>
                          <td ><form action="{{route("cart.delete", $id)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{ $details["name"]}} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form></th>
                            
                        <td class="py-2 px-3"> <select onchange="updateQuantity({{ $id }}, this)" class="form-select w-100" id="productQuantity"  aria-label="Default select example" name="quantity">
                          @for ($i = 1; $i <= 10; $i++)
                          <option value="{{ $i }}" {{ $details['quantity'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                          @endfor
                      </select></th>
                        <td class=""><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($details["price"],2))}}</td>
                        <td class="py-2"><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($details["total_exc"], 2) )}}</td>
                    </tr>
                </tbody>
                  @endforeach
            </table>
          </div>
        </div>
        
        <div class="col-md-4 " >
          <ul class="list-group mb-3 ">
            <!-- Loop through cart items -->
            <li class="list-group-item">
              <h6>Overzicht</h6>
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
              <a href="{{route("products.index")}}" class="vertical-align-middle mt-2">Naar productenoverzicht</a>
              <button class="btn btn-primary float-right btn-md p-2" type="submit"><a class="nav-link active" href="{{route("cart.address")}}" >Volgende stap</a></button>
            </li>
            </ul>
          
        </div>
      </div>

        
  
        
       
  @else
  <h1>u heeft nog geen artikelen</h1>
  <div class="page-container">
  <button class="btn btn-primary btn-lg"><a class="nav-link active" href="{{route("products.index")}}">verder winkelen</a></button>
  </div>
  @endif

</div>
    
</x-guest-layout>