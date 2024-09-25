<div id="kt_sliders_widget_3_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
    data-bs-ride="carousel" data-bs-interval="5500">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <h4 class="card-title d-flex align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800">Most Recent Properties</span>
            <span class="text-gray-500 mt-1 fw-bold fs-7">{{ count($properties) }} properties </span>
        </h4>
        <div class="card-toolbar">
            <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                @foreach ($properties as $key => $property)
                    <li data-bs-target="#kt_sliders_widget_3_slider" data-bs-slide-to="{{ $key }}"
                        class="ms-1 {{ $key == 0 ? 'active' : '' }}" aria-current="true"></li>
                @endforeach
            </ol>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-6">
        <div class="carousel-inner">
            @foreach ($properties as $key => $property)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="d-flex align-items-center mb-9">
                        <div class="symbol symbol-100px me-5">
                            <img src="{{ $property['images'][0]['url'] ?? 'default-image.jpg' }}"
                                alt="{{ $property['title'] ?? 'Property Image' }}" class="img-fluid rounded property-image"
                                style="object-fit: cover;" data-images="{{ json_encode($property['images']??[]) }}">
                        </div>

                        <div class="m-0">
                            <h4 class="fw-bold text-gray-800 mb-3">{{ $property['type'] }} - {{ $property['town'] }},
                                {{ $property['province'] }}</h4>
                            <div class="d-flex d-grid gap-5">
                                <div class="d-flex flex-column me-4">
                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                        <i class="fas fa-bed fs-6 text-gray-600 me-2"></i>
                                        Beds: {{ $property['beds'] }}
                                    </span>
                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                        <i class="fas fa-bath fs-6 text-gray-600 me-2"></i>
                                        Baths: {{ $property['baths'] }}
                                    </span>
                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                        <i class="fas fa-swimming-pool fs-6 text-gray-600 me-2"></i>
                                        Pool: {{ $property['pool'] == 1 ? 'Yes' : 'No' }}
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                        <i class="fas fa-dollar-sign fs-6 text-gray-600 me-2"></i>
                                        Price: {{ $property['price'] }} {{ $property['currency'] }}
                                    </span>
                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                        <i class="fas fa-expand-arrows-alt fs-6 text-gray-600 me-2"></i>
                                        Surface Area: {{ $property['surface_area']['built'] ?? 'N/A' }} m²
                                    </span>
                                    <span class="d-flex align-items-center fs-7 fw-bold text-gray-500">
                                        <i class="fas fa-map-marker-alt fs-6 text-gray-600 me-2"></i>
                                        Location: {{ $property['location_detail'] ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-0">
                        <a href="{{ route('property.edit', $property['id']) }}" class="btn btn-sm btn-light me-2 mb-2" >
                            <i class="fas fa-eye me-1"></i> Go to Property
                        </a>

                        <a href="#" class="btn btn-sm btn-success mb-2">Contact Agent</a>
                    </div>
                </div>
            @endforeach

            <div id="gallery"></div>
