<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PromoCode;

class DashboardController extends Controller
{
    public function dashboardView() {
        $amount_users = User::count();
        $amount_promocodes = PromoCode::count();
        $amount_used_promocodes = PromoCode::where('status', PromoCode::USED)->count();
        $amount_new_promocodes = PromoCode::where('status', PromoCode::NEW_CODE)->count();
        return view('admin.dashboard.dashboard', compact('amount_users', 'amount_promocodes', 'amount_used_promocodes', 'amount_new_promocodes'));
    }
}
