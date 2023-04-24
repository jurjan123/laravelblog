<x-app-layout>
    <div class="row">
        <div class="col-10">
            <h1>Gebruiker bewerken</h1>
            
        <div class="card p-4">
            <form action="/admin/users/{{$id}}" method="post" enctype="multipart/form-data" >
                @method("PUT")
                @csrf
                
            
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Wijzig gebruikersnaam</span>
                        </div>
                        <input type="text" name="name" class="form-control  @error("name")is-invalid @enderror" value="{{old('name', $name)}}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1"  class="form-label">Email adres</label>
                      <input type="email" name="email" value="{{old('email', $email)}}" class="form-control  @error("name")is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Je email wordt met niemand anders gedeeld</div>
                    </div>
                    @error("email")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <div class="mb-3">
                      <div class="form-check ">
                        <input class="form-check-input @error("is_admin")is-invalid @enderror" type="radio" name="is_admin" @if(old("is_admin") == 0) checked @else value="0" @endif  name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Gebruiker
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input @error("is_admin")is-invalid @enderror"  name="is_admin" @if(old("is_admin") == 0) checked @else value="1" @endif type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                          Admin
                        </label>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label for="formFile"  class="form-label">Kies je rol</label>
                      <select class="form-select" aria-label="Default select example"  name="role">
                        @if(empty($rolename))
                        <option selected></option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}" @if(old("role") == $role->id) {{old("role") == $role->name}} selected @endif>{{$role->name}}</option>
                        @endforeach
                        
                        @else
                        <option selected>{{$rolename->name}}</option>
                        @foreach($roles as $role)
                        @if($rolename->name == $role->name)
                        @else
                        <option value="{{$role->id}}" @if(old("role") == $role->id) {{old("role") == $role->name}} selected @endif>{{$role->name}}</option>
                        @endif
                        @endforeach
                        @endif
                       
                      </select>
                    </div>

                    <div class="mb-3">
                        <label for="formFile"  class="form-label">Kies je profielfoto</label>
                        <input class="form-control  @error("user_image")is-invalid @enderror"  name="user_image" type="file" id="formFile">
                    </div>
                    @error("user_image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                   
                    <div class="lh-lg">
                        <label for="exampleFormControlTextarea1" class="form-label ">Type je oude wachtwoord</label>
                          <input type="password" name="password" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" >
                          
                     
                      @error("password")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                    
                        <label for="exampleFormControlTextarea1" class="form-label ">Type je nieuwe wachtwoord</label>
                          <input type="password" name="new_password" class="form-control @error("new_passsword")is-invalid @enderror" id="floatingPassword" >
                          
                      
                      @error("new_password")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                   
                      
                        <label for="exampleFormControlTextarea1" class="form-label ">Herhaal je nieuwe wachtwoord</label>
                          <input type="password" name="password_confirmation" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" >
                          
                     
                      @error("password_confirmation")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                    </div>
                    <div class="col-12 mt-3 d-flex flex-row-reverse  fs-5">
                        
                      <input type="submit" value="Opslaan" name="submit" class="btn btn-primary  ">
                      <a href="{{route("users.index")}}"  class="nav-link  ">Annuleren</a>
                  </div>
                    
            </form>
                
                
        </div>
      
</x-app-layout>