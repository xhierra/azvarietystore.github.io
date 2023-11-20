<?php

namespace Modules\Reports\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Sale\Entities\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;

class ReportsController extends Controller
{

    public function profitLossReport(Sale $sale) {
        abort_if(Gate::denies('access_reports'), 403);

        $sale_details = $sale->saleDetails;

        $cart = Cart::instance('sale');

        return view('reports::profit-loss.index', compact('sale'));
    }

    public function paymentsReport() {
        abort_if(Gate::denies('access_reports'), 403);

        return view('reports::payments.index');
    }

    public function salesReport(Sale $sale) {
        abort_if(Gate::denies('access_reports'), 403);

        $sale_details = $sale->saleDetails;

        $cart = Cart::instance('sale');

        return view('reports::sales.index', compact('sale'));
    }

    public function purchasesReport() {
        abort_if(Gate::denies('access_reports'), 403);

        return view('reports::purchases.index');
    }

    public function salesReturnReport() {
        abort_if(Gate::denies('access_reports'), 403);

        return view('reports::sales-return.index');
    }

    public function purchasesReturnReport() {
        abort_if(Gate::denies('access_reports'), 403);

        return view('reports::purchases-return.index');
    }
}
