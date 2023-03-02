<x-app-layout>
    <div class="row">
        <div class="container">
            <h1>post bewerken</h1>
            
        <div class="card p-3 md-9">
            <form action="/posts/{{$id}}" method="post">
                @method("PUT")
                @csrf

                <div class="mb-3">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">title</span>
                        <input type="text" value="{{($title)}}" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                    <label for="exampleFormControlTextarea1" name="description" class="form-label">description</label>
                    <textarea class="form-control" value="" name="description" id="exampleFormControlTextarea1" rows="3">{{$description}}</textarea>
                    </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
        </div>    
    </div>
    </div>
        

</x-app-layout>