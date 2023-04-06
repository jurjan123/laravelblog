<x-app-layout>
    <div class="row">
        <div class="container ">
           
            <div class="row  ">
                <div class="col-md-6">
                    <h1>Taak toevoegen</h1>
                   
                </div>
               
        <div class="card p-3 ">
           
            <form action="/admin/tasks/{{$id}}" method="post" >
                @method("PUT")
                @csrf
                
                <div class="mb-3 ">

                    <div class="input-group mb-3  py-2 ">
                        <label for="exampleFormControlTextarea1" name="name"  class="form-label">Naam</label><br><br>
                        <input type="text" name="name" value="{{$name}}" class="form-control ml-5 mt-4 w-100 position-absolute @error("name") is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      @error("title")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mt-3">
                    
                        <x-input-label for="image" :value="__('datum veranderen')" />
                    <input type="datetime-local" class="form-control "
                        name="created_at" step="any" value="{{$created_at}}">
                    </div>
                    
                    <label for="exampleFormControlTextarea1" name="description"  class="form-label mt-2">Beschrijving</label>
                    <textarea class="form-control @error("description") is-invalid @enderror" id="editor" name="description" id="exampleFormControlTextarea1" id="container" rows="20">{{$description}}</textarea>
                    @error("description")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                    
                <div class="col justify-content-around d-flex offset-9">
                    <input type="submit" value="Opslaan" name="submit" class="btn btn-primary offset-2">
                    <a href="{{route("admin.tasks.index")}}" class="nav-link fs-5">annuleren</a>
                </div>
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
</x-app-layout>