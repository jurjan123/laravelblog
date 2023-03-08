<x-app-layout>
    <div  class="mt-5 h-100 card shadow-sm my-5 lh-lg p-5 py-2 "><div  class="card-body"><div  class="col-12">
        <h1>project toevoegen</h1>
        <form action="{{route("projects.store")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">titel</label>
                <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Example input">
              </div>
            
            <div class="form-group mt-2">
              <label for="exampleFormControlTextarea1">beschrijving</label>
              <textarea class="form-control" id="editor" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
            <div class="d-flex mt-1  ">
                <input type="submit" name="submit" class="btn btn-primary my-2">
                <button type="submit" href="{{route("projects.index")}}" value="annuleren" class="btn btn-danger ms-2 my-2">annuleren</button>
            </div>
               
        </form>
        @include("includes.ckeditor")
       
    </div>
    
    </div>
</x-app-layout>