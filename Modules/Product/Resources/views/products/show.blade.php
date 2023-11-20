@extends('layouts.app')

@section('title', 'Product Details')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mb-1">
            <div class="col-md-10">
               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="table-responsive">
                        <a href="{{ route('adjustments.create') }}" class="btn btn-primary" style="margin-left: 85%; margin-bottom: 10px;">
                           Add New Stock <i class="bi bi-plus"></i>
                         </a>
                            <table class="table table-bordered table-striped mb-0">
                                  
                               <tr>
                                    <th>Product Name</th>
                                    <td>{{ $product->product_name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Code</th>
                                    <td>{{ $product->product_code }}</td>
                                </tr>
                                <tr>
                                    <th>Expiration Date</th>
                                    <td>{{ $product->product_barcode_symbology }}</td>
                                </tr>
                                
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $product->category->category_name }}</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{ $product->product_quantity . ' ' . $product->product_unit }}</td>
                                </tr>
                                <tr>
                                    <th>Stock Alert</th>
                                    <td>{{ $product->product_stock_alert . ' ' . $product->product_unit  }}</td>
                                </tr>
                                <tr>
                                    <th>Retail Price</th>
                                    <td>{{ format_currency($product->product_cost) }}</td>
                                </tr>
                                <tr>
                                    <th>Selling Price</th>
                                    <td>{{ format_currency($product->product_price) }}</td>
                                </tr>
                               
                                <tr>
                                    <th>Stock Worth</th>
                                    <td>
                                        Retail Price:: {{ format_currency($product->product_cost * $product->product_quantity) }} /
                                        Selling Price:: {{ format_currency($product->product_price * $product->product_quantity) }}
                                    </td>
                                </tr>
                               
                              <!--  <tr>
                                    <th>Tax (%)</th>
                                    <td>{{ $product->product_order_tax ?? 'N/A' }}</td>
                                </tr> -->
                                <tr>
                                    <th>Section Number</th>
                                    <td>
                                            @if($product->product_tax_type == 1)
                                            Section 1
                                            @elseif($product->product_tax_type == 2)
                                            Section 2
                                            @elseif($product->product_tax_type == 3)
                                            Section 3
                                            @elseif($product->product_tax_type == 4)
                                            Section 4
                                            @elseif($product->product_tax_type == 5)
                                            Section 5
                                            @elseif($product->product_tax_type == 6)
                                            Section 6
                                            @elseif($product->product_tax_type == 7)
                                            Section 7
                                            @elseif($product->product_tax_type == 8)
                                            Section 8
                                            @elseif($product->product_tax_type == 9)
                                            Section 9
                                            @elseif($product->product_tax_type == 10)
                                            Section 10
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $product->product_note ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                      
                              <!--  <div class="col-lg-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                        <div>  
                                            <h6> Product Alert: </h6>     
                                            @can('show_notifications')
                        @php
                            $low_quantity_products = \Modules\Product\Entities\Product::select('id', 'product_name', 'product_quantity', 'product_tax_type', 'product_unit', 'product_stock_alert', 'product_code')->whereColumn('product_quantity', '<=', 'product_stock_alert')->get();
                            $notificationCount = $low_quantity_products->count();
                        @endphp
                        @if($notificationCount > 0)
                        @forelse($low_quantity_products as $product)
                        
                                                     <h5 href="{{ route('products.show', $product->id) }}" class="text-center">
                                                     <i class="mr-2 text-primary"> {{ $product->product_name }} </i>
                                                    </h5>
                                                    <ul>                               
                                                    <li>
                                                        <h6 href="{{ route('products.show', $product->id) }}">
                                                         <i class="mr-1 text-primary"></i>Code: {{ $product->product_code }} 
                                                    </h6>
                                                    </li>
                                                    <li>
                                                        <h6 href="{{ route('products.show', $product->id) }}">
                                                            <i class="text-primary"></i>Quantity: {{ $product->product_quantity }} {{ $product->product_unit }}
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <h6 href="{{ route('products.show', $product->id) }}">
                                                            <i class="text-primary"></i>Alert Quantity: {{ $product->product_stock_alert }} {{ $product->product_unit }}
                                                        </h6>
                                                    </li>
                                                    <li>
                                                        <h6 href="{{ route('products.show', $product->id) }}">
                                                            <i class="text-primary"></i>Section #: Section {{ $product->product_tax_type }} 
                                                        </h6>
                                                    </li>
                                                    <a href="{{ route('adjustments.create') }}" class="btn btn-primary" style="margin-left: 1px; margin-top: 20px;">
                                                        Add Stock <i class="bi bi-plus"></i>
                                                </a>
                                                @empty                                                    <!-- No notifications available -->
                                             <!--   @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                    @endif
                                @endcan
                                <!-- @forelse($product->getMedia('images') as $media)
                                        <img src="{{ $media->getUrl() }}" alt="Product Image" class="img-fluid img-thumbnail mb-2">
                                    @empty
                                        <img src="{{ $product->getFirstMediaUrl('images') }}" alt="Product Image" class="img-fluid img-thumbnail mb-2">
                                    @endforelse 
                                    
                                            </div>
                                        </div>
                                    </div> -->
                                  
                    </div>
                </div>
            @endsection





