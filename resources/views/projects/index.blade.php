<x-guest-layout>
    <h1>Projects</h1>
    <div class="row gy-4 w-100">
        @foreach($projects as $project)
        <div class="col-4  w-30">
            <div class="card h-100">
                <img src="{{url("images/". $project->image)}}" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$project->title}}</h5>
                  <p class="card-text">{{$project->intro}}</p>
                  <p class="card-text">Datum: {{$project->created_at}} <br>Auteur: {{$project->User->name}}</p>
                  <a href="{{route("projects.show", $project->id)}}" class="btn btn-primary">bekijk project</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    {{$projects->links()}}
</x-guest-layout>