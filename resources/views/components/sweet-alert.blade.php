<script>
    @if(session()->has('swal-message'))
    document.addEventListener("DOMContentLoaded", function(){
        window.dispatchEvent(new CustomEvent('swal-message', {
            detail: {
                @if(session()->exists('swal-message.type')) type: '{!! session('swal-message.type') !!}', @endif
                    @if(session()->exists('swal-message.title')) title: '{!! session('swal-message.title') !!}', @endif
                    @if(session()->exists('swal-message.text')) text: '{!! session('swal-message.text') !!}', @endif
                confirmText: '{!! session('swal-message.confirmText') !!}',
                confirmRoute: '{!! session('swal-message.confirmRoute') !!}',
                cancelText: '{!! session('swal-message.cancelText') !!}',
            }
        }));
    });
    @endif
    @if(session()->has('swal-toast'))
    document.addEventListener("DOMContentLoaded", function(){
        window.dispatchEvent(new CustomEvent('swal-toast', {
            detail: {
                @if(session()->exists('swal-toast.type')) type: '{!! session('swal-toast.type') !!}', @endif
                    @if(session()->exists('swal-toast.title')) title: '{!! session('swal-toast.title') !!}', @endif
                    @if(session()->exists('swal-toast.text')) text: '{!! session('swal-toast.text') !!}', @endif
                    @if(session()->exists('swal-toast.reload')) reload: {{ session('swal-toast.reload') }}, @endif
            }
        }));
    });
    @endif
</script>
