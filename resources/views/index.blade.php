@extends('layouts.app')
@section('content')
@section('title')
Dashboard
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.52.0/apexcharts.min.css"
    integrity="sha512-w3pXofOHrtYzBYpJwC6TzPH6SxD6HLAbT/rffdkA759nCQvYi5AHy5trNWFboZnj4xtdyK0AFMBtck9eTmwybg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .contacts_charts_container .card-toolbar {
        display: none !important;
    }

    .total_opportunities {
        display: none !important;
    }

    .card {
        height: 310px;
    }


    .apexcharts-legend-text {
        display: flex;
        position: relative;
        gap: 10px;
    }

    .apexcharts-legend-marker {
        height: 8px !important;
        width: 13px !important;
        left: -3px !important;
        top: 0px !important;
    }

    .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
    }

    .main-div {
        margin-top: -7%;
    }

    @media (max-width: 768px) {

        #group_by_countries {
            height: 370px !important;
        }
    }
</style>

@php
$sources=['facebook'=>'Facebook',
'instagram'=>'Instagram',
'youtube'=>'Youtube',
'google'=>'Google',
'eigennetwork'=>'EignNetwork'
]
@endphp
@section('breadcrumbs')
{{ Breadcrumbs::render('dashboard') }}
@endsection
<div class='contacts_charts_container'>
    {{-- Contacts filters row --}}
    <div class="row gx-5 gx-xl-10">

        <!--begin::Info-->
        <div class="flex-grow-1 green-patti">
            <!--begin::Title-->
            <div class="d-flex green-patti">
                <!--begin::User-->
                <div class=" flex-column mb-1 green-patti-1" style="width: 65%;">
                    <div class="d-flex  justify-content-center bg-success rounded border-primary  flex-wrap mt-0">
                        <div class="d-flex align-items-center py-2 px-2">
                            <div class="fw-semibold fs-6 text-white"></div>
                        </div>

                        <div class="d-flex align-items-center py-2 px-2">
                            <div class="fw-semibold fs-6 text-white"></div>
                        </div>

                        <div class="d-flex align-items-center py-2 px-2">
                            <div class="fw-semibold fs-6 text-white"></div>
                        </div>

                        <div class="d-flex align-items-center py-2 px-2">
                            <div class="fw-semibold fs-6 text-white"></div>
                        </div>

                        <div class="d-flex align-items-center py-2 px-2">
                            <div class="fw-semibold fs-6 text-white"></div>
                        </div>
                    </div>
                    <!--end::Name-->
                </div>
                <!--end::User-->

                <!--begin::Actions-->

                <div class="d-flex mb-1 green-patti-3 " style="width: 68%; gap: 15px;justify-content: end">
                    <!-- User Filter -->
                    <div class="col-md-2 green-patti-4" id="user-filter"style="width: 30%;">
                        <select id="user-select"
                            class="form-select form-select-sm px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#f8285a] focus:border-[#f8285a] transition duration-300 ease-in-out">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::User Filter-->

                    <!-- Source Filter -->
                    <div id="source-filter" class="d-md-block col-md-3 green-patti-4" style="width: 30%;">

                        <select id="source-select"
                            class="form-select form-select-sm px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#f8285a] focus:border-[#f8285a] transition duration-300 ease-in-out">
                            <option value="">Select Source</option>
                            @foreach ($sources as $key =>$source)
                            <option value="{{ $key }}">{{ $source}}</option>
                            @endforeach
                        </select>

                    </div>
                    <!--end::Source Filter-->

                    <!-- Date Range Picker -->
                    <div class="col-md-4 green-patti-4" style="width: 33%;" >
                        <input
                            class="form-control form-control-sm px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#f8285a] focus:border-[#f8285a] transition duration-300 ease-in-out"
                            placeholder="January 4, 2000 - December 1, 2023" id="kt_daterangepicker_4" />
                    </div>
                    <!--end::Date Range Picker-->
                </div>

                <!--end::Actions-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>

    <div class="row gx-5 gx-xl-10 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

            <!--begin::Card widget 4-->
            <div class="card card-flush h-md-50 mb-5 mb-xl-10 ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 top_total_contacts_count"
                                data-bs-toggle="tooltip" title="0">0</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->
                            <span class="badge badge-light-success fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                        class="path1"></span><span class="path2"></span></i>
                                2.2%
                            </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Total leads by TAG</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex align-items-center mb-2">
                    <!--begin::Chart-->
                    <div class="d-flex flex-center me-5 mb-3">
                        <div id="myownchart" style="min-width: 100px; min-height: 100px; margin-top:10px"></div>
                    </div>
                    <!--end::Chart-->

                    <!--begin::Labels-->
                    <div class="d-flex flex-column content-justify-center w-100 ">
                        <!--begin::Label 1-->
                        <div class="d-flex fs-6 fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4 ">Leads</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end top_total_leads_count" id="label-1-value">0
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label 1-->

                        <!--begin::Label 2-->
                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Agencies</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end top_total_agencies_count"
                                id="label-2-value">0</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label 2-->

                        <!--begin::Label 3-->
                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #1cc88a"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Sollicitants</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end top_total_sollicitants_count"
                                id="label-2-value">0</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label 3-->

                        <!--begin::Label 4-->
                        <div class="d-flex fs-6 fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 bg-secondary me-3"></div>
                            <!--end::Bullet-->
                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">No Tags</div>
                            <!--end::Label-->
                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end top_total_notags_count" id="label-4-value">
                                0</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label 4-->
                    </div>
                    <!--end::Labels-->
                </div>
                <!--end::Card body-->

                <!--end::Card body-->
            </div>
            <!--end::Card widget 4-->

            <!--begin::Card widget 5-->
            <div class="card card-flush mb-10 mb-xl-10" style="overflow-y: auto">
                <!--begin::Header-->
                <div class="card-header py-7">
                    <!--begin::Statistics-->
                    <div class="m-0">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Title-->
                            <span class="fs-2x fw-bold text-gray-800 me-2 lh-1 ls-n2">Conversion Rates</span>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">Conversion Calculation</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body d-flex justify-content-between flex-column pt-3">
                    @if (isset($cov_stats) && is_array($cov_stats))
                    @foreach ($cov_stats as $key => $cov)
                    @if ($key != 'users')
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{{
                                    ucfirst(str_replace('_', ' ', $key)) }}</a>
                                <!--end::Title-->

                                <!--begin::Desc-->
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0 {{ $key }}">{{
                                    $cov['total'] }}
                                    total</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->

                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Number-->
                                <span class="text-gray-800 fw-bold fs-4 me-3">{{ number_format($cov['conversion_rate'],
                                    2) }}%</span>
                                <!--end::Number-->

                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <span
                                        class="badge badge-light-{{ $cov['direction'] == 'down' ? 'danger' : 'success' }} fs-base">
                                        <i
                                            class="ki-outline ki-arrow-{{ $cov['direction'] == 'down' ? 'down' : 'up' }} fs-5 text-{{ $cov['direction'] == 'down' ? 'danger' : 'success' }} ms-n1"></i>
                                        {{ number_format($cov['direction_value'], 2) }}%
                                    </span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    @endif
                    @endforeach
                    @endif
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card widget 5-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
            <!--begin::Card widget 6-->
            <div class="card card-flush  h-md-50 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">€</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 top_total_sales_count"
                                data-bs-toggle="tooltip" title="0">0</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->
                            <span class="badge badge-light-success fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                        class="path1"></span><span class="path2"></span></i>
                                2.6%
                            </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Average Yearly Sales</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end px-0 pb-0">
                    <!--begin::Chart-->
                    <div id="ownsaleschart" class="w-100" style="height: 80px; min-height: 80px;">

                    </div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 6-->



            <div class="card  card-flush h-72 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ count($assigned_per_user)
                            }}</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Total Users</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                @php
                $visibleUsers = array_slice($users, 0, 8);
                $remainingCount = count($users) - 8;
                @endphp
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <!--begin::Title-->
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
                    <!--end::Title-->

                    <!--begin::Users group-->
                    <div class="symbol-group symbol-hover flex-nowrap">
                        <?php foreach ($visibleUsers as $user):
                            $initials = strtoupper($user['firstName'][0] . $user['lastName'][0]);
                            $bgColor = getRandomColor();
                        ?>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                            title="<?= $user['firstName'] . ' ' . $user['lastName'] ?>">
                            <span class="symbol-label" style="background-color: <?= $bgColor ?>; color: #fff;">
                                <?= $initials ?>
                            </span>
                        </div>
                        <?php endforeach; ?>

                        <?php if ($remainingCount > 0): ?>
                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_view_users">
                            <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+
                                <?= $remainingCount ?>
                            </span>
                        </a>
                        <?php endif; ?>
                    </div>
                    <!--end::Users group-->
                </div>
            </div>
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
            <!--begin::Chart widget 3-->
            <div class="card card-flush overflow-hidden h-md-100">
                <!--begin::Header-->

                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                    <!--begin::Chart-->
                    <div id="group_by_countries" class="min-h-auto ps-4 pe-6"
                        style="height: 100%; min-height: 370px !important">

                    </div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Chart widget 3-->
        </div>
        <!--end::Col-->
    </div>


    <div class="row media gx-5 gx-xl-10 mb-xl-10" style="display: none">
        <!--begin::Col-->
        <div class="col-md-6 media col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

            <!--begin::Card widget 4-->
            {{-- Total Leads By Tag --}}
            <!--begin::Card widget 4-->
            <div class="card card-flush h-72  mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-2">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 top_total_contact">LEADS</span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Total leads by TAG</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div id="top_contacts_chart" style="min-width: 70px; " data-kt-size="70" data-kt-line="11" class="p-5">

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 4-->
            <!--end::Card widget 4-->

            <div class="conversiondiv">
                <!--begin::Card widget 8-->

                <!--end::Card widget 8-->

            </div>
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

            <!--begin::Card widget 4-->
            <div class="card  card-flush h-72  mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start"></span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 AverageYearlySales"></span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Average Yearly Sales</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div id="top_avg_daily_sales_chart_old" style="min-width: 70px; " data-kt-size="70" data-kt-line="11"
                    class="p-5">

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 4-->


        </div>
        <!--end::Col-->

        <!--begin::Col-->

        <div class="map bg-white col-xxl-6 mb-15 mb-xl-10">
            <!--begin::Card body-->
            <div id="group_by_countries_old" style="">
            </div>
        </div>
    </div>


    <!--end::Col-->
    {{-- <div class="main-div"> --}}
        <div class="row gx-5 gx-xl-10 mt-xl-10">
            <!--begin::Col-->
            <div class="col-lg-8 col-xl-8 col-xxl-8">
                <!--begin::Chart widget 3-->
                <div class="card card-flush mb-5 mb-xl-10" style="height: 92.1%;">
                    <!--begin::Header-->
                    <div class="card-header py-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Sales This Months</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">All Won Opportunities</span>
                        </h3>
                        <!--end::Title-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">

                                <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                            </button>


                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-between flex-column pb-20 px-0">
                        <!--begin::Statistics-->
                        <div class="px-9 mb-5">
                            <!--begin::Statistics-->
                            <div class="d-flex mb-2">
                                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2 top_total_sales"></span>
                            </div>
                            <!--end::Statistics-->


                            <!--end::Description-->
                        </div>
                        <!--end::Statistics-->

                        <!--begin::Chart-->
                        <div id="top_sales_chart" class="min-h-auto ps-4 pe-6"
                            style="height: 300px; min-height: 315px;">

                        </div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <!--end::Col-->

            <style>
                .channel-card {
                    height: 98%;
                }
            </style>
            <div class="col-lg-4 col-xl-4 col-xxl-4 col-xxl-  mb-xl-10">
                <!--begin::List widget 9-->
                <div class="channel-card card card-flush">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">CHANNELS</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">SALES BY CHANNEL</span>
                        </h3>
                        <!--end::Title-->
                        <div class="form-check form-switch form-check-custom form-check-solid">

                            <input class="form-check-input h-20px w-30px" type="checkbox" id="flexSwitch20x30" />
                            <label class="form-check-label" for="flexSwitch20x30">

                            </label>
                        </div>

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-sm btn-light">Order Details</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body append_channel_sources">
                        <!--begin::Scroll-->
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List widget 9-->
            </div>


            <style>
                .modal-content : {
                    width: 45vw;
                }

                .table-f-display: {
                    display: table-caption !important;
                    height: 50% !important;
                }
            </style>

            <div class="source_channel_modals">
            </div>


        </div>
        {{--
    </div> --}}

    <!--begin::Modal - View Users-->
    <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        {!! getIcon('cross', 'fs-1') !!}</div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Browse Users</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">If you need more info, please check out our
                            <a href="#" class="link-primary fw-bold">Users Directory</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Users-->

                    <div class="mb-15">
                        <!--begin::List-->
                        <div class="mh-375px scroll-y me-n7 pe-7">
                            <!--begin::User-->
                            @foreach ($assigned_per_user as $key => $asu)
                            @php

                            $key_split = explode('-', trim($key)); // Explode the name and email
                            $name = $key_split[0] ?? 'X';
                            $email = $key_split[1] ?? '';
                            $initials = strtoupper(substr($name, 0, 1));
                            $bgColor = getRandomColor();
                            $total_sales = count($asu);
                            @endphp
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                        title="{{ $name }}">
                                        <span class="symbol-label"
                                            style="background-color: {{ $bgColor }}; color: #fff;">{{ $initials
                                            }}</span>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#"
                                            class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">{{
                                            $name }}</a>
                                        <!--end::Name-->
                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">{{ $email }}</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        @php
                                        $amount = 0;
                                        foreach ($asu as $key => $value) {
                                        if ($value && ($value['status'] = 'won')) {
                                        $amount += $value['monetary_value'] ?? 0;
                                        }
                                        }
                                        @endphp
                                        <div class="fs-5 fw-bold text-gray-900">$ {{ $amount }}</div>
                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            @endforeach
                            <!--end::User-->
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Users-->
                    <!--begin::Notice-->
                    <div class="d-flex justify-content-between">
                        <!--begin::Label-->
                        <div class="fw-semibold">
                            <label class="fs-6">Adding Users by Team Members</label>
                            <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                        </div>
                        <!--end::Label-->

                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - View Users-->



    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.52.0/apexcharts.min.js"
        integrity="sha512-piY4QAXPoG2xLdUZZbcc5klXzMxckrQKY9A2o6nKDRt9inolvvLbvGPC+z9IZ29b28UJlD05B7CjxxPaxh4bjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    @section('js')
    @if (is_connected())
    <script>
        var start = moment().subtract(29, "days");
            var end = moment();

            function cb(start, end) {
                if (start === null && end === null) {
                    $("#kt_daterangepicker_4").val("All Data");
                } else {
                    $("#kt_daterangepicker_4").val(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
                }
            }

            $("#kt_daterangepicker_4").daterangepicker({
                startDate: start,
                endDate: end,
                showDropdowns: true,
                autoUpdateInput: false,
                ranges: {
                    "Today": [moment(), moment()],
                    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "This Week": [moment().startOf("week"), moment().endOf("week")],
                    "Last Week": [moment().subtract(1, "week").startOf("week"), moment().subtract(1, "week").endOf(
                        "week")],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf(
                        "month")],
                    "Last 365 Days": [moment().subtract(365, "days"), moment()],
                    "This Year": [moment().startOf("year"), moment().endOf("year")],
                    "Last Year": [moment().subtract(1, "year").startOf("year"), moment().subtract(1, "year").endOf(
                        "year")],
                    "All Data": [null, null]
                },
                locale: {
                    format: "MMMM D, YYYY"
                }
            }, cb);

            cb(start, end);

            $("#kt_daterangepicker_4").on('apply.daterangepicker', function(ev, picker) {
                if (picker.chosenLabel === "All Data") {
                    // Clear the input field if "All Data" is selected
                    $("#kt_daterangepicker_4").val('');
                    filterContacts(null, null);
                } else {

                    $("#kt_daterangepicker_4").val(picker.startDate.format("MMMM D, YYYY") + " - " + picker.endDate
                        .format("MMMM D, YYYY"));
                    filterContacts(picker.startDate, picker.endDate);
                }
            });
    </script>
    <script>
        /*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                document.querySelector('.copy-script').addEventListener('click', function(e) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    e.preventDefault();

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    const domain = window.location.origin;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    const scriptContent = `<script src="${domain}/dashboard_css.js"><\/script>`;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    const tempTextArea = document.createElement('textarea');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    tempTextArea.value = scriptContent;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    document.body.appendChild(tempTextArea);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    tempTextArea.select();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    document.execCommand('copy');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    document.body.removeChild(tempTextArea);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    toastr.success("script copied successfully!")
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }); */


            //ajax call to filter contacts
            // Function to handle the filtering logic
            function filterContacts() {
                const user = document.getElementById('user-select').value;
                const source = document.getElementById('source-select').value;
                console.log(source);
                // const tag = document.getElementById('tags-select').value;
                const tag = '';
                // const startDate = document.getElementById('datepicker-range-start').value;
                // const endDate = document.getElementById('datepicker-range-end').value;
                const defaultLocationId = '0fu8c2Te17KqLDYyr8RE';
                // Combine the start and end dates into a single dateRange string if both are selected
                // const dateRange = startDate && endDate ? `${startDate} - ${endDate}` : '';

                const dateRange = $('#kt_daterangepicker_4').val();
                // Log values to check
                // console.log(`User: ${user}, Tag: ${tag}, Date Range: ${dateRange}`);

                // Ajax call to filter contacts
                filterLoader(true);

                $.ajax({
                    url: "{{ route('filter.contacts') }}",
                    type: 'GET',
                    data: {
                        location_id: defaultLocationId,
                        user: user,
                        source: source,
                        tag: tag,
                        dateRange: dateRange
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            let tcc = response.top_stats;
                            topContactsChart(tcc.contacts);
                            topSalesByMonths(tcc.sales);
                            initSalesChart(tcc)
                            initContactsDonutChart(tcc);
                            topAverageYearlySales(tcc.sales.year_wise_sale_count);
                            countryWiseCharts(tcc.countrywise);
                            if (response.html) {
                                document.querySelector('.conversiondiv').innerHTML =
                                    ''; // Clear the existing content
                                document.querySelector('.conversiondiv').innerHTML = response
                                    .html; // Set the new HTML content
                            }
                            if(response.source_channels != null){
                                $('.append_channel_sources').html(response.source_channels);
                                $('.source_channel_modals').html(response.source_channel_modals);
                            }

                        }
                    },
                    error: function(error) {
                        console.log(error);
                    },
                    complete: function() {
                        filterLoader(false);

                    }
                });
            }

            // Attach the change event listeners to the inputs
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('user-select').addEventListener('change', filterContacts);
                document.getElementById('source-select').addEventListener('change', filterContacts);
            });
            // document.getElementById('tags-select').addEventListener('change', filterContacts);
            // document.getElementById('datepicker-range-start').addEventListener('changeDate', filterContacts);
            document.getElementById('kt_daterangepicker_4').addEventListener('changeDate', filterContacts);


            // Document ready function to reset date range picker and trigger filter on load
            $(document).ready(function() {
                // Empty the date range picker fields on page load
                $('#kt_daterangepicker_4').val('');
                //filterContacts();
            });
    </script>


    {{-- Contact Stats Charts --}}
    <script>
        //chart assigned by user contacts donut chart
            function assignedByUser(assignedUserData) {
                var seriesData = [];
                var xaxisData = [];
                for (const [key, value] of Object.entries(assignedUserData)) {
                    xaxisData.push(key);
                    seriesData.push(Object.keys(value).length);
                }

                var options = {
                    series: seriesData,
                    chart: {
                        width: 480,
                        type: 'donut',
                    },
                    labels: xaxisData,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#contactsassignedchart"), options);
                chart.render();
            }

            //contact chart on the total contact card
            function allContactsByDate(datewiseContacts) {
                var dates = Object.keys(datewiseContacts);
                var counts = Object.values(datewiseContacts);

                var options = {
                    chart: {
                        type: 'line',
                        height: 280,
                        zoom: {
                            enabled: true,
                            type: 'x',
                            autoScaleYaxis: true
                        },
                        toolbar: {
                            autoSelected: 'zoom',
                            show: false
                        }
                    },
                    series: [{
                        name: 'Contacts',
                        data: counts
                    }],
                    xaxis: {
                        categories: dates,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value, timestamp) {
                                return value;
                            }
                        },
                        title: {
                            text: 'Date'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Number of Contacts'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    markers: {
                        size: 5
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // alternate row color
                            opacity: 0.5
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        }
                    },
                    fill: {
                        opacity: 0.8
                    }
                };

                var chart = new ApexCharts(document.querySelector("#contact_datewise"), options);
                chart.render();
            }


            function contactBasedOnTags(groupedContactsByTags) {
                var seriesData = [];
                Object.keys(groupedContactsByTags).forEach((tag) => {
                    var contactCount = Object.keys(groupedContactsByTags[tag]).length;
                    seriesData.push({
                        x: tag,
                        y: contactCount
                    });
                });

                var options = {
                    chart: {
                        type: 'area',
                        height: 280,
                        zoom: {
                            enabled: true,
                            type: 'x', // Enables zooming along the x-axis
                            autoScaleYaxis: true, // Automatically scales the Y-axis
                        },
                        toolbar: {
                            tools: {
                                zoomin: true,
                                zoomout: true,
                                pan: true,
                                reset: true
                            }
                        }
                    },
                    series: [{
                        name: 'Contacts by Tags',
                        data: seriesData
                    }],
                    xaxis: {
                        type: 'category',
                        title: {
                            text: 'Tags'
                        },
                        labels: {
                            rotate: -45 // Rotate labels for better readability
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Number of Contacts'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "Contacts: " + val;
                            }
                        },
                        x: {
                            formatter: function(val) {
                                return "Tag: " + val;
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#grouped_contacts_by_tags"), options);
                chart.render();
            }

            //total contacts count
            // function totalContacts(total_contacts) {
            //     $('.total_contacts').text(total_contacts);
            // }

            // function countryWiseChartsss(countryWiseContacts) {

            //     am5.ready(function() {

            //         console.log(countryWiseContacts);

            //         // Data for leads by country
            //         var leadData = countryWiseContacts;

            //         // Create root and chart
            //         var root = am5.Root.new("group_by_countries");

            //         // Set themes
            //         root.setThemes([am5themes_Animated.new(root)]);

            //         // Create chart
            //         var chart = root.container.children.push(am5map.MapChart.new(root, {
            //             homeZoomLevel: 0.5,
            //             homeGeoPoint: {
            //                 longitude: 10,
            //                 latitude: 52
            //             }
            //         }));

            //         // Create world polygon series
            //         var worldSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
            //             geoJSON: am5geodata_worldLow,
            //             exclude: ["AQ"]
            //         }));

            //         // Set up map polygons template
            //         worldSeries.mapPolygons.template.setAll({
            //             tooltipText: "{name}: {leads} leads",
            //             fill: am5.color(0xCCCCCC),
            //             nonScalingStroke: true,
            //             strokeOpacity: 0.5,
            //             strokeWidth: 0.5,
            //             label: 50
            //         });

            //         // Define color based on leads
            //         worldSeries.mapPolygons.template.adapters.add("fill", function(fill, target) {
            //             var dataItem = target.dataItem.dataContext;
            //             if (dataItem.leads > 0) {
            //                 return am5.color(0x00CC00); // Green color for countries with leads
            //             } else {
            //                 return am5.color(0xCCCCCC); // Grey color for countries with 0 or no leads
            //             }
            //         });

            //         // Add data to map
            //         worldSeries.data.setAll(leadData);

            //         worldSeries.events.on("datavalidated", () => {
            //             chart.goHome();
            //         });

            //     }); // end am5.ready()

            // }

            function countryWiseCharts(countryWiseContacts) {
                console.log("initialized map");
                console.log(countryWiseContacts);

                // Check if the root instance exists and dispose of it
                if (window.countryMapRoot) {
                    window.countryMapRoot.dispose();
                }

                am5.ready(function() {
                    // Create root and chart
                    var root = am5.Root.new("group_by_countries");

                    // Store the root instance in a global variable
                    window.countryMapRoot = root;

                    // Increase the size of the root container
                    root.container.setAll({
                        width: am5.percent(100),
                        height: am5.percent(100)
                    });

                    // Set themes
                    root.setThemes([am5themes_Animated.new(root)]);

                    // Create chart
                    var chart = root.container.children.push(am5map.MapChart.new(root, {
                        homeZoomLevel: 1.3, // Increase zoom level for a closer view
                        homeGeoPoint: {
                            longitude: 10, // Adjust longitude to center the map as desired
                            latitude: 52 // Adjust latitude to center the map as desired
                        }
                    }));

                    // Create world polygon series
                    var worldSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                        geoJSON: am5geodata_worldLow,
                        exclude: ["AQ"]
                    }));

                    // Set up map polygons template
                    worldSeries.mapPolygons.template.setAll({
                        tooltipText: "{name}: {leads} leads",
                        fill: am5.color(0xCCCCCC),
                        nonScalingStroke: true,
                        strokeOpacity: 0.5,
                        strokeWidth: 0.5
                    });

                    // Define color based on leads
                    worldSeries.mapPolygons.template.adapters.add("fill", function(fill, target) {
                        var dataItem = target.dataItem.dataContext;
                        if (dataItem.leads > 0) {
                            return am5.color("#1b84ff"); // Green color for countries with leads
                        } else {
                            return am5.color(0xCCCCCC); // Grey color for countries with 0 or no leads
                        }
                    });

                    // Add data to map
                    worldSeries.data.setAll(countryWiseContacts);

                    worldSeries.events.on("datavalidated", () => {
                        chart.goHome();
                    });
                }); // end am5.ready()
            }

            function filterLoader(showLoader = false) {
                let contactDiv = document.querySelector('.contacts_charts_container');
                let existingLoader = document.querySelector('.custom-loader');

                if (showLoader) {
                    // If no loader exists, create and append it
                    if (!existingLoader) {
                        let loader = document.createElement('div');
                        loader.className = 'custom-loader d-flex justify-content-center align-items-center';
                        loader.style.position = 'absolute';
                        loader.style.top = '0';
                        loader.style.left = '0';
                        loader.style.width = '100%';
                        loader.style.height = '100%';
                        loader.style.background = 'rgba(255, 255, 255, 0.8)';
                        loader.innerHTML = `
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`;
                        contactDiv.style.position = 'relative';
                        contactDiv.appendChild(loader);
                    }
                } else {
                    // Remove the loader if it exists
                    if (existingLoader) {
                        contactDiv.removeChild(existingLoader);
                    }
                }
            }


            function allChartsRender(response) {
                console.log(response.contact_stats, response.opportunities_stats, response.oppointment_stats, response
                    .call_stats);
                let assignedUserData = response.contact_stats['grouped_contacts'];
                let datewiseContacts = response.contact_stats['datewise_contacts'];
                let total_contacts = response.contact_stats['total_contacts'];
                let groupedContactsByTags = response.contact_stats['grouped_contacts_by_tags'];
                let conuntrywise = response.contact_stats['group_by_countries'];
                totalContacts(total_contacts);
                assignedByUser(assignedUserData);
                allContactsByDate(datewiseContacts);
                contactBasedOnTags(groupedContactsByTags);
                countryWiseCharts(conuntrywise);
                daywise_count(response.opportunities_stats['daywise_count']);
                opportunities_assigned_per_user(response.opportunities_stats['opportunities_assigned_per_user']);
                //opportunities_by_source(response.opportunities_stats['opportunities_by_source']);
                opportunities_by_status(response.opportunities_stats['opportunities_by_status']);
                monetary_value_distribution(response.opportunities_stats['monetary_value_distribution']);
                pipelinewiseopportunities(response.opportunities_stats['pipelineswise']);
                showTotalOpportunities(response.opportunities_stats['total_opportunities']);
                leadToSaleConversionChart(response.opportunities_stats['lead_to_sale']);
                appointments_by_status(response.oppointment_stats['appointments_by_status']);
                appointments_assigned_per_user(response.oppointment_stats['appointments_assigned_per_user']);
                appointments_by_source(response.oppointment_stats['appointments_by_source']);
                appointments_by_daywise(response.oppointment_stats['daywise_count']);
                showTotalAppointments(response.oppointment_stats['total_appointments']);
                appointments_by_calendars(response.oppointment_stats['appointments_by_calendars']);
                calls_by_daywise(response.call_stats['daywise_count']);
                showTotalCalls(response.call_stats['total_calls']);
            }

            //call all the charts
    </script>


    {{-- Opportunities Stats Charts --}}
    <script>
        function daywise_count(daywise_count) {
                var dates = Object.keys(daywise_count);
                var counts = Object.values(daywise_count);

                var options = {
                    chart: {
                        type: 'line',
                        height: 280,
                        zoom: {
                            enabled: true,
                            type: 'x',
                            autoScaleYaxis: true
                        },
                        toolbar: {
                            autoSelected: 'zoom',
                            show: false
                        }
                    },
                    series: [{
                        name: 'Opportunities',
                        data: counts
                    }],
                    xaxis: {
                        categories: dates,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value, timestamp) {
                                return value;
                            }
                        },
                        title: {
                            text: 'Date'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Number of Opportunities'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    markers: {
                        size: 5
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // alternate row color
                            opacity: 0.5
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        }
                    },
                    fill: {
                        opacity: 0.8
                    }
                };

                var chart = new ApexCharts(document.querySelector("#daywise_count_chart"), options);
                chart.render();
            }

            function opportunities_assigned_per_user(opportunities_assigned_per_user) {
                var seriesData = [];
                var xaxisData = [];
                for (const [key, value] of Object.entries(opportunities_assigned_per_user)) {
                    xaxisData.push(key);
                    seriesData.push(Object.keys(value).length);
                }

                var options = {
                    series: seriesData,
                    chart: {
                        width: 480,
                        type: 'donut',
                    },
                    labels: xaxisData,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#opportunities_assigned_per_user_chart"), options);
                chart.render();
            }


            function opportunities_by_status(opportunities_by_status) {

                var labels = Object.keys(opportunities_by_status);
                var values = Object.values(opportunities_by_status);

                var options = {
                    series: values,
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: labels,
                    colors: ['#FF4560', '#00E396'], // Adjust colors if necessary
                    dataLabels: {
                        enabled: true
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#opportunities_by_status_chart"), options);
                chart.render();
            }

            function monetary_value_distribution(data) {

                var dates = data.dates;
                var revenue_values = data.revenue;
                var lost_values = data.lost;
                var expected_values = data.expected;

                var options = {
                    series: [{
                            name: 'Revenue',
                            data: revenue_values
                        },
                        {
                            name: 'Lost',
                            data: lost_values
                        },
                        {
                            name: 'Expected',
                            data: expected_values
                        }
                    ],
                    chart: {
                        type: 'line',
                        height: 350
                    },
                    xaxis: {
                        categories: dates,
                        title: {
                            text: 'Date'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Amount'
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#monetary_value_distribution_chart"), options);
                chart.render();
            }

            //pipelines wise opportunities
            function pipelinewiseopportunities(pipelinesWise) {
                const pipelines = Object.keys(pipelinesWise);
                const stages = new Set();
                const seriesData = [];

                pipelines.forEach(pipeline => {
                    const stagesData = pipelinesWise[pipeline];
                    Object.keys(stagesData).forEach(stage => stages.add(stage));
                });

                const stageArray = Array.from(stages);

                stageArray.forEach(stage => {
                    seriesData.push({
                        name: stage,
                        data: pipelines.map(pipeline => {
                            return pipelinesWise[pipeline][stage] || 0;
                        })
                    });
                });

                const options = {
                    chart: {
                        type: 'bar',
                        height: 400,
                        stacked: true,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '60%',
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    series: seriesData,
                    xaxis: {
                        categories: pipelines,
                    },
                    yaxis: {
                        title: {
                            text: 'Number of Opportunities'
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                    }
                };

                const chart = new ApexCharts(document.querySelector("#pipelines_wise_chart"), options);
                chart.render();

            }

            function showTotalOpportunities(total_opportunities) {
                $('#total_opportunities').text(total_opportunities);
            }


            function leadToSaleConversionChart(leadToSale) {
                $('#total_opportunities_conversion').text(leadToSale.conversion_rate + '%');
                const chartOptions = {
                    chart: {
                        type: 'donut',
                        height:300
                    },
                    series: [
                        leadToSale.won,
                        leadToSale.contacts - leadToSale.won
                    ],
                    labels: ['Won Leads', 'Not Converted'],
                    colors: ['#1cc88a', '#e74a3b']
                };

                var chart = new ApexCharts(document.querySelector("#lead_to_sale_count_chart"), chartOptions);
                chart.render();
            }

            //call the charts
            // let opportunitiesStats = {!! json_encode($opportunities_stats) !!};
            // daywise_count(opportunitiesStats['daywise_count']);
            // opportunities_assigned_per_user(opportunitiesStats['opportunities_assigned_per_user']);
            // // opportunities_by_source(opportunitiesStats['opportunities_by_source']);
            // opportunities_by_status(opportunitiesStats['opportunities_by_status']);
            // monetary_value_distribution(opportunitiesStats['monetary_value_distribution']);
            // pipelinewiseopportunities(opportunitiesStats['pipelineswise']);
            // showTotalOpportunities(opportunitiesStats['total_opportunities']);
            // leadToSaleConversionChart(opportunitiesStats['lead_to_sale']);
    </script>


    {{-- Appointments Stats Charts --}}
    <script>
        /*
                                                                                                                                                                                                                                                                                                                                                                                                                      {"total_appointments":2,"appointments_by_status":{"confirmed":2},"appointments_by_source":{"booking_widget":1,"calendar_page":1},"appointments_assigned_per_user":{"Zulkifal Hassan":[],"Pervaiz Malik":[],"Usman Zaheer ":[],"Awais Saleem":[],"Muhammad Orhan":[],"Shoaib Sultan":[],"Abraham Peter":[],"Sabir Shah":[],"M Safian ":[],"Ali Hassan":[],"Ayaz Khan":[],"Awais Qarni":[],"Saqib Ali":[],"M Waseem":[],"Faiza Bibi":[],"Anwar Hussain":{"1":{"id":2,"ghl_appointment_id":"4ngL3x1hQ6HCmZ2P7c6T","location_id":"vcLxBfw01Nmv2VnlhtND","address":"https:\/\/us05web.zoom.us\/j\/85875585824?pwd=aJwbFon5VxBME9Za9NNox0xa0qpGyC.1","title":"Test Oppointment","calendar_id":"wmquOnn9rm2Su0KI16IO","contact_id":"btDRSwAYUrxjTwHx6hul","group_id":null,"appointment_status":"confirmed","assigned_user_id":"tAeeuUTKOCuOwo4jjzlo","users":null,"notes":null,"source":"calendar_page","start_time":"2024-08-20 10:00:00","end_time":"2024-08-20 10:30:00","date_added":"2024-08-19 18:40:30","date_updated":null,"deleted_at":null,"created_at":"2024-08-19T18:40:33.000000Z","updated_at":"2024-08-19T18:40:33.000000Z"}},"M Usman Ali":[],"Rehmat Faizan":[]},"daywise_count":{"2023-09-25":1,"2024-08-19":1},"appointments_by_calendars":{"faiza test neww":[],"appointment book 1":[],"robin calendar":[],"Robin calendar Safian":[],"haider":[],"Waseem training Pract-1":[],"Beard":[],"safian test":[],"faiza-new":[],"Practice-2":[],"faiza":[],"High Medium Low":[],"test anwar":[],"appointment book":[],"Book An Appointment":[],"book appointment":[],"Select Date And Time":[],"Sabir Roof Replacement Booking Calendar":[],"Simple calender":[],"SAA Delivery":[],"calander":[],"Sabir Free Roof Inspection Calendar":[],"simple calendar":[],"anwar multi members":[],"Faiza-simple calendar":[],"Cutting":[],"Collective":[],"Anwar calendar Test":[],"Neat Feat Podiatry Calender ":[],"Free Roof Inspection Calendar":[],"Bingo":[],"Unlock Your Business Potential with Expert Consultation!":[],"ali calander":[],"collective calendar":[],"test Anwar":[],"Appointment With Saqib":[],"Team Calendar":[],"class calendar":[],"faiza- practice":[],"appointment booking":[],"Cutting and Beard":[],"Anwaar 1st calender":[],"haider calander":[],"Bingo 2":[],"Faiza- round robin":[],"roof maintenance":[],"faiza-practice":[],"Round Robin":[],"Testing calendar":[],"anwar work":[{"id":1,"ghl_appointment_id":"0007BWpSzSwfiuSl0tR2","location_id":"vcLxBfw01Nmv2VnlhtND","address":"https:\/\/example.com\/meeting","title":"Appointment with GHL Dev team","calendar_id":"wmquOnn9rm2Su0KI16IO","contact_id":"vcLxBfw01Nmv2VnlhtND","group_id":"9NkT25Vor1v4aQatFsv2","appointment_status":"confirmed","assigned_user_id":"YlWd2wuCAZQzh2cH1fVZ","users":"[\"YlWd2wuCAZQzh2cH1fVZ\",\"9NkT25Vor1v4aQatFsv2\"]","notes":"Some dummy note","source":"booking_widget","start_time":"2023-09-25 16:00:00","end_time":"2023-09-25 16:00:00","date_added":"2023-09-25 16:00:00","date_updated":null,"deleted_at":null,"created_at":"2024-08-19T18:36:30.000000Z","updated_at":"2024-08-19T18:36:30.000000Z"},{"id":2,"ghl_appointment_id":"4ngL3x1hQ6HCmZ2P7c6T","location_id":"vcLxBfw01Nmv2VnlhtND","address":"https:\/\/us05web.zoom.us\/j\/85875585824?pwd=aJwbFon5VxBME9Za9NNox0xa0qpGyC.1","title":"Test Oppointment","calendar_id":"wmquOnn9rm2Su0KI16IO","contact_id":"btDRSwAYUrxjTwHx6hul","group_id":null,"appointment_status":"confirmed","assigned_user_id":"tAeeuUTKOCuOwo4jjzlo","users":null,"notes":null,"source":"calendar_page","start_time":"2024-08-20 10:00:00","end_time":"2024-08-20 10:30:00","date_added":"2024-08-19 18:40:30","date_updated":null,"deleted_at":null,"created_at":"2024-08-19T18:40:33.000000Z","updated_at":"2024-08-19T18:40:33.000000Z"}],"OutBound Calender":[]}}
                                                                                                                                                                                                                                                                                                                                                                                                                    */

            function appointments_by_status(appointments_by_status) {
                var labels = Object.keys(appointments_by_status);
                var values = Object.values(appointments_by_status);

                var options = {
                    series: values,
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: labels,
                    colors: ['#FF4560', '#00E396'], // Adjust colors if necessary
                    dataLabels: {
                        enabled: true
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#appointments_by_status_chart"), options);
                chart.render();
            }

            function appointments_assigned_per_user(appointments_assigned_per_user) {
                var seriesData = [];
                var xaxisData = [];
                for (const [key, value] of Object.entries(appointments_assigned_per_user)) {
                    xaxisData.push(key);
                    seriesData.push(Object.keys(value).length);
                }

                var options = {
                    series: seriesData,
                    chart: {
                        width: 480,
                        type: 'donut',
                    },
                    labels: xaxisData,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#appointments_assigned_per_user_chart"), options);
                chart.render();
            }

            function appointments_by_source(appointments_by_source) {
                var seriesData = [];
                var labels = [];

                Object.keys(appointments_by_source).forEach((source) => {
                    console.log(source);
                    console.log(appointments_by_source[source]);
                    var appointmentCount = appointments_by_source[source];
                    seriesData.push(appointmentCount);
                    labels.push(source);
                });


                var options = {
                    chart: {
                        type: 'pie',
                        height: 280
                    },
                    series: seriesData,
                    labels: labels,
                    colors: ['#f3a4b5', '#ffbb33', '#34bfa3'],
                    dataLabels: {
                        enabled: true
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "Appointments: " + val;
                            }
                        },
                        x: {
                            formatter: function(val) {
                                return "Source: " + val;
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#appointments_by_source_chart"), options);
                chart.render();
            }

            function appointments_by_daywise(appointments_by_daywise) {
                var dates = Object.keys(appointments_by_daywise);
                var counts = Object.values(appointments_by_daywise);

                var options = {
                    chart: {
                        type: 'line',
                        height: 280,
                        zoom: {
                            enabled: true,
                            type: 'x',
                            autoScaleYaxis: true
                        },
                        toolbar: {
                            autoSelected: 'zoom',
                            show: false
                        }
                    },
                    series: [{
                        name: 'Appointments',
                        data: counts
                    }],
                    xaxis: {
                        categories: dates,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value, timestamp) {
                                return value;
                            }
                        },
                        title: {
                            text: 'Date'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Number of Appointments'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    markers: {
                        size: 5
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // alternate row color
                            opacity: 0.5
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        }
                    },
                    fill: {
                        opacity: 0.8
                    }
                };

                var chart = new ApexCharts(document.querySelector("#appointment_by_daywise"), options);
                chart.render();
            }


            //appointment calendars
            function appointments_by_calendars(appointments_by_calendars) {
                var labels = [];
                var data = [];

                // Transform data for the polar area chart
                Object.keys(appointments_by_calendars).forEach((calendar) => {
                    var appointmentCount = Object.keys(appointments_by_calendars[calendar]).length;
                    labels.push(calendar);
                    data.push(appointmentCount);
                });

                var options = {
                    chart: {
                        type: 'polarArea',
                        height: 500
                    },
                    series: data,
                    labels: labels,
                    colors: ['#f3a4b5', '#ffbb33', '#34bfa3', '#ff4560', '#00e396', '#775dd0', '#546e7a', '#d4526e',
                        '#308a6d', '#a5b1c2'
                    ],
                    dataLabels: {
                        enabled: true,
                        style: {
                            colors: ['#000'] // Adjust color for better contrast
                        }
                    },
                    plotOptions: {
                        polarArea: {
                            rings: {
                                strokeWidth: 0 // Optional: Hide the rings
                            }
                        }
                    },
                    legend: {
                        position: 'bottom' // Place legend at the bottom
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "Appointments: " + val;
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 400 // Adjust height on smaller screens
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#appointments_calendar_wise_chart"), options);
                chart.render();
            }
function showTopbarStats(){
    document.addEventListener('DOMContentLoaded', function() {
        const classNames = ['.calls', '.online_meet', '.in_person_meet', '.viewing', '.sale']; // Your new class names
        const dateElements = document.querySelectorAll('.fw-semibold.fs-6.text-white'); // Select all the elements with the class
        classNames.forEach((element, index) => {
            let originalText = document.querySelector(element).innerText;
            let updatedText = originalText.replace('total','|').trim();
            classNames[index]=updatedText;

        });
        dateElements.forEach((element, index) => {
            const originalText = element.innerText;
            if (index < classNames.length) {
                element.innerHTML = classNames[index];
            }
        });
    });
}
showTopbarStats();
            function showTotalAppointments(total_appointments) {
                $('#appointments_by_source').text(total_appointments);
            }

            //call the charts
            // let appointmentsStats = {!! json_encode($oppointment_stats) !!};
            // console.log(appointmentsStats);
            // appointments_by_status(appointmentsStats['appointments_by_status']);
            // appointments_assigned_per_user(appointmentsStats['appointments_assigned_per_user']);
            // appointments_by_source(appointmentsStats['appointments_by_source']);
            // appointments_by_daywise(appointmentsStats['daywise_count']);
            // showTotalAppointments(appointmentsStats['total_appointments']);
            // appointments_by_calendars(appointmentsStats['appointments_by_calendars']);
    </script>


    {{-- Calls Stats Charts --}}
    <script>
        function calls_by_daywise(calls_by_daywise) {
                var dates = Object.keys(calls_by_daywise);
                var counts = Object.values(calls_by_daywise);

                var options = {
                    chart: {
                        type: 'line',
                        height: 280,
                        zoom: {
                            enabled: true,
                            type: 'x',
                            autoScaleYaxis: true
                        },
                        toolbar: {
                            autoSelected: 'zoom',
                            show: false
                        }
                    },
                    series: [{
                        name: 'Calls',
                        data: counts
                    }],
                    xaxis: {
                        categories: dates,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value, timestamp) {
                                return value;
                            }
                        },
                        title: {
                            text: 'Date'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Number of Calls'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    markers: {
                        size: 5
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // alternate row color
                            opacity: 0.5
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        }
                    },
                    fill: {
                        opacity: 0.8
                    }
                };

                var chart = new ApexCharts(document.querySelector("#calls_by_daywise"), options);
                chart.render();
            }

            function showTotalCalls(total_calls) {
                $('#total_calls').text(total_calls);
            }

            //call the charts
            // let callsStats = {!! json_encode($call_stats) !!};
            // calls_by_daywise(callsStats['daywise_count']);
            // showTotalCalls(callsStats['total_calls']);
    </script>

    {{-- top stats charts --}}

    <script>
        function topContactsChart(topStats) {
                // Update the total contacts display
                document.querySelector('.top_total_contact').innerHTML = topStats?.total_contacts ?? ''



                // Define the options for the new chart
                var options = {
                    dataLabels: {
                        enabled: false,
                        formatter: function(val) {
                            return val + "%"
                        },

                    },
                    chart: {
                        type: 'donut',
                        height: 120, // Keep the height as is to fit within the card
                        width: '100%',
                        events: {
                            mounted: function(chartContext, config) {
                                // After the chart is rendered, replace the class
                                var legendTexts = document.querySelectorAll('.apexcharts-legend-text');
                                legendTexts.forEach(function(legendText) {
                                    legendText.classList.remove('apexcharts-legend-text');
                                    legendText.classList.add('text-gray-500', 'flex-grow-1', 'me-4', "fs-6",
                                        "gap-4", "d-flex", "align-item-center", "justify-between");
                                });

                            }
                        } // Ensure the chart fits within the card's width
                    },
                    series: [
                        topStats.leads,
                        topStats.agencies,
                        topStats.sollicitants,
                        topStats.no_tags,
                    ],
                    labels: [
                        'Leads',
                        'Agencies',
                        'Sollicitants',
                        'No Tags',
                    ],
                    colors: ["#f8285a", "#1b84ff", "#e4e6ef"],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '60%'
                            }
                        }
                    },
                    legend: {
                        position: 'right', // Position the legend to the right of the chart
                        fontSize: '10px', // Adjust the font size to fit the legend within the small card
                        offsetY: 0, // Ensure the legend is vertically centered
                        itemMargin: {
                            horizontal: 0,
                            vertical: 4
                        },
                        formatter: function(seriesName, opts) {
                            return `
                                 <div style="font-weight:600">${seriesName}</div>
                                 <div class="fw-bolder text-gray-700 text-xxl-end fs-6">${opts.w.globals.series[opts.seriesIndex]}</div>
                                `;
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                height: 200 // Reduce the height on smaller screens
                            },
                            legend: {
                                position: 'bottom', // Move legend below on smaller screens
                                offsetY: 0,
                                itemMargin: {
                                    horizontal: 5,
                                    vertical: 5
                                }
                            }
                        }
                    }]
                };
                if (window.topContactsChartInstance) {
                    window.topContactsChartInstance.destroy();
                }
                // Create and render the new chart, storing the instance globally
                window.topContactsChartInstance = new ApexCharts(document.querySelector("#top_contacts_chart"), options);
                window.topContactsChartInstance.render();
            }






            function top_opportunities_by_status(total = 0, opportunities_by_status) {
                document.querySelector('.top_total_opportunity').innerHTML = total;
                var labels = Object.keys(opportunities_by_status);
                var values = Object.values(opportunities_by_status);

                var options = {
                    series: values,
                    chart: {
                        type: 'donut',
                        height: 180
                    },
                    labels: labels,
                    dataLabels: {
                        enabled: true
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 180,
                        options: {
                            chart: {
                                height: 180
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#top_opportunities_chart"), options);
                chart.render();
            }

            function top_appointments_by_status(total = 0, appointments_by_status) {
                document.querySelector('.top_total_oppointments').innerHTML = total;
                var labels = Object.keys(appointments_by_status);
                var values = Object.values(appointments_by_status);

                var options = {
                    series: values,
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: labels,
                    colors: ['#FF4560', '#00E396'], // Adjust colors if necessary
                    dataLabels: {
                        enabled: true
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#top_total_appointments"), options);
                chart.render();
            }

            function topSalesByMonths(saleByMonth) {
                // Update the total sales display
                document.querySelector('.top_total_sales').innerText = saleByMonth.total;

                // Extract dates and counts from the saleByMonth object
                var dates = Object.keys(saleByMonth.won_opportunities).map(dateString => {
                    var date = new Date(dateString);
                    return date.toLocaleDateString('en-US', {
                        month: 'short',
                        day: '2-digit'
                    });
                });
                var counts = Object.values(saleByMonth.won_opportunities);

                // Destroy the existing chart if it exists
                if (window.topSalesChart) {
                    window.topSalesChart.destroy();
                }

                // Define the options for the new chart
                var options = {
                    chart: {
                        type: 'area',
                        height: 350,
                        zoom: {
                            enabled: true,
                            type: 'x',
                            autoScaleYaxis: false
                        },
                        toolbar: {
                            autoSelected: 'zoom',
                            show: false
                        },
                    },
                    series: [{
                        name: 'Total Sales',
                        data: counts
                    }],
                    colors: ['#17c653'],
                    xaxis: {
                        categories: dates,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value, timestamp) {
                                return value;
                            }
                        },

                    },
                    yaxis: {

                        labels: {
                            formatter: function(value) {
                                return `€${value} K`; // Format y-axis labels as $count K
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    markers: {
                        size: 0,
                        hover: {
                            size: 0
                        }
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        strokeDashArray: 5,
                        row: {
                            colors: ['transparent', 'transparent'],
                            opacity: 0.5
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        }
                    },
                    plotOptions: {
                        line: {
                            dropShadow: {
                                enabled: true,
                                top: 3,
                                left: 3,
                                blur: 4,
                                opacity: 0.2
                            }
                        }
                    }
                };

                // Create and render the new chart, storing the instance globally
                window.topSalesChart = new ApexCharts(document.querySelector("#top_sales_chart"), options);
                window.topSalesChart.render();
            }

            function top_calls_by_status(total = 0, calls_by_status) {
                document.querySelector('.top_total_calls').innerHTML = total;
                var labels = Object.keys(calls_by_status);
                var values = Object.values(calls_by_status);

                var options = {
                    series: values,
                    chart: {
                        type: 'donut',
                        height: 350
                    },
                    labels: labels,
                    colors: ['#FF4560', '#00E396'], // Adjust colors if necessary
                    dataLabels: {
                        enabled: true
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            chart: {
                                height: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#top_total_calls"), options);
                chart.render();
            }

            function topAverageYearlySales(dailySalesPercentages) {
                // Calculate the total sum of the percentages
                const total = Object.values(dailySalesPercentages).reduce((sum, value) => sum + value, 0);
                {{--  console.log('ye total haa' + total);  --}}
                document.querySelector('.AverageYearlySales').innerText = '€ ' + total;

                // Extract labels and data from the dailySalesPercentages object
                const labels = Object.keys(dailySalesPercentages);
                const data = Object.values(dailySalesPercentages);

                // Destroy the existing chart if it exists
                if (window.topAvgDailySalesChart) {
                    window.topAvgDailySalesChart.destroy();
                }

                // Define the options for the new chart
                const options = {
                    chart: {
                        type: 'bar',

                        offsetY: -20, // Move chart upwards
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: 'Yearly Sales Percentages',
                        data: data
                    }],
                    plotOptions: {
                        bar: {
                            borderRadius: 10, // Rounded bars for a "bullet" look
                            columnWidth: '10%', // Thin bars
                            distributed: false // Colors for each bar
                        }
                    },
                    xaxis: {
                        categories: labels,
                        labels: {
                            rotate: -45, // Rotate labels for readability
                            style: {
                                colors: '#333' // Label color
                            }
                        },
                        axisBorder: {
                            show: false // Hide x-axis border
                        },
                        axisTicks: {
                            show: false // Hide x-axis ticks
                        },
                    },
                    yaxis: {
                        labels: {
                            show: false, // Hide y-axis labels
                            style: {
                                colors: '#333' // Label color
                            }
                        }
                    },
                    grid: {
                        show: false // Hide grid lines
                    },
                    dataLabels: {
                        enabled: false // Hide data labels
                    },
                    legend: {
                        show: false // Hide legend
                    }
                };


                // Create and render the new chart, storing the instance globally
                // window.topAvgDailySalesChart = new ApexCharts(document.querySelector("#top_avg_daily_sales_chart"), options);
                // window.topAvgDailySalesChart.render();
            }

            function numberFormatShort(n, precision = 1) {
                let suffix = '';
                let plus = '';
                let nFormat;
                if (n < 900) {
                    // 0 - 900
                    nFormat = n.toLocaleString();
                } else if (n < 900000) {
                    // 0.9k - 850k
                    nFormat = (n / 1000).toFixed(precision);
                    suffix = 'K';
                } else if (n < 900000000) {
                    // 0.9m - 850m
                    nFormat = (n / 1000000).toFixed(precision);
                    suffix = 'M';
                } else if (n < 900000000000) {
                    // 0.9b - 850b
                    nFormat = (n / 1000000000).toFixed(precision);
                    suffix = 'B';
                } else {
                    // 0.9t+
                    nFormat = (n / 1000000000000).toFixed(precision);
                    suffix = 'T';
                }
                // Append "+" sign if number is rounded (for example, 1.2 becomes 1+)
                if (parseFloat(nFormat).toFixed(precision) != Math.floor(nFormat)) {
                    plus = '+';
                }
                // Remove unnecessary decimals (for example, 1.0 becomes 1)
                if (precision > 0) {
                    nFormat = nFormat.replace(/\.0+$/, '').replace(/(\.[0-9]*[1-9])0+$/, '$1');
                }
                return nFormat + suffix + plus;
            }

            function initContactsDonutChart(all_data) {
                // Chart data setup
                let chartData = {
                    labels: ['Leads', 'Agencies', 'Sollicitants', 'No Tags'],
                    values: [
                        all_data.contacts.leads,
                        all_data.contacts.agencies,
                        all_data.contacts.sollicitants,
                        all_data.contacts.no_tags
                    ],
                    colors: ['#F8285A', '#1B84FF', '#1CC88A', '#9C27B0']
                };
                let formattedContactCount =  numberFormatShort(all_data.contacts.total_contacts);

                // Update the HTML elements for the counts
                document.querySelector('.top_total_contacts_count').innerText = formattedContactCount;
                document.querySelector('.top_total_contacts_count').setAttribute('title', all_data.contacts.total_contacts);
                document.querySelector('.top_total_contacts_count').setAttribute('data-bs-original-title', all_data.contacts.total_contacts);
                document.querySelector('.top_total_leads_count').innerText = all_data.contacts.leads;
                document.querySelector('.top_total_agencies_count').innerText = all_data.contacts.agencies;
                document.querySelector('.top_total_sollicitants_count').innerText = all_data.contacts.sollicitants;
                document.querySelector('.top_total_notags_count').innerText = all_data.contacts.no_tags;
                // Initialize chart
                function _init() {
                    var chart = document.getElementById("myownchart");
                    if (!chart) {
                        return;
                    }
                    var options = {
                        series: chartData.values,
                        chart: {
                            type: 'donut',
                            height: 135,
                            toolbar: {
                                show: false
                            }
                        },
                        labels: chartData.labels, // Labels for each segment
                        colors: chartData.colors, // Custom colors for the chart segments
                        dataLabels: {
                            enabled: false // Disable data labels
                        },
                        legend: {
                            show: false // Disable the legend
                        },
                        stroke: {
                            width: 0
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: false, // Show inner labels
                                        name: {
                                            show: true,
                                            fontSize: '14px',
                                            fontFamily: 'Inter, sans-serif',
                                            color: undefined,
                                            offsetY: -10
                                        },
                                        value: {
                                            show: false,
                                            fontSize: '14px',
                                            fontFamily: 'Inter, sans-serif',
                                            color: undefined,
                                            offsetY: 10,
                                            formatter: function(val) {
                                                return val; // Show value only
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        tooltip: {
                            enabled: true, // Disable tooltips on hover
                            y: {
                                formatter: function(val) {
                                    return val; // Show value without $ sign
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    height: 150 // Adjust height for smaller screens
                                }
                            }
                        }]
                    };
                    // Render the chart
                    var chartInstance = new ApexCharts(chart, options);
                    chartInstance.render();
                }
                // Call the init function to render the chart
                _init();
            }

            function initSalesChart(tcc) {
                // Total sales additions

                // Private method: Initializes the chart
                var initChart = function() {
                    var element = document.getElementById("ownsaleschart");
                    if (!element) {
                        return;
                    }
                    // Data from the given object
                    var salesData = tcc.sales.year_wise_sale_count;
                    // Extract years and values for the chart
                    var years = Object.keys(salesData);
                    var values = Object.values(salesData);

                    let years_count = years.length;
                    //values count is sum of values
                    let values_sum = values.reduce((a, b) => a + b, 0);

                    let avgSale = values_sum / years_count;
                    if (isNaN(avgSale)) {
                        avgSale = 0;
                    }
                    let ttsc_elem =  document.querySelector('.top_total_sales_count');
                    let formattedAvgSale =  numberFormatShort(avgSale.toFixed(2));
                    ttsc_elem.innerText = formattedAvgSale;
                    ttsc_elem.setAttribute('title', avgSale.toFixed(2));
                    ttsc_elem.setAttribute('data-bs-original-title', avgSale.toFixed(2));



                    var height = parseInt(KTUtil.css(element, 'height'));
                    var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
                    var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
                    var baseColor = KTUtil.getCssVariableValue('--bs-primary');
                    var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');
                    var options = {
                        series: [{
                            name: 'Sales',
                            data: values
                        }],
                        chart: {
                            fontFamily: 'inherit',
                            type: 'bar',
                            height: height,
                            toolbar: {
                                show: false
                            },
                            sparkline: {
                                enabled: true
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: ['55%'],
                                borderRadius: 6
                            }
                        },
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 9,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: years,
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false,
                                tickPlacement: 'between'
                            },
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '12px'
                                }
                            },
                            crosshairs: {
                                show: false
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '12px'
                                }
                            }
                        },
                        fill: {
                            type: 'solid'
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: false,
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: '12px'
                            },
                            x: {
                                formatter: function(val) {
                                    return 'Year: ' + val;
                                }
                            },
                            y: {
                                formatter: function(val) {
                                    return val.toFixed(2); // Display value with 2 decimal places
                                }
                            }

                        },
                        colors: [baseColor, secondaryColor],
                        grid: {
                            padding: {
                                left: 10,
                                right: 10
                            },
                            borderColor: borderColor,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        }
                    };
                    var chart = new ApexCharts(element, options);
                    chart.render();
                    // Set timeout to properly get the parent element's width
                    {{--  setTimeout(function() {

                    }, 300);  --}}
                };
                // Call the initChart function to render the chart
                initChart();
            }




            // top_opps_by_assign_user_chart




            let tcc = @json($top_stats);


            topContactsChart(tcc.contacts);
            topSalesByMonths(tcc.sales);
            topAverageYearlySales(tcc.sales.year_wise_sale_count);
            countryWiseCharts(tcc.countrywise);

            //newly added
            initContactsDonutChart(tcc);
            initSalesChart(tcc);



            // top_opportunities_by_status(tcc.totaloppor, tcc.opportunities);
            // top_appointments_by_status(tcc.totaloppo, tcc.appointments);
            // top_calls_by_status(tcc.totalcalls, tcc.calls);
    </script>
    <script>
        $(document).ready(function() {
                $('#user-select').select2({
                    placeholder: 'Select User',
                    allowClear: true
                });
            });


            $('body').on('change', '#user-select', function() {
                filterContacts();
            })
    </script>
    @endif


    <script>
        // var KTCardsWidget4 = function() {
        //     // Private properties
        //     var _element;

        //     // Sample data for the chart
        //     var chartData = {
        //         values: [7660, 2820, 45257, 12345], // Values for the chart
        //         colors: ['#f8285a', '#1b84ff', '#E4E6EF', '#9c27b0'] // Colors for the chart segments and bullets
        //     };

        //     // Private methods
        //     var _init = function() {
        //         var chart = document.getElementById("myownchart");
        //         var chartParent = chart.parentElement;

        //         var height = 150; // Adjust height to fit better within the card

        //         if (!chart) {
        //             return;
        //         }

        //         var options = {
        //             series: chartData.values, // Use dynamic data for the chart
        //             chart: {
        //                 type: 'donut',
        //                 height: height,
        //                 toolbar: {
        //                     show: false
        //                 }
        //             },
        //             dataLabels: {
        //                 enabled: false // Disable the internal labels
        //             },
        //             legend: {
        //                 show: false // Disable legend display
        //             },
        //             labels: chartData.values.map((_, index) =>
        //             //label title with value
        //             `${chartData.values[index]}`
        //             ),
        //             colors: chartData.colors, // Custom colors matching the bullets
        //             stroke: {
        //                 width: 0
        //             },
        //             plotOptions: {
        //                 pie: {
        //                     donut: {
        //                         labels: {
        //                             show: false // Disable the inner labels like name and value
        //                         }
        //                     }
        //                 }
        //             },
        //             tooltip: {
        //                 enabled: true, // Enable tooltips on hover
        //                 y: {
        //                     formatter: function(val) {
        //                         return val; // Show value without $ sign
        //                     }
        //                 }
        //             },
        //             responsive: [{
        //                 breakpoint: 480,
        //                 options: {
        //                     chart: {
        //                         height: 200 // Adjust height for smaller screens
        //                     }
        //                 }
        //             }]
        //         };

        //         // Render the chart
        //         var chart = new ApexCharts(chart, options);
        //         chart.render();

        //         // Update HTML labels with dynamic values
        //         var labelElements = document.querySelectorAll('[id^="label-"][id$="-value"]');
        //         labelElements.forEach((element, index) => {
        //             if (chartData.values[index] !== undefined) {
        //                 element.innerText = chartData.values[index].toLocaleString();
        //                 element.previousElementSibling.style.backgroundColor = chartData.colors[
        //                 index]; // Set bullet color
        //             }
        //         });
        //     }

        //     // Public methods
        //     return {
        //         init: function(element) {
        //             _element = element;
        //             _init();
        //         }
        //     }
        // }();

        {{--  var KTCardsWidget4 = function() {
            // Private properties
            var _element;
            let all_data = tcc;
            // console.log(tcc.contacts);

            let chartData = {
                labels: ['Leads', 'Agencies', 'Sollicitants', 'No Tags'],
                values: [
                    all_data.contacts.leads,
                    all_data.contacts.agencies,
                    all_data.contacts.sollicitants,
                    all_data.contacts.no_tags
                ],

                colors: ['#f8285a', '#1b84ff', '#1cc88a', '#9c27b0']
            };

            //update the htmls for the counts
            $('.top_total_contacts_count').text(all_data.contacts.total_contacts);
            $('.top_total_leads_count').text(all_data.contacts.leads);
            $('.top_total_agencies_count').text(all_data.contacts.agencies);
            $('.top_total_sollicitants_count').text(all_data.contacts.sollicitants);
            $('.top_total_notags_count').text(all_data.contacts.no_tags);

            // Private methods
            var _init = function() {
                var chart = document.getElementById("myownchart");

                if (!chart) {
                    return;
                }

                var options = {
                    series: chartData.values,
                    chart: {
                        type: 'donut',
                        height: 135,
                        toolbar: {
                            show: false
                        }
                    },
                    labels: chartData.labels, // Labels for each segment
                    colors: chartData.colors, // Custom colors for the chart segments
                    dataLabels: {
                        enabled: false // Enable data labels
                    },
                    legend: {
                        show: false // Disable the legend
                    },
                    stroke: {
                        width: 0
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true, // Show inner labels
                                    name: {
                                        show: true,
                                        fontSize: '14px',
                                        fontFamily: 'Inter, sans-serif',
                                        color: undefined,
                                        offsetY: -10
                                    },
                                    value: {
                                        show: true,
                                        fontSize: '14px',
                                        fontFamily: 'Inter, sans-serif',
                                        color: undefined,
                                        offsetY: 10,
                                        formatter: function(val) {
                                            return val; // Show value only
                                        }
                                    }
                                }
                            }
                        }
                    },
                    tooltip: {
                        enabled: false, // Enable tooltips on hover
                        y: {
                            formatter: function(val) {
                                return val; // Show value without $ sign
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                height: 150 // Adjust height for smaller screens
                            }
                        }
                    }]
                };

                // Render the chart
                var chartInstance = new ApexCharts(chart, options);
                chartInstance.render();

            }

            // Public methods
            return {
                init: function(element) {
                    _element = element;
                    _init();
                }
            }
        }();  --}}

            {{--Widget 4    --}}




        //sales chart
        // Class definition
        /*
        var KTCardsWidget6 = function() {

            //total sales additions
            document.querySelector('.top_total_sales_count').innerText = tcc.sales.total;

            // Private methods
            var initChart = function() {
                var element = document.getElementById("ownsaleschart");

                if (!element) {
                    return;
                }

                // Data from the given object
                var salesData = tcc.sales.year_wise_sale_count;

                // Extract years and values for the chart
                var years = Object.keys(salesData);
                var values = Object.values(salesData);

                var height = parseInt(KTUtil.css(element, 'height'));
                var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
                var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
                var baseColor = KTUtil.getCssVariableValue('--bs-primary');
                var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');

                var options = {
                    series: [{
                        name: 'Sales',
                        data: values
                    }],
                    chart: {
                        fontFamily: 'inherit',
                        type: 'bar',
                        height: height,
                        toolbar: {
                            show: false
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: ['55%'],
                            borderRadius: 6
                        }
                    },
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 9,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: years,
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false,
                            tickPlacement: 'between'
                        },
                        labels: {
                            style: {
                                colors: labelColor,
                                fontSize: '12px'
                            }
                        },
                        crosshairs: {
                            show: false
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: labelColor,
                                fontSize: '12px'
                            }
                        }
                    },
                    fill: {
                        type: 'solid'
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px'
                        },
                        x: {
                            formatter: function(val) {
                                return 'Year: ' + val;
                            }
                        },
                        y: {
                            formatter: function(val) {
                                return val; // No $ sign, just the value
                            }
                        }
                    },
                    colors: [baseColor, secondaryColor],
                    grid: {
                        padding: {
                            left: 10,
                            right: 10
                        },
                        borderColor: borderColor,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: true
                            }
                        }
                    }
                };

                var chart = new ApexCharts(element, options);

                // Set timeout to properly get the parent element's width
                setTimeout(function() {
                    chart.render();
                }, 300);
            }

            // Public methods
            return {
                init: function() {
                    initChart();
                }
            }
        }(); */



        //loader for source channel
        function dynamicLoader(customclass, showLoader = false) {
            let contactDiv = document.querySelector('.' + customclass);
            let existingLoader = document.querySelector('.custom-loader');
            if (showLoader) {
                // If no loader exists, create and append it
                if (!existingLoader) {
                    let loader = document.createElement('div');
                    loader.className = 'custom-loader d-flex justify-content-center align-items-center';
                    loader.style.position = 'absolute';
                    loader.style.top = '0';
                    loader.style.left = '0';
                    loader.style.width = '100%';
                    loader.style.height = '100%';
                    loader.style.background = 'rgba(255, 255, 255, 0.8)';
                    loader.innerHTML = `
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
                    contactDiv.style.position = 'relative';
                    contactDiv.appendChild(loader);
                }
            } else {
                // Remove the loader if it exists
                if (existingLoader) {
                    contactDiv.removeChild(existingLoader);
                }
            }
        }
        //ajax call for source channels
        function sourceChannelData() {
            console.log("new source channel data script loaded");
            var user_id = $('#user-select').val();
            var url = "{{ route('channel.sources') }}";
            var data = {
                user_id: user_id,
                date_range: $('#date_range').val(),
                source: $('#source').val(),
            };
            //loader
            dynamicLoader('append_channel_sources', true);
            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                success: function(response) {
                    if (response.status == 'success') {
                        $('.append_channel_sources').html(response.source_channels);
                        $('.source_channel_modals').html(response.source_channel_modals);
                    }
                },
                error: function(error) {
                    console.log(error);
                },
                complete: function() {
                    dynamicLoader('append_channel_sources', false);
                }
            });
        }
        $(document).ready(function() {
            setTimeout(() => {
                sourceChannelData();
            }, 1000);
        });
        $(document).ready(function() {
    // Check if toggle state exists in localStorage
    let toggleState = localStorage.getItem('headingSwitchState');
    // If state exists, set the checkbox accordingly
    if (toggleState === 'on') {
        $('#flexSwitch20x30').prop('checked', true);
        $('.show_sales').show();
        $('.show_source').hide();
    } else {
        $('#flexSwitch20x30').prop('checked', false);
        $('.show_sales').hide();
        $('.show_source').show();
    }
    // Handle toggle switch change
    $('#flexSwitch20x30').on('change', function() {
        if ($(this).is(':checked')) {
            $('.show_sales').show();
            $('.show_source').hide();
            localStorage.setItem('headingSwitchState', 'on');
        } else {
            $('.show_sales').hide();
            $('.show_source').show();
            localStorage.setItem('headingSwitchState', 'off');
        }
    });
});
    </script>
    <script>
        $(document).ready(function() {
            // Check if toggle state exists in localStorage
            let toggleState = localStorage.getItem('headingSwitchState');
            // If state exists, set the checkbox accordingly
            if (toggleState === 'on') {
                $('#flexSwitch20x30').prop('checked', true);
                $('.show_sales').show();
                $('.show_source').hide();
            } else {
                $('#flexSwitch20x30').prop('checked', false);
                $('.show_sales').hide();
                $('.show_source').show();
            }
        // Handle toggle switch change
        $('#flexSwitch20x30').on('change', function() {
            if ($(this).is(':checked')) {
                $('.show_sales').show();
                $('.show_source').hide();
                localStorage.setItem('headingSwitchState', 'on');
            } else {
                $('.show_sales').hide();
                $('.show_source').show();
                localStorage.setItem('headingSwitchState', 'off');
            }
        });
    });
    </script>
    @endsection
