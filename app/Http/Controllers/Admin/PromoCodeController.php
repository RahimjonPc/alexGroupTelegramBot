<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;
use App\Exports\UsedPromoxCodeExport;
use App\Exports\NewPromoCodeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PromoCodeImport;

class PromoCodeController extends Controller
{
    public function promocodeView() {
        $promocodes = PromoCode::orderBy('id', 'DESC')->get();

        return view('admin.promocode.index', compact('promocodes'));
    }

    public function exportUsedPromoCode()
    {
        return Excel::download(new UsedPromoxCodeExport, 'usedPrmoCodes.xlsx');
    }

    public function exportNewPromoCode()
    {
        return Excel::download(new NewPromoCodeExport, 'newPromoCodes.xlsx');
    }

    public function importPromoCode(Request $request)
    {
        Excel::import(new PromoCodeImport, $request->file('promocodes'));

        return redirect()->back();
    }
}
