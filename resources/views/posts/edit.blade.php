<x-app-layout>
    
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight " >
            {{ __('Dashboard') }}
            
        </h2>
    </x-slot>
    
    <div class="textarea">
        <form action="{{route("edit")}}" method="post">
            @csrf
        
        <label for="title" name="title" id="title">title</label>
        <input type="text" name="title" />
        <label for="w3review">description</label>

    <textarea id="w3review" name="description" rows="4" cols="50" placeholder="leave a description">
    </textarea>
    
    <input type="submit" name="submit" value="submit">
    </form>
    </div>

   
</x-app-layout>