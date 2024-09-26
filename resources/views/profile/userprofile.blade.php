@extends('layouts.app')
@section('title')
    Profile Settings
@endsection


@section('content')
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <div class="row">
                <div class="col-md-8">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ asset($user->photo) }}" alt="image">
                            </div>
                        </div>
                        <!--end::Pic-->

                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#"
                                            class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ ucwords($user->first_name . ' ' . $user->last_name) }}</a>
                                        <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span
                                                    class="path1"></span><span class="path2"></span></i></a>
                                    </div>
                                    <!--end::Name-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i>
                                            {{ $user->roles->first()->name ?? 'User' }}
                                        </a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-geolocation  fs-4 me-1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            {{ $user->location_id ?? '' }}
                                        </a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4"><span class="path1"></span><span
                                                    class="path2"></span></i> {{ $user->email }}
                                        </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->

                            </div>
                            <!--end::Title-->

                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $calls_count ?? 0 }}"
                                                    data-kt-countup-prefix="#" data-kt-initialized="1">
                                                    {{ $calls_count ?? 0 }}</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Contacts</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $opportunities_count ?? 0 }}"
                                                    data-kt-initialized="1">{{ $opportunities_count ?? 0 }}</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Opportunities</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">

                                                <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $oppointments_count ?? 0 }}"
                                                    data-kt-countup-prefix="#" data-kt-initialized="1">
                                                    {{ $oppointments_count ?? 0 }}</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Appointments</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">

                                                <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $calls_count ?? 0 }}"
                                                    data-kt-countup-prefix="%" data-kt-initialized="1">
                                                    {{ $calls_count ?? 0 }}</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Calls</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Stats-->

                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->

                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold"
                        id="myTab" role="tablist">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" id="overview-tab"
                                data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview"
                                aria-selected="true">
                                Overview
                            </a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" id="settings-tab"
                                data-bs-toggle="tab" href="#settings" role="tab" aria-controls="settings"
                                aria-selected="false">
                                Settings
                            </a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" id="security-tab"
                                data-bs-toggle="tab" href="#security" role="tab" aria-controls="security"
                                aria-selected="false">
                                Security
                            </a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--end::Navs-->
                </div>

                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- overview --}}
    <!--begin::Tab content-->
    <div class="tab-content" id="myTabContent">
        <!--begin::Overview tab-->
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->


                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ full_name($user)  }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                     <!--begin::Row-->
                     <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Email</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->email  }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                     <!--begin::Row-->
                     <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Location ID</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->location_id  }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->


                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Company</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">

                            <span class="fw-semibold text-gray-800 fs-6">{{ full_name($user) }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Contact Phone
                        </label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ $user->phone ?? '' }}</span>
                            <span class="badge badge-success">Verified</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Company Site</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ url('/') }}</a>
                        </div>
                        <!--end::Col-->
                    </div>

                       <!--begin::Input group-->
                       <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Created Since</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->created_at->diffForHumans() }}</span>
                        </div>
                        <!--end::Col-->
                    </div>


                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Overview tab-->
        <!--begin::Settings tab-->
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        method="POST" action="{{ route('profile.save') }}" enctype="multipart/form-data">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset($user->photo) }}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ asset($user->photo) }})">
                                        </div>
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            aria-label="Change avatar" data-bs-original-title="Change avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="avatar_remove">
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Cancel-->

                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <input type="text" name="first_name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="First name" value="{{ $user->first_name }}">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <input type="text" name="last_name"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Last name" value="{{ $user->last_name }}">
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="text" name="company"
                                        class="form-control form-control-lg form-control-solid" readonly placeholder="Company name"
                                        value="{{ full_name($user) }}">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Contact Phone</span>


                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        aria-label="Phone number must be active"
                                        data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span></i></span> </label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="tel" name="phone"
                                        class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                        value="{{ $user->phone }}">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Location ID</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="location_id"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Company website" value="{{ $user->location_id }}">
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                             <!--begin::Input group-->
                             <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea name="address" class="form-control form-control-lg form-control-solid"
                                        placeholder="Company website">{{ $user->address }}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card body-->

                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                Changes</button>
                        </div>
                        <!--end::Actions-->
                        <input type="hidden">
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Settings tab-->
        <!--begin::Security tab-->
        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
            <div class="card  mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Sign-in Method</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Content-->
                <div id="kt_account_settings_signin_method" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Email Address-->
                        <div class="d-flex flex-wrap align-items-center">
                            <!--begin::Label-->
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bold mb-1">Email Address</div>
                                <div class="fw-semibold text-gray-600">{{ $user->email }}</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Edit-->
                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework"  method="POST" action="{{ route('email.save') }}">
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New
                                                    Email Address</label>
                                                <input type="email"
                                                    class="form-control form-control-lg form-control-solid"
                                                    id="emailaddress" placeholder="Email Address" name="emailaddress"
                                                    value="support@keenthemes.com">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmemailpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="confirmemailpassword" id="confirmemailpassword">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button id="kt_signin_submit" type="button"
                                            class="btn btn-primary  me-2 px-6">Update Email</button>
                                        <button id="kt_signin_cancel" type="button"
                                            class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->

                            <!--begin::Action-->
                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Change Email</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Email Address-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-6"></div>
                        <!--end::Separator-->

                        <!--begin::Password-->
                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <!--begin::Label-->
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bold mb-1">Password</div>
                                <div class="fw-semibold text-gray-600">************</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Edit-->
                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_password"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('password.save') }}">
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="currentpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid "
                                                    name="current_password" id="currentpassword">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                                    Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid "
                                                    name="password" id="newpassword">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid "
                                                    name="confirm_password" id="confirmpassword">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-text mb-5">Password must be at least 8 character and contain symbols
                                    </div>

                                    <div class="d-flex">
                                        <button id="kt_password_submit" type="button"
                                            class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button id="kt_password_cancel" type="button"
                                            class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->

                            <!--begin::Action-->
                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Password-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Security tab-->
    </div>
    <!--end::Tab content-->
@endsection

@section('js')

<script>
    "use strict";var KTAccountSettingsSigninMethods=function(){var t,e,n,o,i,s,r,a,l,d=function(){e.classList.toggle("d-none"),s.classList.toggle("d-none"),n.classList.toggle("d-none")},c=function(){o.classList.toggle("d-none"),a.classList.toggle("d-none"),i.classList.toggle("d-none")};return{init:function(){var m;t=document.getElementById("kt_signin_change_email"),e=document.getElementById("kt_signin_email"),n=document.getElementById("kt_signin_email_edit"),o=document.getElementById("kt_signin_password"),i=document.getElementById("kt_signin_password_edit"),s=document.getElementById("kt_signin_email_button"),r=document.getElementById("kt_signin_cancel"),a=document.getElementById("kt_signin_password_button"),l=document.getElementById("kt_password_cancel"),e&&(s.querySelector("button").addEventListener("click",(function(){d()})),r.addEventListener("click",(function(){d()})),a.querySelector("button").addEventListener("click",(function(){c()})),l.addEventListener("click",(function(){c()}))),t&&(m=FormValidation.formValidation(t,{fields:{emailaddress:{validators:{notEmpty:{message:"Email is required"},emailAddress:{message:"The value is not a valid email address"}}},confirmemailpassword:{validators:{notEmpty:{message:"Password is required"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row"})}}),t.querySelector("#kt_signin_submit").addEventListener("click",(function(e){e.preventDefault(),console.log("click"),m.validate().then((function(e){"Valid"==e?swal.fire({text:"Sent password reset. Please check your email",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn font-weight-bold btn-light-primary"}}).then((function(){t.reset(),m.resetForm(),d()})):swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn font-weight-bold btn-light-primary"}})}))}))),function(t){var e,n=document.getElementById("kt_signin_change_password");n&&(e=FormValidation.formValidation(n,{fields:{currentpassword:{validators:{notEmpty:{message:"Current Password is required"}}},newpassword:{validators:{notEmpty:{message:"New Password is required"}}},confirmpassword:{validators:{notEmpty:{message:"Confirm Password is required"},identical:{compare:function(){return n.querySelector('[name="newpassword"]').value},message:"The password and its confirm are not the same"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row"})}}),n.querySelector("#kt_password_submit").addEventListener("click",(function(t){t.preventDefault(),console.log("click"),e.validate().then((function(t){"Valid"==t?swal.fire({text:"Sent password reset. Please check your email",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn font-weight-bold btn-light-primary"}}).then((function(){n.reset(),e.resetForm(),c()})):swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn font-weight-bold btn-light-primary"}})}))})))}()}}}();KTUtil.onDOMContentLoaded((function(){KTAccountSettingsSigninMethods.init()}));
    </script>
@endsection
