@extends('layouts.app')

@section('title', 'Adjustment Details')

@push('page_css')
    @livewireStyles
@endpush

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('adjustments.index') }}">Inventory</a></li>
        <li class="breadcrumb-item active">Inventory Details</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>                                 
                                    <th colspan="2">
                                        Reference:  {{ $adjustment->reference }}
                                        <span style="margin-left: 670px;">
                                        Date: {{ $adjustment->date }}
                                        </span>
                                    </th>
                                  
                                </tr>
                               

                                <tr>
                                    <th>Additional Products</th>
                                  <!--  <th>Code</th> -->
                                    <th>Additional Stock</th>
                                  <!--  <th>Type</th> -->
                                </tr>

                                @foreach($adjustment->adjustedProducts as $adjustedProduct)
                                    <tr>
                                        <td><strong>Name:</strong> {{ $adjustedProduct->product->product_name }}</td>
                                       <!-- <td>{{ $adjustedProduct->product->product_code }}</td> -->
                                        <td><strong>Quantity:</strong> {{ $adjustedProduct->quantity }} {{ $adjustedProduct->product->product_unit }}</td>
                                      <!--  <td>
                                            @if($adjustedProduct->type == 'add')
                                                (+) Addition
                                            @else
                                                (-) Subtraction
                                            @endif
                                        </td> -->
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
