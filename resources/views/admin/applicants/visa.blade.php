@extends('layouts.admin')

@section('admin_page')
    {{-- all services admin view --}}
    @isset($origin)
        <div class="p-4 mt-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Visa Applications</h4>
                        <p class="card-description">Visa Applications Include:</p>

                        {{-- services data table --}}
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Client Name</th>
                                        <th> Phone Number</th>
                                        <th>Email</th>
                                        <th> Address</th>
                                        <th> Country</th>
                                        <th> Adults</th>
                                        <th>Kids</th>
                                        <th>Arrival</th>
                                        <th> Visa Type</th>
                                        <th> Charges in (Kes) </th>
                                        <th> Created </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($datas) > 0)
                                        @foreach ($datas as $key=>$item)
                                            <tr>
                                                <td> {{$key++}} </td>
                                                <td> {{$item->name}} </td>
                                                <td> {{$item->phone_number}} </td>
                                                <td> {{$item->email}} </td>
                                                <td> {{$item->home_address}} </td>
                                                <td> {{$item->country}} </td>
                                                <td> {{$item->adults}} </td>
                                                <td>{{$item->kids}}</td>
                                                <td>{{$item->arrival_time}}</td>
                                                <td>{{$item->services->id}}</td>
                                                @php
                                                    $charge = intval($item->services->charge);
                                                    $number = intval($item->adults) + intval($item->kids);
                                                    $charges = $charge * $number;
                                                @endphp
                                                <td> {{$charges}} </td>
                                                <td> {{$item->created_at->diffForHumans()}} </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        Opps!! No record found.
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- end services data table --}}

                    </div>
                </div>
            </div>
        </div>
    @endisset
    {{-- end all services admin view --}}
@endsection
