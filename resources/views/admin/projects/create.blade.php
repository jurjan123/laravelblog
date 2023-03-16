<x-app-layout>
    <head>
        <script>
            $(function(){
                $("#datepicker").datepicker();
                $("#format").on("#change", function(){
                    $("#datepicker").datepicker("option", "dateFormat", $(this).val());
                });
            });
        </script>
    </head>
    <div class="row">
        <div class="container ">
            <h1>Nieuw project toevoegen</h1>
        
        <div class="card p-3 m-9 mt-5">
           
            <form action="{{route("projects.store")}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 ">

                    <div class="input-group mb-3  py-2 ">
                        <label for="exampleFormControlTextarea1" name="title"  class="form-label">Titel</label><br><br>
                        <input type="text"  name="title" class="form-control ml-5 mt-4 w-100 position-absolute" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    @error("title")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <x-input-label for="image" :value="__('change image')" />
                    <x-text-input id="image" name="image" placeholder="change image" type="file" class="mt-1 block w-full"   autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    @error("image")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                    <input type="datetime-local" class="form-control mt-3"
                            name="created_at" step="any">
                   
                    <label for="exampleFormControlTextarea1" name="description"  class="form-label">Beschrijving</label>
                    <textarea class="form-control" id="editor" name="description" id="exampleFormControlTextarea1" id="container" rows="20"></textarea>
                    </div>
                    @error("description")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    
                <input type="submit" value="Opslaan" name="submit" class="btn btn-primary">
            </form>
            @include("includes.ckeditor")
        </div>    
    </div>
    </div>
    
        

</x-app-layout>

<!--<p>Date: <input type="text" id="datepicker" size="30"></p>

<p>Format options:<br>
    <select id="format">
        <option value="mm/dd/yy">Default - mm/dd/yy</option>
        <option value="yy-mm-dd">ISO 8601 - yy/mm/dd</option>
        <option value="d M, y">Short - d M, y</option>
        <option value="d MM, y">Medium - d MM, y</option>
        <option value="DD, d MM, yy">Full - DD, d, MM, yy</option>
        <option value="&apos;day&apos; d &apos; MM &apos;in the year&apos; yy">Default - mm/dd/yy</option>
    </select>
</p>-->
