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
                                    <h1 class="mb-0 hp-text-color-black-0"> Create New Campaign</h1>
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

                                <form method="POST" action="{{route('merchant.campaigns.store')}}">
                                    @csrf

                                    <div class="mb-24">
                                        <label for="program_id" class="form-label">Program <span class="text-danger">*</span></label>
                                        <select class="form-select" id="program_id"
                                                name="program_id">
                                            @foreach($programs as $program)
                                                <option
                                                    @if(old('program_id') == $program->id)
                                                        selected
                                                    @endif
                                                    value="{{$program->id}}">{{$program->presenter_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-24">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{old('name')}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="name_for_publisher" class="form-label">Name for publisher</label>
                                        <input type="text" class="form-control" id="name_for_publisher"
                                               name="name_for_publisher"
                                               value="{{old('name_for_publisher')}}">
                                        <small>If left blank, it will be the same as the common name</small>
                                    </div>

                                    <div class="mb-24">
                                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="description" name="description"
                                               value="{{old('description')}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="category_ids" class="form-label">Category <span class="text-danger">*</span></label>
                                        <select class="form-select form-select-multiple" id="category_ids" multiple
                                                name="category_ids[]">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row mb-24">
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_lifetime"
                                                       name="is_lifetime" value="1">
                                                <label class="form-check-label" for="is_lifetime">
                                                    <span class="ms-12">Lifetime</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24" id="duration_section">
                                        <div class="col-6">
                                            <label for="start_datetime" class="form-label">Start Date <span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="start_datetime"
                                                   value="{{ old('start_datetime') ?? \Carbon\Carbon::now()->format('Y-m-d H:i')}}"
                                                   min="{{\Carbon\Carbon::now()->format('Y-m-d H:i')}}"
                                                   name="start_datetime">
                                        </div>
                                        <div class="col-6">
                                            <label for="end_datetime" class="form-label">End Date <span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="end_datetime"
                                                   value="{{ old('end_datetime') ?? \Carbon\Carbon::now()->addDay(90)->format('Y-m-d H:i')}}"
                                                   min="{{\Carbon\Carbon::now()->addDay(90)->format('Y-m-d H:i')}}"
                                                   name="end_datetime">
                                        </div>
                                    </div>

                                    <div class="mb-24">
                                        <label for="cookie_lifetime" class="form-label">Cookie lifetime <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="cookie_lifetime"
                                                   name="cookie_lifetime"
                                                   value="{{old('cookie_lifetime') ?? 30}}">
                                            <span class="input-group-text">days</span>
                                        </div>
                                    </div>

                                    <div class="row mb-24">
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_target_all"
                                                       name="is_target_all" value="1" disabled>
                                                <label class="form-check-label" for="is_target_all">
                                                    <span class="ms-12">Target all products</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-24">
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="for_all_publishers"
                                                       name="for_all_publishers" value="1" disabled>
                                                <label class="form-check-label" for="for_all_publishers">
                                                    <span class="ms-12">Target all publishers</span>
                                                </label>
                                            </div>
                                        </div>
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

        $("#is_lifetime").click(function () {
            if ($("#is_lifetime").is(':checked')) {
                $("#duration_section").find("span.text-danger").html('');
                $("#duration_section :input").prop("disabled", true);
            } else {
                $("#duration_section").find("span.text-danger").html('*');
                $("#duration_section :input").prop("disabled", false);
            }
        });

    </script>
@endpush
