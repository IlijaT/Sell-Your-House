@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title')}}",
            text: "{{ session('flash_message.message')}}",
            icon: "{{ session('flash_message.icon')}}",
            error: 1500,
            showConfirmButton: false
        });
    </script>
@endif

@if(session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{ session('flash_message_overlay.title')}}",
            text: "{{ session('flash_message_overlay.message')}}",
            icon: "{{ session('flash_message_overlay.icon')}}",
            button: 'OK'
        });
    </script>
@endif