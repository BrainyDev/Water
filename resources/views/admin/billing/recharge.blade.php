@extends('layouts.admin')

@section('admin_page')
    @php
        $origin = 'Billing';
    @endphp

    @isset($origin)
        {{-- create service post form --}}
        <form
            action="{{ route('createDataRows', ['origin' => $origin]) }}"
            method="post">

            {{-- security token --}}
            @csrf
            {{-- end security token --}}


            {{-- form component --}}
            <div class="p-4 mt-4 mb-4">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recharge meter</h4>
                            <p class="card-description"> </p>
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

                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1">Company Name</label>
                                    <input name="CompanyName" value="{{ old('name') }}" type="text" class="form-control"
                                        id="exampleInputName1" placeholder="CompanyName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">User Name</label>
                                    <input name="UserName" value="{{ old('UserName') }}" type="text" class="form-control"
                                        id="exampleInputName1" placeholder="UserName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">PassWord</label>
                                    <input name="PassWord" value="{{ old('PassWord') }}" type="text" class="form-control"
                                        id="exampleInputName1" placeholder="PassWord">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Meter Number</label>
                                    <input name="MeterID" value="{{ old('MeterID') }}" type="text" class="form-control"
                                        id="exampleInputName1" placeholder="Meter Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Amount</label>
                                    <input name="Amount" value="{{ old('Amount') }}" type="number" class="form-control"
                                        id="exampleInputName1" placeholder="Amount">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- end create post form --}}
    @endisset
@endsection
