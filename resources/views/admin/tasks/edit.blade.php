<x-app-layout>
    <div class="row">
        <div class="container ">
           
            <div class="row ">
                <div class="col-md-6 g-0">
                    <h1>Taak bewerken</h1>
                   
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
                      @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mt-3">
                    
                        <x-input-label for="image" :value="__('datum veranderen')" />
                    <input type="datetime-local" class="form-control "
                        name="created_at" step="any" value="{{$created_at}}">
                    </div>
                    @error("created_at")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mb-3 mt-3 d-column">
                        <label for="formFile"  class="form-label">Actief </label>
                        <select class="form-select  @error("is_open") is-invalid @enderror"   aria-label="Default select example" name="is_open">
                           
                            <option value="{{$active}}" selected>{{$activeName}}</option>
                            @if($activeName != "Ja")
                            <option value="1" >  Ja  </option>
                            @elseif($activeName != "Nee")
                            <option value="0" >Nee  </option>
                            @endif
                        </select>
                        @error("is_open")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3 d-column">
                        <label for="formFile"  class="form-label">Kies status </label>
                        <select class="form-select  @error("status_id") is-invalid @enderror"   aria-label="Default select example" name="status_id">
                            <option value="{{$task_status->id}}" selected>{{$task_status->name}}</option>
                            @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                        @error("status_id")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    
                    <label for="exampleFormControlTextarea1" name="description"  class="form-label mt-2">Beschrijving</label>
                    <textarea class="form-control @error("description") is-invalid @enderror" id="editor" name="description" id="exampleFormControlTextarea1" id="container" rows="20">{{$description}}</textarea>
                    @error("description")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12 mt-3 d-flex flex-row-reverse  fs-5">
                        
                    <input type="submit" value="Opslaan" name="submit" class="btn btn-primary  ">
                    <a href="{{route("admin.tasks.index")}}" class="nav-link  ">Annuleren</a>
                </div>
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
</x-app-layout>