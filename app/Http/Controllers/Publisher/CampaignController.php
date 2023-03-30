<?php

namespace App\Http\Controllers\Publisher;

use App\Enums\Campaign\CampaignStatusEnum;
use App\Enums\Program\ProgramCommissionTypeEnum;
use App\Enums\Program\ProgramStatusEnum;
use App\Enums\User\UserProviderEnum;
use App\Helpers\HandlerHelper;
use App\Http\Controllers\Controller as Controller;
use App\Models\Campaign\Campaign;
use App\Models\Campaign\CampaignCategory;
use App\Models\Campaign\CategoryForCampaign;
use App\Models\Program\Program;
use App\Models\Merchant\Merchant;
use App\Models\Merchant\MerchantUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class CampaignController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        $campaigns = Campaign::orderBy('id', 'desc')->paginate(10); #Owner Required

        return view('publisher.campaigns.index', compact('campaigns'));
    }


}
