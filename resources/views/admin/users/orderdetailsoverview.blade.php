<x-user-layout>
    <h1>Overzicht</h1>
    <div class="col-12">
    <div class="row gy-4 ">
      <div class="col-6 ">
        <div class="card p-3">
          <h2>Bezorgadres</h2>
          <div class="mt-3">
          @foreach($customers as $customer)
          @if($customer->type == "bezorgadres")
          {{$customer->first_name}} {{$customer->last_name}} <br>
          {{$customer->street}}  {{$customer->house_number}} <br>
          {{$customer->postal_code}} {{$customer->city}} <br>
          {{$customer->phone_number}} <br>
          {{$customer->email_adress}} <br>
          @endif
          @endforeach
          </div>
        </div>
      </div>
      
      <div class="col-6">
        <div class="card p-3  ">
        <h2>Factuuradres</h2>
        <div class="mt-3">
          @foreach($customers as $customer)
          @if($customer->type == "factuuradres")
          {{$customer->first_name}} {{$customer->last_name}} <br>
          {{$customer->street}}  {{$customer->house_number}} <br>
          {{$customer->postal_code}} {{$customer->city}} <br>
          {{$customer->phone_number}} <br>
          {{$customer->email_adress}} <br>
          @endif
          @endforeach
        </div>
        </div>
      </div>
    </div>

      <div class="row g-0 mt-3 ">
        <div class="card ">
          <table class="table align-middle ">
          <thead>
            <tr class="fs-5">
                <th class="py-2 px-3 border-b">Product</th>
                <th class="py-2 px-3 border-b"></th>
                <th class="py-2 px-5 border-b">Aantal</th>
                <th class="px-3 border-b">Prijs</th>
                <th class="py-2 px-3 border-b">Subtotaal</th>
            </tr>
          </thead>
          <tbody>
                @foreach($products as $product)
                <tr class=" fs-5">
                    <td class="py-2 px-3 border-b "><img src="{{url("images/$product->product_image")}}" width="200" height="100" alt=""></td>
                    <td class="py-2 px-3 border-b " width="250">{{$product->product_name}}</th>   
                    <td class="py-2 px-5 border-b">{{$product->quantity}}</th>
                    <td class=""><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($product->product_price, 2))}}</td>
                    <td class="py-2 px-3 border-b"><i class="bi bi-currency-euro"></i>{{str_replace(".", ",", number_format($product->quantity * $product->product_price, 2) )}}</td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

      <div class="row g-0">
        <div class="col-6">hello world</div>
        <div class="col-6 mt-3">
          <ul class="list-group mb-3 " id="list-group">
            <!-- Loop through cart items -->
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Overzicht</h6>
              </div>
            </li>
            <!-- Total amount -->
            <li class="list-group-item d-flex justify-content-between">
              <span>Artikelen: </span>
              <strong></strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal</span>
              <strong><i class="bi bi-currency-euro"></i>{{$order->total_exc}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>BTW</span>
              <strong><i class="bi bi-currency-euro"></i>{{$order->vat}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Totaal</span>
              <strong><i class="bi bi-currency-euro"></i>{{$order->total_inc}}</strong>
            </li>
           
             
            
            
        </ul>
       
        </di>
      </div>



    </div>

    

      
      
    
    
</x-user-layout>
    