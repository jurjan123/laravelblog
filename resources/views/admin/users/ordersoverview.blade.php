<x-user-layout>
        
    
    <div class="card mt-5">
        <div class="row p-3">
            <div class="col-5"><h1>Mijn bestellingen</h1></div>
           
            <div class="col-4 float-right text-right">
                
                            <form action="{{ route('users.orders.search') }}" method="GET" role="search">
            
                                <div class="input-group">
                                    <a href="{{ route('users.orders.overview') }}" class=" ">
                                        <span class="input-group-btn">
                                            </button>
                                        </span>
                                    </a>
                                   
                                    <input type="text" class="form-control mr-2"  name="search_data" value="{{old("search_data")}}" placeholder="Zoek bestelling" id="term">
                                    <span class="input-group-btn ">
                                        <button class="btn btn-info" type="submit" title="Zoek posts">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                       
            </div>
            
        </div>
       
        
    
        <table class="table align-middle">
            <thead>
                
            <tr >
                <th class="py-2 px-3 border-b">Bestelling</th>
                <th class="py-2 px-3 border-b">Datum</th>
                <th class="py-2 px-3 border-b">Tijd</th>
                <th class="py-2 px-3 border-b">Totaal(exl)</th>
                <th class="py-2 px-3 border-b">Totaal(incl)</th>
                <th class="py-2 px-3 border-b"></th>
            </tr>
            </thead>
            <tbody>
                @if(url()->current() == route("users.orders.overview"))
                @foreach($orders as $order)
                <tr class="" >
                    <td class="py-2 px-3 border-b">{{$order->id}}</td>
                    <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($order->created_at))}}</th>
                    <td class="py-2 px-3 border-b">{{substr($order->created_at,10)}}</td>
                    <td class="py-2 px-3 border-b">{{$order->total_exc}}</td>
                    <td class="py-2 px-3 border-b">{{$order->total_inc}}</td>
                    <td class="py-3 px-3">
                    <button class="btn btn-primary fs-5 w-100 p-1"><a href="{{route("users.orders.orderdetailsoverview", $order)}}"  class="nav-link active">Details</a></button>
                    </td>  
                </tr>
                @endforeach
                @else
                <tr class="" >
                    <td class="py-2 px-3 border-b">{{$order->id}}</td>
                    <td class="py-2 px-3 border-b">{{date("d/m/Y", strtotime($order->created_at))}}</th>
                    <td class="py-2 px-3 border-b">{{substr($order->created_at,10)}}</td>
                    <td class="py-2 px-3 border-b">{{$order->total_exc}}</td>
                    <td class="py-2 px-3 border-b">{{$order->total_inc}}</td>
                    <td class="py-3 px-3">
                    <button class="btn btn-primary fs-5 w-100 p-1"><a href="{{route("users.orders.orderdetailsoverview", $order)}}"  class="nav-link active">Details</a></button>
                    </td>  
                </tr>
                    
                @endif
               
               
           
            
            </tbody>
           
        </table>
        <div class="p-1">{{$orders->links()}}</div>
</x-user-layout>
    