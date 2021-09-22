    <!-- success message -->
    @if (session()->has('successMessage'))
        <div style="text-align:center;" class="alert alert-success">
            {{ session()->get('successMessage') }}
        </div>
    @endif

    <!-- error message -->
    @if (session()->has('errorMessage'))
        <div style="text-align:center;" class="alert alert-danger">
            {{ session()->get('errorMessage') }}
        </div>
    @endif
