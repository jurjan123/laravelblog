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
                        <input type="text" name="name" class="form-control  @error("name")is-invalid @enderror" value="{{$name}}" aria-label="Username" aria-describedby="basic-addon1">
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

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kies rol</label>
                        <select class="form-control  @error("is_admin")is-invalid @enderror" value="{{old("is_admin")}}" id="exampleFormControlSelect1" name="is_admin">
                          <option value="0">Gebruiker</option>
                          <option value="1">Admin</option>
                        
                        </select><br>
                      </div>

                    <div class="mb-3">
                        <label for="formFile"  class="form-label">Kies je profielfoto</label>
                        <input class="form-control  @error("user_image")is-invalid @enderror" value="{{$user_image}} "name="user_image" type="file" id="formFile">
                    </div>
                    @error("user_image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                   
                    <div class="">
                        <label for="exampleFormControlTextarea1" class="form-label ">Type je oude wachtwoord</label>
                          <input type="password" name="password" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" >
                          
                     
                      @error("password")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                    
                        <label for="exampleFormControlTextarea1" class="form-label ">Type je nieuwe wachtwoord</label>
                          <input type="password" name="password" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" >
                          
                      
                      @error("password")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                   
                    
                      
                        <label for="exampleFormControlTextarea1" class="form-label ">Herhaal je nieuwe wachtwoord</label>
                          <input type="password" name="password" class="form-control @error("passsword")is-invalid @enderror" id="floatingPassword" >
                          
                     
                      @error("password")
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                    </div>
                    <div class="col justify-content-around d-flex mt-3 offset-8">
                        <input type="submit" value="Opslaan" name="submit" class="btn btn-primary offset-2">
                        <a href="{{route("admin.posts.index")}}" class="nav-link fs-5">annuleren</a>
                    </div>
                       
                    
            </form>
                
                
        </div>
        
        <!--x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600"-->
</x-app-layout>