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
                                    <h1 class="mb-0 hp-text-color-black-0">Merchant</h1>
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

                                <form method="POST" action="{{route('merchant.settings.merchantUpdate')}}">
                                    @csrf

                                    <div class="mb-24">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{$merchant->name}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                               value="{{$merchant->description}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{$merchant->email}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="website" class="form-label">Website URL</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                               value="{{$merchant->website}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="facebook" class="form-label">Facebook URL</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                               value="{{$merchant->facebook}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="instagram" class="form-label">Instagram URL</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                               value="{{$merchant->instagram}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="youtube" class="form-label">Youtube URL</label>
                                        <input type="text" class="form-control" id="youtube" name="youtube"
                                               value="{{$merchant->youtube}}">
                                    </div>

                                    <div class="mb-24">
                                        <label for="linkedin" class="form-label">Linkedin URL</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                                               value="{{$merchant->linkedin}}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
