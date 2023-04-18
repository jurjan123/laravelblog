<x-app-layout>

    
    <div class="row">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <h1>Categorie bewerken</h1>
                   
                </div>
        <div class="card ml-2 p-3 ">
            <form action="/admin/categories/{{$id}}" method="post" enctype="multipart/form-data">
                @method("PUT")
                @csrf

                
                <div class="mb-3">
                    <div class="mb-3 ">

                        <div class="input-group mb-3  py-2 ">
                            <label for="exampleFormControlTextarea1"  class="form-label">Titel</label><br><br>
                            <input type="text" value="{{$name}}"   name="name" class=" error form-control ml-5 mt-4 w-100 position-absolute @error('title') is-invalid  @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                          @error("title") <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                       
                          <x-input-label for="image" :value="__('Foto veranderen')" />
                          <x-text-input id="image" name="image" placeholder="change image" type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                          <x-input-error class="mt-2" :messages="$errors->get('name')" />
                          @error("image")
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                         
                          <div class="row mt-3 d-flex">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <input type="submit" value="Opslaan" name="submit" class="btn btn-primary">
                                <a href="{{route("admin.categories.index")}}" class="nav-link">Annuleren</a>
                            </div>
                            
                            
                          </div>
                        </div>
                        
            </form>
           
        </div>    
    </div>
    </div>
        

</x-app-layout>