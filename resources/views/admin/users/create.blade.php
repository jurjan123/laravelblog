<x-app-layout>
    <div class="row">
        <div class="col-md-9 ">
            <h1>Gebruiker creeren</h1>
            
        <div class="card p-4">
            <form action="/admin/users/store" method="post" enctype="multipart/form-data" >
                @csrf

            
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Gebruikersnaam</span>
                        </div>
                        <input type="text" name="name" class="form-control @error("name")is-invalid @enderror" value="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1"  class="form-label">Email adres</label>
                      <input type="email" name="email" value="" class="form-control @error("email")is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Je email wordt met niemand anders gedeeld</div>
                    </div>
                    @error("email")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kies rol</label>
                        <select class="form-control @error("is_admin")is-invalid @enderror" id="exampleFormControlSelect1" name="is_admin">
                          <option value="0">Gebruiker</option>
                          <option value="1">Admin</option>
                        </select><br>
                      </div>

                    <div class="mb-3">
                        <label for="formFile"  class="form-label">Kies je profielfoto</label>
                        <input class="form-control @error("user_image")is-invalid @enderror" name="user_image" type="file" id="formFile">
                    </div>
                    @error("user_image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                   
                    <div class="">
                      <label for="exampleFormControlTextarea1" class="form-label ">Type je nieuwe wachtwoord</label>
                        <input type="password" name="password" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" >
                        
                    </div>
                    @error("password")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                
                    <div class="">
                      <label for="exampleFormControlTextarea1" class="form-label mt-2 ">Herhaal je nieuwe wachtwoord</label>
                        <input type="password"  name="password_confirmation" class="form-control @error("password_confirmation")is-invalid @enderror mt-1" id="floatingPassword" >
                        
                    </div>
                    @error("password_confirmation")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                    <div class="col offset-9 d-flex mt-3 ">
                     
                      <button type="submit" class="btn btn-primary " >Opslaan</button>
                        <a href="{{route("users.index")}}" class="nav-link fs-5 offset-1">annuleren</a>
                    </div>
                    
                       
            </form>
            </div>
</x-app-layout>