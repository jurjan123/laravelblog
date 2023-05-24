<x-app-layout>
    <div class="row">
        <div class="container ">
           
            <div class="row  ">
                <div class="col-md-6">
                    <h1>Taak toevoegen</h1>
                   
                </div>
               
        <div class="card p-3 ">
           
            <form action="{{route("admin.tasks.store")}}" method="post" >
                @csrf

                <div class="mb-3 ">

                    <div class="input-group mb-3  py-2 ">
                        <label for="exampleFormControlTextarea1" name="name"  class="form-label ">Naam</label><br><br>
                        <input type="text" name="name" value="" class="form-control ml-5 mt-4 w-100 position-absolute @error("name") is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mt-3">
                    
                    <x-input-label for="image" :value="__('datum veranderen')" />
                    <input type="datetime-local" class="form-control "
                        name="created_at" step="any" value="">
                    </div>
                    @error("created_at")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mb-3 mt-3 d-column">
                            <label for="formFile"  class="form-label">Actief </label>
                            <select class="form-select  @error("is_open") is-invalid @enderror"   aria-label="Default select example" name="is_open">
                               
                                <option value="" selected>Kies Optie</option>
                                <option value="0" >Nee  </option>
                                <option value="1" >  Ja  </option>
                            </select>
                            @error("is_open")
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>

                    <div class="mb-3 mt-3 d-column">
                        <label for="formFile" id="status"  class="form-label">Kies status </label>
                        <select class="form-select  @error("status_id") is-invalid @enderror" id="status"   aria-label="Default select example" name="status_id">
                           
                            <option value="" selected>Kies Status</option>
                            @foreach($statuses as $status)
                            <option value="{{$status->id}}" >{{$status->name}}  </option>
                            @endforeach
                        </select>
                        @error("status_id")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="mb-3 mt-3 d-column">
                    <label for="formFile" id="user"  class="form-label">Taak geven aan gebruiker </label>
                    <select class="form-select  @error("status_id") is-invalid @enderror" id="user"   aria-label="Default select example" name="user_id">
                       
                        <option value="" selected>Kies gebruiker</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" >{{$user->name}}  </option>
                        @endforeach
                    </select>
                    @error("user_id")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            </div>
                    

                    <label for="exampleFormControlTextarea1" name="description"  class="form-label mt-2">Beschrijving</label>
                    <textarea class="form-control @error("description") is-invalid @enderror" id="editor" name="description" id="exampleFormControlTextarea1" id="container" rows="20">{{old("description")}}</textarea>
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