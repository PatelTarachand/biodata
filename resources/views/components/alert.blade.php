@if(session()->has('success'))
    <script>
        alertify.set('notifier','position', 'top-right');
        alertify.success("{{ session('success') }}");
    </script>
@endif

@if(session()->has('error'))
    <script>
        alertify.set('notifier','position', 'top-right');
        alertify.error("{{ session('error') }}");
    </script>
@endif
