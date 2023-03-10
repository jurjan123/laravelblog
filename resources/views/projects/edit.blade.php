<x-app-layout>
    <div class="row">
        <div class="container">
            <h1>Projecten bewerken</h1>
        
        <div class="card p-3 md-9">
            <form action="/projects/{{$id}}" method="post">
                @method("PUT")
                @csrf

                <div class="mb-3 ">

                    <div class="input-group mb-3">
                        <label for="exampleFormControlTextarea1" name="title"  class="form-label">Titel</label><br><br>
                        <input type="text" value={{$title}}  name="title" class="form-control ml-5 mt-4 w-100 position-absolute" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                    <label for="exampleFormControlTextarea1" name="description"  class="form-label">Beschrijving</label>
                    <textarea class="form-control" value="" name="description" id="editor" id="exampleFormControlTextarea1" rows="3">{{$description}}{{str_repeat("<br>", 15)}}</textarea>
                    </div>
                <input type="submit" value="opslaan" name="submit" class="btn btn-primary">
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
        

</x-app-layout>