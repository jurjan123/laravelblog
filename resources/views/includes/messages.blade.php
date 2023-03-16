<div id="message">
    @if(session()->has("message"))
    <!-- Success Alert -->
    <div class="alert alert-success fade show col-md-3">
        <strong>{{session()->get("message")}}</strong>
        <button  type="button" class="btn-close offset-2" data-bs-dismiss="alert"></button>
    </div>
    @endif
</div>

<div  id="message">
    @if(session()->has("deletemessage"))
    <!-- Success Alert -->
    <div class="alert alert-info fade show col-md-3">
        <strong>{{session()->get("deletemessage")}}</strong>
        <button  type="button" class="btn-close offset-2" data-bs-dismiss="alert"></button>
    </div>
    @endif
</div>

<div class=" " id="message">
    @if(session()->has("editmessage"))
    <!-- Success Alert -->
    <div class="alert alert-info fade show col-md-4">
        <strong>{{session()->get("editmessage")}}</strong>
        <button  type="button" class="btn-close offset-2" data-bs-dismiss="alert"></button>
    </div>
    @endif
</div>



<div  id="message">
    @if(session()->has("errormessage"))
    <!-- Success Alert -->
    <div class="alert alert-danger fade show col-md-3">
        <strong>{{session()->get("errormessage")}}</strong>
        <button  type="button" class="btn-close offset-2" data-bs-dismiss="alert"></button>
    </div>
    @endif
</div>





