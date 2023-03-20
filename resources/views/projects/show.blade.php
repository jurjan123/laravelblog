<x-guest-layout>
    <div class="offset-1 col-8">
        <div class="card h-100 w-80" >
            <img src="{{url("images/". $project->image)}}" class="card-img-top h-100 w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$project->title}}</h5>
              <p class="card-text">{{$project->intro}}</p>
              <p class="card-text">{{$project->description}}</p>
              <p class="card-text">Datum: {{substr($project->created_at, 0,10)}} <br>Auteur: {{$project->User->name}}</p>
              <a href="{{route("projects.index")}}"  class="btn btn-primary">Ga terug</a>
            </div>
          </div>
    </div>
    
</x-guest-layout>