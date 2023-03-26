<?php

namespace App\Http\Controllers\Merchant;

use App\Enums\Program\ProgramCommissionTypeEnum;
use App\Enums\Program\ProgramStatusEnum;
use App\Enums\User\UserProviderEnum;
use App\Http\Controllers\Controller as Controller;
use App\Models\Campaign\CategoryForCampaign;
use App\Models\Program\Program;
use App\Models\Merchant\Merchant;
use App\Models\Merchant\MerchantUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//        $programs = Program::owner()->orderBy('id', 'desc')->paginate(10);
//
//        return view('merchant.programs.index', compact('programs'));
    }

    public function create()
    {
        $programs = Program::owner()->activated()->orderBy('id', 'desc')->get();
        $categories = CategoryForCampaign::orderBy('name', 'asc')->get();
        return view('merchant.campaigns.create', compact('programs', 'categories'));
    }

    public function store(Request $request)
    {
//        # Validation
//        $request->validate([
//            'name' => 'required',
//            'description' => 'nullable',
//            'is_sale_tracking' => 'nullable',
//            'sale_commission_type' => ['required_with:is_sale_tracking', new Enum(ProgramCommissionTypeEnum::class)],
//            'sale_commission_value' => 'required_with:is_sale_tracking',
//            'is_click_tracking' => 'nullable',
//            'click_commission_type' => ['required_with:is_click_tracking', new Enum(ProgramCommissionTypeEnum::class)],
//            'click_commission_value' => 'required_with:is_click_tracking',
//            'payout_period_id' => 'required|exists:program_payout_periods,id'
//        ]);
//
//        if (is_null($request->is_sale_tracking) && is_null($request->is_click_tracking)) {
//            return redirect()->back()->with(['error' => 'One of the tracking methods must be selected']);
//        }
//
//        # Create
//        $program = new Program();
//        $program->name = $request->name;
//        $program->description = $request->description;
//        $program->payout_period_id = $request->payout_period_id;
//        $program->is_sale_tracking = ($request->is_sale_tracking) ? 1 : 0;
//        $program->sale_commission_type = $request->sale_commission_type;
//        $program->sale_commission_value = $request->sale_commission_value;
//        $program->is_click_tracking = ($request->is_click_tracking) ? 1 : 0;
//        $program->click_commission_type = $request->click_commission_type;
//        $program->click_commission_value = $request->click_commission_value;
//        $program->owner_user_id = $this->user->id;
//        $program->owner_merchant_id = $this->user->getDefaultMerchantId();
//        $program->status = ProgramStatusEnum::Pending;
//        $program->save();
//
//        # Redirect Dashboard
//        return redirect()->route('merchant.programs')->with(['success' => 'Program created successfully']);
    }
}
