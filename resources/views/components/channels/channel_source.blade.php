<div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
    @foreach ($finalOpportunities as $key => $opportunity)
        <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
            <!--begin::Info-->
            <div class="d-flex flex-stack mb-3">
                <!--begin::Wrapper-->
                <div class="d-flex align-items-center">
                    <!--begin::Icon-->
                    @php
                        $icons = [
                            'facebook' => 'facebook.png',
                            'instagram' => 'instagram.png',
                            'youtube' => 'youtube.png',
                            'google' => 'google.png',
                            'direct traffic' => 'direct_traffic.png',
                        ];

                        $icon = 'others.png'; // default icon

                        foreach ($icons as $source => $iconFile) {
                            if (strpos(strtolower($opportunity['source']), $source) !== false) {
                                $icon = $iconFile;
                                break;
                            }
                        }
                    @endphp
                    <img src="{{ asset('icons/' . $icon) }}" class="w-55px ms-n1 me-10" alt="">
                    <!--end::Icon-->

                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-4xl text-hover-primary fw-bold" style="font-size: 42px;">
                        <span id="opportunity_value_{{ $key }}">
                            <span class="show_source"> {{ number_format_short($opportunity['count']) }} </span>
                            <span class="show_sales" style="display: none"> {{ number_format_short($opportunity['total_value']) }} </span>
                        </span>
                    </a>
                    <!--end::Title-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Action-->
                <div class="m-0 d-flex align-items-center">
                    <!-- Toggle button for switching between count and total_value -->
                    <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                        data-bs-toggle="modal" data-bs-target="#modal_{{ $key }}">
                        <i class="ki-duotone ki-dots-square fs-1">
                            <span class="path1"></span><span class="path2"></span>
                            <span class="path3"></span><span class="path4"></span>
                        </i>
                    </button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Info-->
        </div>
    @endforeach
</div>
