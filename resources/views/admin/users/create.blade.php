<x-app-layout>
    <div class="row">
        <div class="col-md-9 ">
            <h1>Gebruiker creeren</h1>
            
        <div class="card p-4">
            <form action="/admin/users/store" method="post" enctype="multipart/form-data" >
                @csrf

            
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">gebruikersnaam</span>
                        </div>
                        <input type="text" name="name" class="form-control @error("name")is-invalid @enderror" value="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            
                    <div class="mb-3">
                      <label for="exampleInputEmail1"  class="form-label">Email adres</label>
                      <input type="email" name="email" value="" class="form-control @error("email")is invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">uw email wordt met niemand anders gedeeld</div>
                    </div>
                    @error("email")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">kies rol</label>
                        <select class="form-control @error("is_admin")is-invalid @enderror" id="exampleFormControlSelect1" name="is_admin">
                          <option value="1">1</option>
                          <option value="2">Editor</option>
                          <option value="3">Admin</option>
                        </select><br>
                      </div>

                    <div class="mb-3">
                        <label for="formFile"  class="form-label">Kies je profielfoto</label>
                        <input class="form-control @error("user_image")is-invalid @enderror" name="user_image" type="file" id="formFile">
                    </div>
                    @error("user_image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                   
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" placeholder="typ je nieuwe wachtwoord">
                        <label for="floatingPassword">Type wachtwoord</label>
                    </div>
                    @error("password")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                
                    <div class="form-floating">
                        <input type="password" style="margin-top:10px" name="password_confirmation" class="form-control @error("password_confirmation")is-invalid @enderror" id="floatingPassword" placeholder="typ je nieuwe wachtwoord">
                        <label for="floatingPassword">herhaal nieuwe wachtwoord</label>
                    </div>
                    @error("password_confirmation")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                    
                
                    <button type="submit"  class="btn btn-primary" style="margin-top:10px">opslaan</button
                       
            </form>
            </div>
</x-app-layout>