<x-app-layout>
   
    <div class="row ">
        <div class="col-md-6 justify-content-between d-flex">
            <h1>Producten</h1>
            <div>
                <div class="">
                    <div class="">
                        <form action="{{ route('admin.products.search') }}" method="GET" role="search">
        
                            <div class="input-group">
                                <a href="{{ route('admin.products.index') }}" class=" ">
                                    <span class="input-group-btn">
                                        </button>
                                    </span>
                                </a>
                               
                                <input type="text" class="form-control mr-2" name="search_data" placeholder="Zoek product" id="term">
                                <span class="input-group-btn ">
                                    <button class="btn btn-info" type="submit" title="Zoek posts">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            
            
            <select class="form-select " onchange="location = this.value"  aria-label="Default select example" name="id">
                <option value="/admin/products"> zoek een categorie</option>
                @foreach($categories as $category)
                <option value="/admin/products/category/{{ $category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
                        
            
            
        </div> 
        
        <div class="col-3 text-right">
            <a href="{{route("admin.products.create")}}" class="btn btn-primary text-light mx-auto text-center" role="button">Product toevoegen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
           
            <div class="card ">
                <table class="table ">
                    <thead>
                    <tr >
                        <th class="py-2 px-3 border-b">Titel</th>
                        <th class="py-2 px-3 border-b">Aanbiedingsprijs</th>
                        <th class="py-2 px-3 border-b">Voorraad</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="mx-auto " >
                           
                            <td class="py-2 px-3 border-b">{{$product->name}}</td>
                            <td class="py-2 px-3 border-b"><i class="bi bi-currency-euro"></i> {{$product->price}}</td>
                            <td class="py-2 px-3 border-b">{{$product->stock}}</td>
                           
                            
                                <td class=" d-flex px-3 border-b py-3 gy-5 ">
                                      <div class="col-6 d-flex">
                                        <form action="{{route("admin.products.delete", $product)}}" method="post">@csrf @method("delete")<button type="submit" role="button" onclick="return confirm('Weet je zeker dat je {{$product->name}} wilt verwijderen?')" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="fa fa-trash"></i></button></form>
                                        <form action="{{route("admin.products.edit", $product)}}" class="offset-3" method="post">@csrf<button type="submit" role="button"><i class="fa fa-pencil" ></i></button></form>
    
                                      </div>
                                </td>
                        </tr>
                        
                        @endforeach
                   </tbody>
                   
                </table>
                {{$products->links()}}
               
        </div>
    </div>

   
    
</x-app-layout>
