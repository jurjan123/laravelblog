<x-app-layout>
    <div class="row">
        <div class="col-md-9 my-5">
            <h1>gebruiker bewerken</h1>
            
        <div class="card p-4">
            <form action="/users/{{$id}}" method="post">
                @method("PUT")
                @csrf

                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">change username</span>
                        </div>
                        <input type="text" name="name" class="form-control" value="{{$name}}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mb-3">
                      <label for="exampleInputEmail1"  class="form-label">Email address</label>
                      <input type="email" name="email" value="{{$email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">uw email wordt met niemand anders gedeeld</div>
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">type uw oude wachtwoord</label>
                        <input type="password" name="oldpassword" class="form-control" id="exampleInputPassword1">
                      </div>
                      @error('oldpassword')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">nieuw wachtwoord</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">wachtwoord herhalen</label>
                        <input type="password" name="password_repeat" class="form-control" id="exampleInputPassword1">
                    </div>
                    @error('password_repeat')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
                
        </div>
        

</x-app-layout>