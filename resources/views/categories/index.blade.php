<x-guest-layout>
  @if(Session::has("emptymessage"))
  <h1>{{(Session("emptymessage"))}}</h1>
  @else
    <h1>Categories</h1>
     <div class="row gy-4">
         @foreach($categories as $category)
         <div class="col-4">
             <div class="card h-100">
               @if($category->image != "Monkey-Puppet.png")
                 <img src="{{url("images/".$category->image)}}" class="card-img-top w-100" alt="...">
               @else
               <img src="{{url("images/".$category->image)}}" class="card-img-top w-100" alt="...">
               @endif
                 
               <div class="card-body">
                   <h5 class="card-title">{{$category->name}}</h5>
                   <p class="card-text">{{$category->tag}}</p>
                   <a href="{{route("categories.show", $category->id)}}" class="btn btn-primary">Bekijk categorie</a>
                 </div>
               </div>
         </div>
         @endforeach
         @endif
     </div>
     {{$categories->links()}}
    
 </x-guest-layout>
 