<x-app-layout>
    <div class="row">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 g-0">
                    <h1>Post bewerken</h1>
                   
                </div>
            
        <div class="card ">
            
            <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
                @method("PUT")
                @csrf

                <div class="mb-3">
                    <div class="mb-3 ">

                        <div class="input-group mb-3  py-2 ">
                            <label for="exampleFormControlTextarea1" name="title"  class="form-label">Titel</label><br><br>
                            <input type="text" @if($errors->any())value="{{old("title")}}" @else value="{{$post->title}}" @endif name="title" class="form-control ml-5 mt-4 w-100 position-absolute @error('title') is-invalid  @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </div>
                          @error("title")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
    
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Intro</label>
                            <textarea class="form-control @error("intro")is-invalid @enderror" value="{{old("intro")}}" name="intro"  id="exampleFormControlTextarea1" rows="3">{{$post->intro}} </textarea>
                          </div>
                          @error("intro")
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
    
                        <x-input-label for="image" :value="__('Foto veranderen')" />
                        <x-text-input id="image"   name="image" placeholder="change image" type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        @error("image")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
    
                           
                    <div class="mt-3">
                        <x-input-label for="image" :value="__('Datum veranderen')" />
                    <input type="datetime-local" on class="form-control "
                        name="created_at" step="any"  value="{{$post->created_at}}">
                    </div>
                   

                        <div class="mb-3 mt-3 d-column">
                            <label for="formFile"  class="form-label">Kies categorie </label>
                            <div class="mt-1">
                                <select class="js-example-basic-single mt-5 " name="category_id">
                                    <option value="{{$post->category_id}}" selected>@if($post->category_id != null) {{$post->categories->name}}  @else @endif</option>
                                    @if(empty($categoriename))
                                    
                                    <option selected></option>
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach

                                    @else
                                    <option selected>{{$categoriename}}</option>
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                               
                               
                            </div>
                            
                        </div>
                        
                        <label for="exampleFormControlTextarea1" name="description"  class="form-label mt-2">Beschrijving</label>
                        <textarea class="form-control" id="editor" value="" name="description" id="exampleFormControlTextarea1" id="container" rows="20">{{$post->description}} {{old("intro")}}</textarea>
                        @error("description")
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                   
                   
            </form>
            <div class="col-12 d-flex flex-row-reverse mt-3 fs-5">
                        
                <input type="submit" value="Opslaan" name="submit" class="btn btn-primary  ">
                <a href="{{route("admin.posts.index")}}" class="nav-link  ">Annuleren</a>
            </div>
            
            
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
        

</x-app-layout>