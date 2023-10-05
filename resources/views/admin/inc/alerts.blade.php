{{-- success component --}}
@if (Session::has('success-message'))
    <div class="alert alert-success">
        {{ Session::get('success-message') }}
    </div>
@endif
{{-- success component --}}

{{-- info component --}}
@if (Session::has('info-message'))
    <div class="alert alert-info">
        {{ Session::get('info-message') }}
    </div>
@endif
{{-- info component --}}

{{-- warning component --}}
@if (Session::has('warning-message'))
    <div class="alert alert-warning">
        {{ Session::get('warning-message') }}
    </div>
@endif
{{-- warning component --}}

{{-- danger component --}}
@if (Session::has('danger-message'))
    <div class="alert alert-danger">
        {{ Session::get('danger-message') }}
    </div>
@endif
{{-- danger component --}}
