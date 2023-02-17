<x-app-layout>
    
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight " >
            {{ __('Dashboard') }}
            
        </h2>
    </x-slot>
    
    <div class="textarea">
        <form action="{{route("store")}}" method="post">
            @csrf
        
        <label for="title" name="title" id="title">title</label><br>
        <input type="text" name="title" /><br><br>
        <label for="w3review">description</label>

    <textarea id="w3review" name="description" rows="4" cols="50" placeholder="leave a description">
    </textarea>
    <br>
    <input type="submit" name="submit" value="submit" id="submitbtn">
    </form>
    </div>

   
</x-app-layout>