<x-app-layout>
    <div class="row">
        <div class="container ">
            <h1>Nieuwe post toevoegen</h1>
        
        <div class="card p-3 m-9">
            @include("includes.ckeditor")
            <form action="{{route("posts.store")}}" method="post">
                @csrf

                <div class="mb-3">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">title</span>
                        <input type="text"  name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                    <label for="exampleFormControlTextarea1" name="description" id="editor" class="form-label">description</label>
                    <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
    
        

</x-app-layout>