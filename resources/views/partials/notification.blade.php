<script src="{{"//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"}}"></script>
<link rel="stylesheet" href="{{"//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"}}">

<script>
    $(function (){
        @if(session()->has("success"))
        @if(session()->get("success") == 1)
        toastr.success("{{session()->get("msg")}}")
        @else
        toastr.warning("{{session()->get("msg")}}")
        @endif
        @endif
    })
</script>
