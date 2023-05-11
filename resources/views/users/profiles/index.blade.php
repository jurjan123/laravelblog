<x-user-layout>
   
  <div class="row">
      <div class="col-10">
          <h1>Je profiel</h1>
          
      <div class="card p-3">
          <form action="/user/{{$id}}" method="post" enctype="multipart/form-data" >
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
    

</x-user-layout>