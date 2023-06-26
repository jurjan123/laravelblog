<x-guest-layout>
      <div class="row w-100">
      <div class="col-10">
        <h1 class="mt-3">producten</h1>
      </div>
      <div class="col-2 mt-3">
        <select class="form-select " onchange="location = this.value"  aria-label="Default select example" name="category_id">
          <option value="/admin/posts" selected> sorteer op </option>
          <option value="/admin/posts" selected> Naam A-Z </option>
          <option value="/admin/posts" selected> Naam Z-A </option>
          <option value="/admin/posts" selected> Datum aflopend </option>
      </select>
      </div>
    </div>
          <div class="row">
            <div class="card col-3 "></div>
          @foreach($products as $product)
              <div class="card w-25 ">
                @if($product->image != "Monkey-Puppet.png")
                <a href="{{route("products.show", $product->id)}}"><img src="{{url("images/". $product->image)}}" style="cursor:pointer" class="card-img-top h-50%"  alt="..."></a>
                @else
                <a href="{{route("products.show", $product->id)}}"><img src="{{url("images/".$product->image)}}" style="cursor:pointer" class="card-img-top  "  alt="..."></a>
                @endif
                  <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    @if(!empty($product->discount))
                    <p class="card-text mt-3"><i class="bi bi-currency-euro"></i>Meestal <s>{{str_replace(".", ",", number_format($product->price + $product->discount,2))}}</s> <span class="badge  text-bg-danger">%{{$product->discount_percent}}</span> </p>
                    <p class="card-text mt-3"><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($product->price,2))}}</p>
                    @else
                    <p class="card-text mt-3"><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($product->price,2))}}</p>
                    @endif
                    
                    <div class="d-flex justify-content-between">
                      <a href="{{route("products.show", $product->id)}}" class="btn btn-primary">Bekijk product</a>
                      <form action="{{route("cart.add", $product->id)}}" method="post">@csrf
                      <input type="hidden" name="product" value="{{$product->id}}">
                      <button type="submit" class="btn btn-warning"><i class="bi bi-plus-lg"></i> <i class="bi bi-cart3 fa-lg"></i></button>
                      </form>
                    </div>
                    
                  </div>
                </div>
          
         @endforeach
        </div>
       
       
      {{$products->links()}}
  </x-guest-layout>