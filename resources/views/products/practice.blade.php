<x-guest-layout>

<div class="container g-0">
    <div class="py-3 text-left">
      <h2>Bezorggegevens</h2>
    </div>
  
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center ">
          <span class="text-muted">Je winkelwagen</span>
        </h4>
        <ul class="list-group mb-3">
          <!-- Loop through cart items -->
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Overzicht</h6>
             
            </div>
            
          </li>
          <!-- Total amount -->
          <li class="list-group-item d-flex justify-content-between">
            <span>Artikelen:</span>
            <strong>5</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Subtotal</span>
            <strong>40,00</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>BTW</span>
            <strong>21%</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Totaal</span>
            <strong>48.40</strong>
          </li>
          
            <button class="btn btn-primary btn-lg" type="submit">Verder naar bestellen</button>
         
          
        </ul>
      </div>
      <div class="col-md-8 mt-2 card p-3 lh-lg order-md-1">
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Voornaam</label>
              <input type="text" class="form-control" id="firstName" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Achternaam</label>
              <input type="text" class="form-control" id="lastName" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Straat</label>
                <input type="text" class="form-control" id="lastName" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Huisnummer</label>
                <input type="text" class="form-control" id="lastName" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Postcode</label>
                <input type="text" class="form-control" id="lastName" required>
              </div>
            
              <div class="col-md-6 mb-3">
                <label for="lastName">Plaats</label>
                <input type="text" class="form-control" id="lastName" required>
              </div>
            
          <!-- Other form fields... -->
  
        </form>
      </div>
    </div>
  </div>

</x-guest-layout>