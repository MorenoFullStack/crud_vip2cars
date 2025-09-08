@if(session('success'))
    <div class="alert alert-success position-fixed top-10 end-0 m-3" style="z-index: 9999; max-width: 300px;" role="alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 4000);
    </script>
@endif