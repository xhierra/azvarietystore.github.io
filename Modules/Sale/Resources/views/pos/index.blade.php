@extends('layouts.app')

@section('title', 'POS')

@section('third_party_stylesheets')

@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
      <!--  <li class="breadcrumb-item"><a href="{{ route('app.pos.index') }}">Home</a></li>
        <li class="breadcrumb-item active">Cashier</li> 

      <!--  @can('create_pos_sales')
           @php
                $allowedEmails = ['cashier@test.com', 'cashier@gmail.com']; 
                $userEmail = auth()->user()->email;
            @endphp

            @if(in_array($userEmail, $allowedEmails))
            <li class="c-header-nav-item mr-3" style="margin-left: 860px; position: absolute; margin-top: -5px;">
                    <a class="btn btn-primary {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}" href="{{ route('app.pos.index') }}">
                        <i class="bi bi-cart mr-1"></i> Cashier
                    </a>
                </li>

                <li class="c-header-nav-item mr-3" style="margin-left: 960px; position: absolute; margin-top: -5px;">
                    <a class="btn btn-primary {{ request()->routeIs('sales.index') ? 'disabled' : '' }}" href="{{ route('sales.index') }}">
                    <i class="bi bi-journals"></i> Transactions
                    </a>
                </li>
                
                <li class="c-header-nav-item mr-3" style="margin-left: 1087px; position: absolute; margin-top: -5px;">
                    <a class="btn btn-primary {{ request()->routeIs('sales-report.index') ? 'disabled' : '' }}" href="{{ route('sales-report.index') }}">
                    <i class="bi bi-clipboard-data"></i>  Sales Report
                    </a>
                </li>   
                
            @endif
        @endcan    -->
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('utils.alerts')
            </div>
            <div class="col-lg-7">
                <livewire:search-product/>
                <livewire:pos.product-list :categories="$product_categories"/>
            </div>
            <div class="col-lg-5">
                <livewire:pos.checkout :cart-instance="'sale'" :customers="$customers"/>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            window.addEventListener('showCheckoutModal', event => {
                $('#checkoutModal').modal('show');

                $('#paid_amount').maskMoney({
                    prefix:'{{ settings()->currency->symbol }}',
                    thousands:'{{ settings()->currency->thousand_separator }}',
                    decimal:'{{ settings()->currency->decimal_separator }}',
                    allowZero: false,
                });

                $('#total_amount').maskMoney({
                    prefix:'{{ settings()->currency->symbol }}',
                    thousands:'{{ settings()->currency->thousand_separator }}',
                    decimal:'{{ settings()->currency->decimal_separator }}',
                    allowZero: true,
                });

                $('#paid_amount').maskMoney('mask');
                $('#total_amount').maskMoney('mask');

                $('#checkout-form').submit(function () {
                    var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                    $('#paid_amount').val(paid_amount);
                    var total_amount = $('#total_amount').maskMoney('unmasked')[0];
                    $('#total_amount').val(total_amount);
                });
            });
        });
    </script>

@endpush
