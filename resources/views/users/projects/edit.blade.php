<x-user-layout>

    
    <div class="row">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 g-0 ">
                    <h1>Project bewerken</h1>
                   
                </div>
                <div class="col-md-6">
                </div>
        <div class="card col-12">
            <form action={{route("users.projects.update", $project->id)}} method="post" enctype="multipart/form-data">
                
                @csrf

                
                <div class="mb-3">
                    
                   
                        <div class="input-group mb-3  py-3 ">
                            <label for="exampleFormControlTextarea1" name="title"  class="form-label">Titel</label><br><br>
                            <input type="text" value="{{old("title", $project->title)}}" name="title" class=" error form-control ml-5 mt-4 w-100 position-absolute @error('title') is-invalid  @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                          @error("title") <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                       
                    </div>

                    <div class="mb-3">
                        <x-input-label for="image" :value="__('Foto veranderen')" />
                        <x-text-input id="image"   name="image" placeholder="change image" type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        @error("image")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
    
                           <img class="mt-1" src="{{url("images/".$project->image)}}" alt="" width="300" height="300">
                    </div>
                    
                            
                    <div class="col-12 d-flex flex-row-reverse fs-5 mb-2">
                        
                        <input type="submit" value="Opslaan" name="submit" class="btn btn-primary  ">
                        <a href="{{route("users.projects.index")}}" class="nav-link  ">Annuleren</a>
                    </div>
                    
            </form>
           
        </div>    
    </div>
    </div>
        

</x-user-layout>