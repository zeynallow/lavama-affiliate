<?php

namespace App\Http\Controllers\Merchant;

use App\Enums\Merchant\MerchantPartnerStatusEnum;
use App\Http\Controllers\Controller as Controller;
use App\Models\Campaign\Campaign;
use App\Models\Merchant\MerchantPartner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class PartnerController extends Controller
{

    public function index()
    {
        $partners = MerchantPartner::merchantOwner()->accepted()
            ->select(
                'merchant_partners.*',
                'users.first_name',
                'users.last_name'
            )
            ->join('users', 'users.id', 'merchant_partners.user_id')
            ->paginate(10);

        return view('merchant.partners.index', compact('partners'));
    }

    public function joinRequests()
    {
        $partners = MerchantPartner::merchantOwner()->pending()
            ->select(
                'merchant_partners.*',
                'users.first_name',
                'users.last_name'
            )
            ->join('users', 'users.id', 'merchant_partners.user_id')
            ->paginate(10);

        return view('merchant.partners.join_requests', compact('partners'));

    }

    public function handleJoinRequests(Request $request)
    {

        $request->validate([
            'request_id' => 'required',
            'action' => ['required', new Enum(MerchantPartnerStatusEnum::class)]
        ]);

        MerchantPartner::where('id', $request->request_id)->merchantOwner()->pending()
            ->update([
                'status' => $request->action,
                'accepted_at' => \Carbon\Carbon::now()
            ]);

        return redirect()->back()->with(['success' => 'Successfully']);

    }

}
