<style>
    #container {
                width: 1000px;
                margin: 20px auto;
            }
            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 400px;
            }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        var container = document.querySelector("#container")
        container.style.height = "1000px"
        .catch(error => {
            console.error(error);
        });
</script>

