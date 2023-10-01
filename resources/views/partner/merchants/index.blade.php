@extends('layout.main')
@section('content')
    <div class="hp-main-layout-content">
        <div class="row mb-32 gy-32">
            <div class="col-12">
                <div class="row justify-content-between gy-32">
                    <div class="col hp-flex-none w-auto">
                        <h2 class="mb-0 hp-text-color-black-1">Merchants</h2>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card hp-table-card mb-32">
                    <div class="card-body px-0">

                        @if(count($merchants) > 0)

                            <div class="table-responsive">
                                <table class="table align-middle table-hover table-borderless">
                                    <thead class="border-bottom">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($merchants as $merchant)
                                        <tr>
                                            <td>{{$merchant->name}}</td>
                                            <td>{{$merchant->description}}</td>
                                            <td>
                                                @php
                                                    $partner = $merchant->ownerPartner;
                                                @endphp
                                                @if(is_null($partner))
                                                    <form method="POST"
                                                          action="{{route('partner.merchants.handleJoinRequest')}}">
                                                        @csrf
                                                        <input type="hidden" name="merchant_id"
                                                               value="{{$merchant->id}}">
                                                        <button type="submit" class="btn btn-success">Join Request
                                                        </button>
                                                    </form>
                                                @else
                                                    <div
                                                        class="badge bg-{{$partner->status->color()}}-4 hp-bg-dark-{{$partner->status->color()}} text-{{$partner->status->color()}} border-{{$partner->status->color()}}">
                                                        {{$partner->status}}
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="justify-content-end px-32 pt-32 border-top">
                                {{$merchants}}
                            </div>

                        @else
                            @include('partials.not_found_record',['title'=>'Merchants not found','description'=>'We include 4 clean email templates for you.'])
                        @endif

                    </div>
                </div>
            </div>
        </div>
@endsection
