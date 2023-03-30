@extends('layout.main')
@section('content')
    <div class="hp-main-layout-content">
        <div class="row mb-32 gy-32">
            <div class="col-12">
                <div class="row justify-content-between gy-32">
                    <div class="col hp-flex-none w-auto">
                        <h2 class="mb-0 hp-text-color-black-1">Campaigns</h2>
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="row g-16 align-items-center justify-content-end">
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="input-group align-items-center">
                                            <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                                <i class="iconly-Curved-User text-black-80"
                                                   style="font-size: 16px;"></i>
                                            </span>
                                    <input type="text" class="form-control border-start-0 ps-8" placeholder="Search">
                                </div>
                            </div>

                            <div class="col hp-flex-none w-auto">
                                <a href="{{route('merchant.campaigns.create')}}" class="btn btn-primary w-100">
                                    <i class="ri-user-add-line remix-icon"></i>
                                    <span>Create New Campaign</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card hp-table-card mb-32">
                    <div class="card-body px-0">

                        @if(count($campaigns) > 0)

                            <div class="table-responsive">
                                <table class="table align-middle table-hover table-borderless">
                                    <thead class="border-bottom">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Duration</th>
                                        <th>Program</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($campaigns as $campaign)
                                        <tr>
                                            <td>{{$campaign->id}}</td>
                                            <td>{{$campaign->name}}</td>
                                            <td>{{$campaign->duration}}</td>
                                            <td>{{$campaign->program?->presenter_title}}</td>
                                            <td>{{$campaign->created_at->format('d-m-Y')}}</td>
                                            <td>
                                                <div
                                                    class="badge bg-{{$campaign->status->color()}}-4 hp-bg-dark-{{$campaign->status->color()}} text-{{$campaign->status->color()}} border-{{$campaign->status->color()}}">
                                                    {{$campaign->status}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="justify-content-end px-32 pt-32 border-top">
                                {{$campaigns}}
                            </div>

                        @else
                            @include('partials.not_found_record',['title'=>'Campaigns not found','description'=>'We include 4 clean email templates for you.'])
                        @endif

                    </div>
                </div>
            </div>
        </div>
@endsection
