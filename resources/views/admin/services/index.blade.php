@extends('layouts.admin')

@section('admin_page')
    {{-- all services admin view --}}
    @isset($origin)
        <div class="p-4 mt-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Visa {{ $origin }} Types</h4>
                        <p class="card-description">Visa {{ $origin }}s Include:</p>

                        {{-- services data table --}}
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Service Name</th>
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
                                                <td> {{$item->charge}} </td>
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
