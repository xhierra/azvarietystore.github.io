@extends('layouts.app')

@section('title', 'Sales Report')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Sales Report</li>

    <!--    @can('create_pos_sales')
           @php
                $allowedEmails = ['cashier@test.com', 'cashier@gmail.com']; 
                $userEmail = auth()->user()->email;
            @endphp

            @if(in_array($userEmail, $allowedEmails))
            <li class="c-header-nav-item mr-3" style="margin-left: 760px;">
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
        <livewire:reports.sales-report :customers="\Modules\People\Entities\Customer::all()"/>
        
    </div>
@endsection
