<x-app-layout>

    
    <div class="row">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 g-0 ">
                    <h1>Lid bewerken</h1>
                   
                </div>
                <div class="col-md-6">
                </div>
        <div class="card">
            <form action="{{route("admin.projects.members.update", [$user, $project])}}" method="post" >
              
                @csrf

                
                <div class="mb-3">
                    
                    <div class="mb-3 mt-3">
                        <label for="formFile" class="form-label">Kies gebruikersrol</label>
                       
                        <select class="form-select" aria-label="Default select example" name="role_id">
                        <option selected><td></td></option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                        </select>
                        @error("role_id")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                            
                    <div class="col-12 d-flex flex-row-reverse fs-5">
                        
                        <input type="submit" value="Opslaan" name="submit" class="btn btn-primary  ">
                        <a href="{{route("admin.projects.members.index", $project)}}" class="nav-link  ">Annuleren</a>
                    </div>
                    
            </form>
           
        </div>    
    </div>
    </div>
        

</x-app-layout>