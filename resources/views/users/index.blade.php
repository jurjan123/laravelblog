<x-app-layout>
    
    <div class="row pt-5 pb-4">
        <div class="col-md-6">
            <h1>Gebruikers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 card">
                <table class="table ">
                    <thead>
                    <tr>
                        <th class="py-2 px-3 border-b">ID</th>
                        <th class="py-2 px-3 border-b">email</th>
                        <th class="py-2 px-3 border-b">wachtwoord</th>
                        <th class="py-2 px-3 border-b">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="py-2 px-3 border-b">{{$user->id}} </td>
                            <td class="py-2 px-3 border-b">{{$user->email}} </td>
                            <td class="py-2 px-3 border-b">{{$user->password}}</td>

                            <td class=" d-flex px-3 border-b py-2" style="gap:5px"><form action="{{route("admin.delete", $user)}}" method="post">@csrf<button type="submit" class="btn btn-danger" role="button">delete</button></form>
                                <form action="{{route("admin.edit", $user)}}" method="post">@csrf<button type="submit" class="btn btn-info" role="button">edit</button></form>
                            </td>
                        @endforeach
                            
                    </tbody>
                   
                </table>
                
            </div>
        </div>
    </div>

    {{Auth::user()->password}}
    
</x-app-layout>