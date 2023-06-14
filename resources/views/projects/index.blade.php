<x-guest-layout>
  @if(!empty($message) )
  <h1>{{$message}}</h1>
  @else
  <div class="row w-100">
     <div class="col-10">
      <h1 class="mt-3">Projecten</h1>
    </div>
    <div class="col-2 mt-3">
      <select class="form-select " onchange="location = this.value"  aria-label="Default select example" name="category_id">
        <option value="/admin/posts" selected> sorteer op </option>
        <option value="/admin/posts" selected> Naam A-Z </option>
        <option value="/admin/posts" selected> Naam Z-A </option>
        <option value="/admin/posts" selected> Datum aflopend </option>
    </select>
    </div>
  </div>
    <div class="row gy-4 w-100">
      @foreach($projects as $project)
      
        <div class="col-4  w-30">
            <div class="card h-100">
              @if($project->image != "Monkey-Puppet.png")
              <img src="{{url("images/". $project->image)}}" class="card-img-top w-100" alt="...">
              @else
              <img src="{{url("images/".$project->image)}}" class="card-img-top w-100" alt="...">
              @endif

                <div class="card-body">
                  <h5 class="card-title">{{$project->title}}</h5>
                  <p class="card-text">{{$project->intro}}  </p>
                  <p class="card-text">Datum: {{date("d/m/Y", strtotime($project->created_at))}} <br>leden: @foreach($project->users as $user){{$user->name}}, @endforeach</p>
                  <a href="{{route("projects.show", $project->id)}}" class="btn btn-primary">Bekijk project</a>
                  
                </div>
              </div>
        </div>


       
        @endforeach
        @endif
    </div>
    {{$projects->links()}}
</x-guest-layout>