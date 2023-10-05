@extends('layouts.admin')

@section('admin_page')
    @php
        $origin = 'Service';
    @endphp

    @isset($origin)
        {{-- create service post form --}}
        <form action="{{ route('createDataRows', ['origin' => $origin]) }}" method="post">

            {{-- security token --}}
            @csrf
            {{-- end security token --}}


            {{-- form component --}}
            <div class="p-4 mt-4 mb-4">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create {{ $origin }} Types</h4>
                            <p class="card-description"> Create {{ $origin }} </p>
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
                                    <label for="exampleInputName1">Service Type Name</label>
                                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="exampleInputName1"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Service Charge in (Kes)</label>
                                    <input name="charge" value="{{old('charge')}}" type="number" class="form-control" id="exampleInputName1"
                                        placeholder="Charges">
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
