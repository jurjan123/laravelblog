<div class="card  fs-5">
  
  <ul class="list-group list-group-flush">
    @if(Route::is("users.projects.page") || Route::is("users.projects.view") )
    <li class="list-group-item"><a class="nav-link active">Menu</a></li>
    <li class="list-group-item"><a class="nav-link active" href="{{route("users.projects.page")}}">Mijn projectentabel</a></li>
    <li class="list-group-item"><a class="nav-link active" href="{{route("users.projects.view")}}">Mijn projectenoverzicht</a></li>
    @else
    <li class="list-group-item"><a class="nav-link disabled">Menu</a></li>
    <li class="list-group-item"><a class="nav-link" href="{{route("admin.categories.index")}}">Categorieen</a></li>
    <li class="list-group-item"><a class="nav-link" href="{{route("admin.posts.index")}}">Posts</a></li>
    <li class=" list-group-item "><a class="nav-link" href="{{route("users.index")}}">Gebruikers</a></li>
    <li class="list-group-item"><a class="nav-link" href="{{route("admin.projects.index")}}">Projecten</a></li>
    <li class="list-group-item"><a class="nav-link" aria-current="page" href="{{route("admin.roles.index")}}">Rollen</a></li>
    <li class="list-group-item"><a class="nav-link" aria-current="page" href="{{route("admin.tasks.index")}}">Taken</a></li>
    <li class="list-group-item"><a class="nav-link" aria-current="page" href="{{route("admin.statuses.index")}}">Status</a></li>
    @endif
  </ul>
</div>


