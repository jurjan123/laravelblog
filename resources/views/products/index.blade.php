<x-guest-layout>
   
      <div class="row gy-4 w-100"> <div class="col-10">
        <h1 class="mt-3">producten</h1>
      </div>
      <div class="col-2 mt-5">
        <select class="form-select " onchange="location = this.value"  aria-label="Default select example" name="category_id">
          <option value="/admin/posts" selected> sorteer op </option>
          <option value="/admin/posts" selected> Naam A-Z </option>
          <option value="/admin/posts" selected> Naam Z-A </option>
          <option value="/admin/posts" selected> Datum aflopend </option>
      </select>
      </div>
        
        @foreach($products as $product)
          <div class="col-4">
              <div class="card h-100">
                @if($product->image != "Monkey-Puppet.png")
                <img src="{{url("images/". $product->image)}}" class="card-img-top" width="300" height="300" alt="...">
                @else
                <img src="{{url("images/".$product->image)}}" class="card-img-top" width="300" height="300" alt="...">
                @endif
                  <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text"><i class="bi bi-currency-euro"></i>{{$product->price}} </p>
                   
                    <div class="d-flex justify-content-between">
                      <a href="{{route("products.show", $product->id)}}" class="btn btn-primary">Bekijk product</a>
                    <form action="{{route("cart.add", $product->id)}}" method="post">@csrf
                      <input type="hidden" name="product" value="{{$product}}">
                      <button type="submit" class="btn btn-warning"><i class="bi bi-plus-lg"></i> <i class="bi bi-cart3 fa-lg"></i></button>
                    </form>
                    </div>
                    
                  </div>
                </div>
          </div>
  
         @endforeach
      </div>
      {{$products->links()}}

      @yield("cards")
  </x-guest-layout>