@extends('layouts.app')

@section('title', 'Sales Details')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Transactions</a></li>
        <li class="breadcrumb-item active">Transaction Details</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center">
                    <div>
                           <h6> Reference: <strong>{{ $sale->reference }}</strong> </h6>
                           <h6 style="margin-top: -25px; margin-left: 850px;"> Date: <strong>{{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</strong></h6>
                        </div>
                       
                      <!--  <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none" href="{{ route('sales.pdf', $sale->id) }}">
                            <i class="bi bi-printer"></i> Print
                        </a>
                        <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none" href="{{ route('sales.pdf', $sale->id) }}">
                            <i class="bi bi-save"></i> Save
                        </a> -->
                    </div>
                    <div class="card-body">
                        <!--<div class="row mb-3">
                            <div class=" col-sm-4 mb-3 mb-md-0" style="margin-left: 120px;">
                                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                                <div><strong>{{ settings()->company_name }}</strong></div>
                                <div>{{ settings()->company_address }}</div>
                                <div>Email: {{ settings()->company_email }}</div>
                                <div>Phone: {{ settings()->company_phone }}</div>
                            </div>
                           <div class="col-sm-4 mb-3 mb-md-0">
                                <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                                
                                <div>Date: <strong>{{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</strong></div>
                                <div>Reference:<strong> {{ $sale->reference }}</strong></div> -->
                              <!--  <div>
                                    Status: <strong>{{ $sale->status }}</strong>
                                </div> -->
                              <!--  <div>
                                    Payment Status: <strong>{{ $sale->payment_status }}</strong>
                                </div>
                            </div> -->

                        </div>

                       <div class="table-responsive-sm">
                       <livewire:product-cart :cartInstance="'sale'" :data="$sale"/>
                       <!-- <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Products</th>
                                                <th class="align-middle">Price</th>
                                                <th class="align-middle">Quantity</th>
                                                <th class="align-middle">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @php
                                            $totalSubtotal = 0;
                                            @endphp
                                            @foreach($sale->saleDetails as $item)
                                            @php
                                            $subtotal = $item->unit_price * $item->quantity;
                                            $totalSubtotal += $subtotal;
                                            @endphp
                                            <tr>
                                                <td class="align-middle">
                                                    {{ $item->product_name }} <br>
                                                    <span class="badge badge-success">
                                                        {{ $item->product_code }}
                                                    </span>
                                                </td>

                                                <td class="align-middle">{{ format_currency($item->unit_price) }}</td>

                                                <td class="align-middle">
                                                    {{ $item->quantity }}
                                                </td>

                                                <td class="align-middle">
                                                    {{ format_currency($subtotal) }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <hr> --> 

                                    <!-- Display the total subtotal -->
                
                        <div class="row">
                            <div class="col-lg-5 col-sm-5 ml-md-auto">
                                <table class="table">
                                    <tbody>
                                   <!-- <tr>
                                        <td class="left"><strong>Shipping</strong></td>
                                        <td class="right">{{ format_currency($sale->shipping_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Discount ({{ $sale->discount_percentage }}%)</strong></td>
                                        <td class="right">{{ format_currency($sale->discount_amount) }}</td>
                                    </tr> -->   
                                    <tr>
                                        <td class="left"><strong>Sub Total</strong></td>
                                        <td class="right">{{ format_currency($totalSubtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Total VAT (12%)</strong></td>
                                        <td class="right">₱1.12</td>
                                    </tr>
                                    <tr class="bg-primary">
                                        <td class="left"><strong>Grand Total</strong></td>
                                        <td class="right"><strong>{{ format_currency($sale->total_amount) }}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

