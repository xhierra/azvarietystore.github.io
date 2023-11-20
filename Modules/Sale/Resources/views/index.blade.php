@extends('layouts.app')

@section('title', 'Transaction')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('app.pos.index') }}">Home</a></li>
        <li class="breadcrumb-item active">Transactions</li>
   <!--   @can('create_pos_sales')
           @php
                $allowedEmails = ['cashier@test.com', 'cashier@gmail.com']; 
                $userEmail = auth()->user()->email;
            @endphp

            @if(in_array($userEmail, $allowedEmails))
            <li class="c-header-nav-item mr-3" style="margin-left: 790px;">
                    <a class="btn btn-primary {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}" href="{{ route('app.pos.index') }}">
                        <i class="bi bi-cart mr-1"></i> Cashier
                    </a>
                </li>

                <li class="c-header-nav-item mr-3">
                    <a class="btn btn-primary {{ request()->routeIs('sales.index') ? 'disabled' : '' }}" href="{{ route('sales.index') }}">
                    <i class="bi bi-journals"></i> Transactions
                    </a>
                </li>
                
                <li class="c-header-nav-item mr-3">
                    <a class="btn btn-primary {{ request()->routeIs('sales-report.index') ? 'disabled' : '' }}" href="{{ route('sales-report.index') }}">
                    <i class="bi bi-clipboard-data"></i>  Sales Report
                    </a>
                </li>   
                
            @endif
        @endcan  -->
    </ol>
    

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!--<a href="{{ route('sales.create') }}" class="btn btn-primary">
                            Add Sale <i class="bi bi-plus"></i>
                        </a> -->
                        <h1 style="text-align: center; margin-top: -1px; text-shadow: 2px 2px violet; font-family: 'Times New Roman', serif;"> TRANSACTION HISTORY </h1>
                        <hr>
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush
