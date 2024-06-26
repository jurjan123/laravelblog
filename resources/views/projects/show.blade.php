<x-guest-layout>
  <div class="row d-flex">
    <div class="offset-1 col-8">
      <div class="card h-100 w-80" >
        @if($project->image != "Monkey-Puppet.png")
        <img src="{{url("images/". $project->image)}}" class="card-img-top w-50" alt="...">
        @else
        <img src="{{url("images/".$project->image)}}" class="card-img-top w-50" alt="...">
        @endif
          <div class="card-body">
            <h5 class="card-title">{{$project->title}}</h5>
            <p class="card-text">{{$project->intro}}</p>
            <p class="card-text">{{$project->description}}</p>
            <p class="card-text">Datum: {{date("d/m/Y", strtotime($project->created_at))}} <br>Leden: @foreach($project->users as $user) {{$user->name}}, @endforeach</p>
            <a href="{{route("projects.index")}}"  class="btn btn-primary">Ga terug</a>
          </div>
        </div>
  </div>
  
  </div>
    
</x-guest-layout>