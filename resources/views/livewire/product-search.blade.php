<div class="container mx-auto py-16 px-8">
    <div class="mb-4">
        <input type="text" wire:model.lazy="search" placeholder="Search for posts">
    </div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">ID</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Image</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Title</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td class="py-2 px-3 border-b">{{$post->id}}</td>
                <td class="py-2 px-3 border-b">{{$post->description}}</td>
                <td class="py-2 px-3 border-b">{{$post->title}}</td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>