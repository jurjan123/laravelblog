<x-guest-layout>
    <div class="row gy-4 w-100"> <div class="col-10">
        <h1>Projecten</h1>
      </div>
      @foreach($userProjects as $user)
      @foreach($user->projects as $project)
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
          @endforeach
      </div>
      {{$userProjects->links()}}

</x-guest-layout>
