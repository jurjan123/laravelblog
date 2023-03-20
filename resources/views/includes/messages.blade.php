
    @if(session()->has("message"))
    <!-- Success Alert -->
    <div class="alert alert-success fade show">
        <strong>{{session()->get("message")}}</strong>
        <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
    </div>
    @endif

    
    @if(session()->has("deletemessage"))
    <!-- Success Alert -->
    <div class="alert alert-danger fade show ">
        <strong>{{session()->get("deletemessage")}}</strong>
        <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
    </div>
    @endif


    @if(session()->has("editmessage"))
    <!-- Success Alert -->
    <div class="alert alert-info fade show ">
        <strong>{{session()->get("editmessage")}}</strong>
        <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
    </div>
    @endif


    @if(session()->has("errormessage"))
    <!-- Success Alert -->
    <div class="alert alert-danger fade show col-md-3">
        <strong>{{session()->get("errormessage")}}</strong>
        <button  type="button" class="btn-close " data-bs-dismiss="alert"></button>
    </div>
    @endif






