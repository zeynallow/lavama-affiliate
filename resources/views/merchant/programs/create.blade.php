@extends('layout.main')
@section('content')
    <div class="hp-main-layout-content">
        <div class="row mb-32 gy-32">
            <div class="col-12">
                <div
                    class="hp-bg-black-bg py-32 py-sm-64 px-24 px-sm-48 px-md-80 position-relative overflow-hidden hp-page-content"
                    style="border-radius: 32px;">
                    <svg width="358" height="336" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="position-absolute hp-rtl-scale-x-n1" style="bottom: 0px; right: 0px;">
                        <path
                            d="M730.404 135.471 369.675-6.641l88.802 164.001-243.179-98.8 246.364 263.281-329.128-126.619 114.698 166.726-241.68-62.446"
                            stroke="url(#a)" stroke-width="40" stroke-linejoin="bevel"></path>
                        <defs>
                            <linearGradient id="a" x1="315.467" y1="6.875" x2="397.957" y2="337.724"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#fff"></stop>
                                <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                            </linearGradient>
                        </defs>
                    </svg>

                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="mb-0 hp-text-color-black-0"> Create New Program </h1>
                                </div>

                                <div class="col-12">
                                    <p class="h5 mb-0 mt-24 hp-text-color-black-0"> Examples and usage guidelines for
                                        form control styles, layout options, and custom components for creating a wide
                                        variety of forms. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">

                            <div class="col-12 mt-16">

                                @include('partials.alert_validation')

                                <form method="POST" action="{{route('merchant.programs.store')}}">
                                    @csrf

                                    <div class="mb-24">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{old('name')}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                               value="{{old('description')}}">
                                    </div>

                                    <div class="alert alert-warning-2 mb-24">
                                        One of the tracking methods must be selected
                                    </div>

                                    <div class="row mb-24">
                                        <div class="col-6">
                                            <div class="form-check form-switch mb-24">
                                                <input class="form-check-input" type="checkbox" id="is_sale_tracking"
                                                       name="is_sale_tracking" value="1">
                                                <label class="form-check-label" for="is_sale_tracking">
                                                    <span class="ms-12">Sale tracking</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24" id="sale_commission_section">
                                        <div class="col-6">
                                            <label for="sale_commission_type" class="form-label">Sale commission
                                                type</label>
                                            <select class="form-select" id="sale_commission_type" disabled
                                                    name="sale_commission_type">
                                                @foreach(\App\Enums\Program\ProgramCommissionTypeEnum::cases() as $commissionType)
                                                    <option
                                                        @if(old('sale_commission_type') == $commissionType->value)
                                                            selected
                                                        @endif
                                                        value="{{$commissionType->value}}">{{$commissionType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="sale_commission_value" class="form-label">Sale commission
                                                value</label>
                                            <input type="text" class="form-control" id="sale_commission_value"
                                                   value="{{old('sale_commission_value')}}"
                                                   name="sale_commission_value" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-24">
                                        <div class="col-6">
                                            <div class="form-check form-switch mb-24">
                                                <input class="form-check-input" type="checkbox" id="is_click_tracking"
                                                       name="is_click_tracking"
                                                       value="1">
                                                <label class="form-check-label" for="is_click_tracking">
                                                    <span class="ms-12">Click tracking</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24" id="click_commission_section">
                                        <div class="col-6">
                                            <label for="click_commission_type" class="form-label">Click commission
                                                type</label>
                                            <select class="form-select" id="click_commission_type" disabled
                                                    name="click_commission_type">
                                                @foreach(\App\Enums\Program\ProgramCommissionTypeEnum::cases() as $commissionType)
                                                    <option
                                                        @if(old('click_commission_type') == $commissionType->value)
                                                            selected
                                                        @endif
                                                        value="{{$commissionType->value}}">{{$commissionType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="click_commission_value" class="form-label">Click commission
                                                value</label>
                                            <input type="text" class="form-control" id="click_commission_value"
                                                   value="{{old('click_commission_value')}}"
                                                   name="click_commission_value" disabled>
                                        </div>
                                    </div>

                                    <div class="mb-24">
                                        <label for="payout_period_id" class="form-label">Payout Periods</label>
                                        <select class="form-select" id="payout_period_id" name="payout_period_id">
                                            @foreach(\App\Models\Program\ProgramPayoutPeriod::getMerchantPayoutPeriods(auth()->user()->merchants?->pluck('id')) as $payoutPeriod)
                                                <option
                                                    @if(old('payout_period_id') == $payoutPeriod->id)
                                                        selected
                                                    @endif
                                                    value="{{$payoutPeriod->id}}">{{$payoutPeriod->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
@push('js')
    <script>


        $("#is_sale_tracking").click(function () {
            if ($("#is_sale_tracking").is(':checked')) {
                $("#sale_commission_section :input").prop("disabled", false);
            } else {
                $("#sale_commission_section :input").prop("disabled", true);
            }
        });

        $("#is_click_tracking").click(function () {
            if ($("#is_click_tracking").is(':checked')) {
                $("#click_commission_section :input").prop("disabled", false);
            } else {
                $("#click_commission_section :input").prop("disabled", true);
            }
        });


    </script>
@endpush
