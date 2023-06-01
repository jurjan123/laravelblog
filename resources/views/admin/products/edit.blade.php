<x-app-layout>
    <div class="row">
        <div class="container ">
           
            <div class="row  ">
                <div class="col-md-6 g-0">
                    <h1>Product bewerken</h1>
                   
                </div>
               
              
        <div class="card p-3 ">
            
           
            <form action="{{route("admin.products.update", $product->id)}}" method="post" enctype="multipart/form-data">
                @method("PUT")
                @csrf
            

                <div class="mb-3  ">

                    <div class="input-group mb-3  py-1 ">
                        <label for="exampleFormControlTextarea1" name="name"  class="form-label">Name</label><br><br>
                        <input type="text" name="name" value="{{old("name", $product->name)}}" class="form-control ml-5 mt-4 w-100 position-absolute @error("title") is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                      @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <x-input-label for="image" :value="__('Foto kiezen')" />
                    <x-text-input id="image" name="image" placeholder="change image"  type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                    @error("image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    @if($product->image != "Monkey-Puppet.png")
                    <img class="mt-1" name="image" src="{{url("images/".$product->image)}}" value="{{old("image")}}" alt="" onchange="this.value" width="300" height="300"><p>huidige foto</p>
                    @endif

                    <div class="mb-3 mt-3 d-column">

                        <label for="formFile"  class="form-label">Kies categorie </label>
                        <div class="col-8 mt-1 "  width="500">
                            
                            @foreach($categories as $category)
                            <input type="checkbox" value="{{$category->id}}" id="{{$category->id}}" name="categories[]">

                            @foreach($productCategories as $productCategory)
                            @if($category->id == $productCategory["id"])
                            <script type="text/javascript">
                                document.getElementById({{$category->id}}).checked = true;
                            </script>
                            @endif
                            @endforeach
                            <label for="horns">{{$category->name}}</label>
                            @endforeach
                        </div>
                        @error("categories")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        </div>
                    </div>
                  

                    <div class="input-group mb-3">
                        <label for="exampleFormControlTextarea1" name="price"  class="form-label">Prijs</label><br><br>
                        <input type="text" name="price" value="{{old("price", $product->price)}}" class="form-control ml-5 mt-4 w-100 position-absolute @error("price") is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      @error("price")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    
                    <div class="mb-3 mt-4 d-column">
                        <label for="formFile" id="user"  class="form-label">Kies BTW</label>
                        <select class="form-select  @error("vat") is-invalid @enderror" id="user" value="" aria-label="Default select example" name="vat">
                           
                            <option selected value="{{$product->vat}}">{{old("vat",$product->vat)}}%</option>
                            <option value="21">21%</option>
                            <option value="9">9%</option>
                            <option value="0">0%</option>
                        </select>
                        @error("vat")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                      <div class="input-group mb-3  py-1 ">
                        <label for="exampleFormControlTextarea1" name="discount"  class="form-label">Kortingsprijs in euro's (optioneel)</label><br><br>
                        <input type="text"  name="discount" value="{{old("discount", $product->discount)}}" class="form-control ml-5 mt-4 w-100 position-absolute  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                      @error("discount")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                      <div class="input-group mb-3  py-1 ">
                        <label for="exampleFormControlTextarea1" name="quantity"  class="form-label">Voorraad</label><br><br>
                        <input type="number" name="stock" value="{{old("stock", $product->stock)}}" class="form-control ml-5 mt-4 w-100 position-absolute @error("stock") is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                      @error("stock")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    
                    <label for="exampleFormControlTextarea1" name="description"  class="form-label mt-2">Beschrijving</label>
                    <textarea class="form-control @error("description") is-invalid @enderror" id="editor" name="description" id="exampleFormControlTextarea1" id="container" rows="20">{{old("description", $product->description)}}</textarea>
                    @error("description")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="d-flex mt-3 flex-row-reverse">
                    
                        <input type="submit" value="Opslaan" name="submit" class="btn btn-primary "><br>
                        <a href="{{route("admin.products.index")}}" class="nav-link fs-5 mx-3 "> Annuleren</a><br>
                      </div>
    
                    
                
                </div>

                
               
                
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
    
        

</x-app-layout>