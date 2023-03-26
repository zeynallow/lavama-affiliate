@extends('layout.main')
@section('content')
    <div class="hp-main-layout-content">
        <div class="row mb-32 gy-32">
            <div class="col-12">
                <div class="row justify-content-between gy-32">
                    <div class="col hp-flex-none w-auto">
                        <h2 class="mb-0 hp-text-color-black-1">Programs</h2>
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
                                <a href="{{route('merchant.programs.create')}}" class="btn btn-primary w-100">
                                    <i class="ri-user-add-line remix-icon"></i>
                                    <span>Create New Program</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card hp-table-card mb-32">
                    <div class="card-body px-0">

                        @if(count($programs) > 0)

                            <div class="table-responsive">
                                <table class="table align-middle table-hover table-borderless">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Sale commissions</th>
                                        <th>Click commissions</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($programs as $program)
                                        <tr>
                                            <td>{{$program->id}}</td>
                                            <td>{{$program->name}}</td>
                                            <td>
                                                @if($program->is_sale_tracking)
                                                    @if($program->sale_commission_type == \App\Enums\Program\ProgramCommissionTypeEnum::Percent)
                                                        {{$program->sale_commission_value}} %
                                                    @else
                                                        {{$program->sale_commission_value}}
                                                        [{{$program->sale_commission_type}}]
                                                    @endif
                                                @else
                                                    <div
                                                        class="badge bg-danger-4 hp-bg-dark-danger text-danger border-danger">
                                                        inactive
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($program->is_click_tracking)
                                                    @if($program->click_commission_type == \App\Enums\Program\ProgramCommissionTypeEnum::Percent)
                                                        {{$program->click_commission_value}} %
                                                    @else
                                                        {{$program->click_commission_value}}
                                                        [{{$program->click_commission_type}}]
                                                    @endif
                                                @else
                                                    <div
                                                        class="badge bg-danger-4 hp-bg-dark-danger text-danger border-danger">
                                                        inactive
                                                    </div>
                                                @endif
                                            </td>

                                            <td>{{$program->created_at->format('d-m-Y')}}</td>

                                            <td>
                                                <div
                                                    class="badge bg-{{$program->status->color()}}-4 hp-bg-dark-{{$program->status->color()}} text-{{$program->status->color()}} border-{{$program->status->color()}}">
                                                    {{$program->status}}
                                                </div>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$programs}}
                        @else
                            @include('partials.not_found_record',['title'=>'Programs not found','description'=>'We include 4 clean email templates for you.'])
                        @endif
                        {{--                        <nav>--}}
                        {{--                            <ul class="pagination justify-content-end px-32">--}}
                        {{--                                <li class="page-item">--}}
                        {{--                                    <a class="page-link" href="javascript:;">--}}
                        {{--                                        <svg viewBox="64 64 896 896" focusable="false" data-icon="left" width="12px"--}}
                        {{--                                             height="12px" fill="currentColor" aria-hidden="true">--}}
                        {{--                                            <path--}}
                        {{--                                                d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>--}}
                        {{--                                        </svg>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}

                        {{--                                <li class="page-item">--}}
                        {{--                                    <a class="page-link" href="javascript:;">1</a>--}}
                        {{--                                </li>--}}

                        {{--                                <li class="page-item">--}}
                        {{--                                    <a class="page-link" href="javascript:;">--}}
                        {{--                                        <svg viewBox="64 64 896 896" focusable="false" data-icon="right" width="12px"--}}
                        {{--                                             height="12px" fill="currentColor" aria-hidden="true">--}}
                        {{--                                            <path--}}
                        {{--                                                d="M765.7 486.8L314.9 134.7A7.97 7.97 0 00302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 000-50.4z"></path>--}}
                        {{--                                        </svg>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </nav>--}}
                    </div>
                </div>
            </div>
        </div>
@endsection
