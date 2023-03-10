<x-app-layout>
    <div  class="mt-5 h-70 card shadow-sm my-5 lh-lg p-5 py-2 "><div  class="card-body"><div  class="col-12">
        <h1>Project toevoegen</h1>
        <form action="{{route("projects.store")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Titel</label>
                <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Example input">
              </div>
            
            <div class="form-group mt-2">
              <label for="exampleFormControlTextarea1">Beschrijving</label>
              <textarea class="form-control" id="editor" name="description" id="exampleFormControlTextarea1" rows="3">{{str_repeat("<br>", 5)}}</textarea>
            </div>
            
            <div class="d-flex mt-1  ">
                <input type="submit" value="opslaan" name="submit" class="btn btn-primary my-2">
                <button type="submit" href="{{route("projects.index")}}" value="annuleren" class="btn btn-danger ms-2 my-2">annuleren</button>
            </div>
               
        </form>
        @include("includes.ckeditor")
       
    </div>
    
    </div>
</x-app-layout>