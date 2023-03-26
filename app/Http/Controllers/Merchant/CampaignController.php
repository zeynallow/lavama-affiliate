<?php

namespace App\Http\Controllers\Merchant;

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
        $campaigns = Campaign::owner()->orderBy('id', 'desc')->paginate(10);

        return view('merchant.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $programs = Program::owner()->activated()->orderBy('id', 'desc')->get();
        $categories = CategoryForCampaign::orderBy('name', 'asc')->get();
        return view('merchant.campaigns.create', compact('programs', 'categories'));
    }

    public function store(Request $request)
    {
        # Validation
        $request->validate([
            'name' => 'required',
            'name_for_publisher' => 'nullable',
            'description' => 'required',
            'program_id' => 'required|exists:programs,id,owner_merchant_id,' . $this->user->getDefaultMerchantId(),
            'category_ids' => 'required',
            'start_datetime' => 'nullable|date',
            'end_datetime' => 'nullable|date',
            'cookie_lifetime' => 'required|integer'
        ]);

        # Set Name For Publisher (Left blank)
        if (is_null($request->name_for_publisher)) {
            $request->name_for_publisher = $request->name;
        }

        # Check Lifetime Duration
        if (is_null($request->is_lifetime) && (is_null($request->start_datetime) || is_null($request->end_datetime))) {
            return redirect()->back()->with(['error' => 'If not lifetime, start & end datetime must be selected']);
        }

        # DB Begin Transaction
        DB::beginTransaction();

        try {
            # Create
            $campaign = new Campaign();
            $campaign->name = $request->name;
            $campaign->name_for_publisher = $request->name_for_publisher;
            $campaign->description = $request->description;
            $campaign->program_id = $request->program_id;
            $campaign->start_datetime = $request->start_datetime;
            $campaign->end_datetime = $request->end_datetime;
            $campaign->cover = null; # ..
            $campaign->is_target_all = 1; # ..
            $campaign->for_all_publishers = 1; # ..
            $campaign->cookie_lifetime = $request->cookie_lifetime;
            $campaign->status = CampaignStatusEnum::Pending;
            $campaign->owner_user_id = $this->user->id;
            $campaign->save();

            # Create Campaign Categories
            $campaignCategory = [];
            if (is_array($request->category_ids)) {
                foreach ($request->category_ids as $categoryId) {
                    $campaignCategory[] = [
                        'campaign_id' => $campaign->id,
                        'category_id' => $categoryId
                    ];
                }
            }

            if (count($campaignCategory) > 0) {
                CampaignCategory::insert($campaignCategory);
            }

        } catch (\Exception $e) {
            # DB Rollback Transaction
            DB::rollBack();
            return redirect()->back()->with(['error' => HandlerHelper::getErrorMessage($e)]);
        }

        # DB Commit Transaction
        DB::commit();


        # Redirect Campaigns
        return redirect()->route('merchant.campaigns')->with(['success' => 'Campaign created successfully']);
    }
}
