<?php

namespace App\Http\Controllers\Publisher;

use App\Enums\Merchant\MerchantPartnerStatusEnum;
use App\Http\Controllers\Controller as Controller;
use App\Models\Merchant\Merchant;
use App\Models\Merchant\MerchantPartner;
use Illuminate\Http\Request;

class MerchantController extends Controller
{

    public function index()
    {
        # Sort Active Campaign Merchants
        $merchants = Merchant::orderBy('created_at', 'desc')->paginate(10);
        return view('publisher.merchants.index', compact('merchants'));
    }

    public function handleJoinRequest(Request $request)
    {
        # Validation
        $request->validate([
            'merchant_id' => 'required'
        ]);

        # Get Merchant
        $merchant = Merchant::where('id', $request->merchant_id)->first();

        # Get Merchant Partner
        $partner = $merchant->ownerPartner;

        if (is_null($partner)) {
            # Create Merchant Partner
            MerchantPartner::create([
                'user_id' => auth()->user()->id,
                'merchant_id' => $merchant->id,
                'status' => MerchantPartnerStatusEnum::Pending
            ]);

            return redirect()->back()->with(['success' => 'Request send successfully']);

        } else {
            # Check Statuses
            switch ($partner->status) {
                case MerchantPartnerStatusEnum::Pending:
                    return redirect()->back()->with(['error' => 'Please wait merchant response']);
                case MerchantPartnerStatusEnum::Accepted:
                    return redirect()->back()->with(['error' => 'Merchant had been accepted']);
                case MerchantPartnerStatusEnum::Rejected:
                    return redirect()->back()->with(['error' => 'Merchant had been rejected']);
            }
        }

        return redirect()->back();
    }


}
