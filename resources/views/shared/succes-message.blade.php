@if(session()->has('Success'))
    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('Success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    setTimeout(function() {
        document.getElementById('success-message').remove();
    }, 3000); // Adjust the value in milliseconds for desired delay
</script>
