<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller as Controller;
use App\Models\Campaign\CampaignPartner;
use App\Models\Campaign\CampaignTrack;
use Illuminate\Http\Client\Request;

class TrackingController extends Controller
{

    public function sendEvent(Request $request)
    {
        $request->validate([
            'lvm_ref' > 'required'
        ]);

        //TODO Check Merchant URL Required

        $getCampaign = CampaignPartner::where('uid', $request->lvm_ref)->first();
        if (!$getCampaign) {
            return $this->errorResponse(null, 'Campaign not found', 404);
        }

        CampaignTrack::create([
            'campaign_parnter_id' => $getCampaign->id,
            'user_agent' => null,
            'user_ip' => null,
            'is_click' => true,
            'is_sale' => false
        ]);

        return $this->successResponse(null, 'Sent event successfully');
    }
}
