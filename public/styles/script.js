
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

function updateQuantity(productId, selectElement) {
    fetch('/cart/update/' + productId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            // Add this to make sure Laravel handles the request as AJAX
            'X-Requested-With': 'XMLHttpRequest', 
            // Add the CSRF token, Laravel needs this for POST requests
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            quantity: selectElement.value
        })
    })
    .then(response => location.reload())
    .catch(error => console.error('Error:', error));
}

    
var productimage = document.getElementById("productimage")
var defaultimage = document.getElementById("defaultimage")

productimage.addEventListener("mouseover", function(){
    console.log("clicked")
})

defaultimage.addEventListener("mouseover", function(){
    console.log("clicked")
})

