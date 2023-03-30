<x-app-layout>

    
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Project bewerken</h1>
                   
                </div>
        <div class="card">
            <form action="/admin/projects/{{$id}}" method="post" enctype="multipart/form-data">
                @method("PUT")
                @csrf

                
                <div class="mb-3">
                    <div class="mb-3 ">

                        <div class="input-group mb-3  py-2 ">
                            <label for="exampleFormControlTextarea1" name="title"  class="form-label">Titel</label><br><br>
                            <input type="text" @if($errors->any())value="{{old("title")}}" @else value="{{$title}}" @endif   name="title" class=" error form-control ml-5 mt-4 w-100 position-absolute @error('title') is-invalid  @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                          @error("title") <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                       

                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label ">intro</label>
                            <textarea class="form-control @error("intro") is-invalid @enderror" value="{{old("intro")}}" name="intro" id="exampleFormControlTextarea1" rows="3">{{$intro}}  </textarea>
                          </div>
                          @error("intro")
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                       
    
                        <x-input-label for="image" :value="__('Foto veranderen')" />
                        <x-text-input id="image" value="{{$image}}"  name="image" placeholder="change image" type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        @error("image")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
    
                        <input type="datetime-local" value="{{$created_at}}" class="form-control mt-3"
                        name="created_at" step="any">
               
                        
                        <label for="exampleFormControlTextarea1" name="description"  class="form-label mt-2">Beschrijving</label>
                        <textarea class="form-control" id="editor" value="" name="description" id="exampleFormControlTextarea1" id="container" rows="20">{{$description}}</textarea>
                        @error("description") <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                    </div>
    
                        
                    <div class="col justify-content-around d-flex offset-9">
                        <input type="submit" value="Opslaan" name="submit" class="btn btn-primary offset-2">
                        <a href="{{route("admin.posts.index")}}" class="nav-link fs-5">annuleren</a>
                    </div>
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
        

</x-app-layout>