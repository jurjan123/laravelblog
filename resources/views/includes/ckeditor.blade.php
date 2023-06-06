<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 400px;
    }

</style>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


<!-- DIT IS CKEDITOR -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        var container = document.querySelector("#container")
       
        .catch(error => {
            console.error(error);
        });
</script>

<!-- DIT IS SELECT2 -->
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<!-- DIT IS VOOR EEN ANDER FACTUURADRES -->

