<x-app-layout>
    <div class="row">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6">
                    <h1>Categorie toevoegen</h1>
                   
                </div>
        <div class="card ml-2">
           
            <form action="{{route("admin.categories.store")}}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="mb-3 ">

                    <div class="input-group mb-2  py-2 ">
                        <label for="exampleFormControlTextarea1" name="name"  class="form-label">Naam categorie</label><br><br>
                        <input type="text" name="name" class="form-control ml-5 mt-4 w-100 position-absolute @error('name') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{old("name")}}" >
                    </div>
                    @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="input-group mb-3  py-2 ">
                        <label for="exampleFormControlTextarea1" name="tag"  class="form-label">Naam label (optioneel)</label><br><br>
                        <input type="text" name="tag" class="form-control ml-5 mt-4 w-100 position-absolute @error('tag') is-invalid @enderror"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{old("name")}}" >
                    </div>
                    @error("tag")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <x-input-label for="image" :value="__('Foto veranderen')" />
                    <x-text-input id="image" name="image" placeholder="change image" type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('')" />
                    @error("image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <div class=" row  mt-3">
                        <div class="col-8">

                        </div>
                        <div class="col-4 d-flex justify-content-end ">
                            <a href="{{route("admin.categories.index")}}" class="nav-link  fs-5">Annuleren</a>
                            <input type="submit" value="Opslaan" name="submit" class="btn btn-primary  ">
                        </div>
                       
                       
                       
                        
                    </div>
                    
            </form>
            
          
        </div>    
    </div>
    </div>
    
</x-app-layout>
