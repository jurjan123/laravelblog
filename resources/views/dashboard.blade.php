<x-app-layout>
    
        <div class="row pt-5 pb-4">
            <div class="col-md-6">
                <h1>Gebruikers</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 card">
                    <table class="table  ">
                        <thead>
                        <tr>
                            
                            <th class="py-2 px-3 border-b">Gebruikersnaam</th>
                            <th class="py-2 px-3 border-b">Email</th>
                            <th class="py-2 px-3 border-b">Wachtwoord</th>
                            <th class="py-2 px-3 border-b">Opties</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                                
                        </tbody>
                       
                    </table>
                    
                </div>
            </div>
        </div>
    
        {{Auth::user()->password}}
        
  

</x-app-layout>
