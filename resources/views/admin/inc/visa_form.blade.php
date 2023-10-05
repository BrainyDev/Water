<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
<style>
    .input {
        background-color: white;
    }
</style>

<body style="background-color: white">
    {{-- alert messages --}}
    @include('admin.inc.alerts')
    {{-- end alert messages --}}
    <div class="col-12 grid-margin" style="background-color: white; color:white;">
        <div class="card" style="background-color: white; color:white;">
            {{-- error component --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- error component --}}
            <div class="card-body">
                <form class="form-sample" action="{{ route('createDataRows', ['origin' => $origin]) }}" method="POST">
                    {{-- security token --}}
                    @csrf
                    {{-- end security token --}}
                    <p class="card-description"> Personal info </p>

                    {{-- name && phone number --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone number</label>
                                <div class="col-sm-9">
                                    <input name="phone_number" type="text" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- email && arrival date --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input name="email" type="email" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Arrival Date</label>
                                <div class="col-sm-9">
                                    <input name="date" type="datetime-local" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- home address && country --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Home Address</label>
                                <div class="col-sm-9">
                                    <input name="address" type="text" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <input name="country" type="text" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description"> Additional Details </p>

                    {{-- adults && kids --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">How Many Adults Are Travelling, Including
                                    you?</label>
                                <div class="col-sm-9">
                                    <input name="adults" type="number" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> How Many Kids are travelling aged 0 -16?</label>
                                <div class="col-sm-9">
                                    <input name="kids" type="number" class="form-control"
                                        style="background-color: white;" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- service type --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Visa Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="service_id" style="background-color: white;">
                                        @if (count($types) > 0)
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        @else
                                            No data recorded
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- action --}}
                    <div class="text-center">
                        <button type="submit" class="btn sm-btn mt-4 mb-4 btn-success">
                            Proceed
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
