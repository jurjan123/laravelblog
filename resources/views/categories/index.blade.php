<x-guest-layout>
  @if(Session::has("emptymessage"))
  <h1>{{(Session("emptymessage"))}}</h1>
  @else

  <div class="row gy-4 w-100"> <div class="col-10">
    <h1 class="mt-3">Categories</h1>
  </div>
  <div class="col-2 mt-5">
    <select class="form-select " onchange="location = this.value"  aria-label="Default select example" name="category_id">
      <option value="/admin/posts" selected> sorteer op </option>
      <option value="/admin/posts" selected> Naam A-Z </option>
      <option value="/admin/posts" selected> Naam Z-A </option>
      <option value="/admin/posts" selected> Datum aflopend </option>
  </select>
  </div>
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
 