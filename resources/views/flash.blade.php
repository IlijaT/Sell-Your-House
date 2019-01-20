@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title')}}",
            text: "{{ session('flash_message.message')}}",
            icon: "{{ session('flash_message.icon')}}",
            timer: 1700,
            buttons: false,
        });
    </script>
@endif

@if(session()->has('flash_overlay_message'))
    <script>
        swal({
            title: "{{ session('flash_overlay_message.title')}}",
            text: "{{ session('flash_overlay_message.message')}}",
            icon: "{{ session('flash_overlay_message.icon')}}",
            button: "OK",
        });
    </script>
@endif