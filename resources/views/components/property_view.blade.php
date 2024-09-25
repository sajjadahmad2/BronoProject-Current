<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!-- Status / Type Card -->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <h2 class="fw-bold"><i class="fas fa-info-circle"></i> Status / Type</h2>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-5">
                            <span class="fs-6 fw-semibold text-gray-600">Property Status</span>
                            <span class="badge badge-light-primary fs-7 fw-bold ms-2">{{ $property['status'] ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="fs-6 fw-semibold text-gray-600">Property Type</span>
                            <span class="badge badge-light-info fs-7 fw-bold ms-2">{{ $property['type'] ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
        
                <!-- Currency Details Card -->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <h2 class="fw-bold"><i class="fas fa-money-bill-wave"></i> Currency Details</h2>
                    </div>
                    <div class="card-body pt-0">
                        <span class="fs-6 fw-semibold text-gray-600">Currency</span>
                        <span class="badge badge-light-success fs-7 fw-bold ms-2">{{ $property['currency'] ?? 'N/A' }}</span>
                    </div>
                </div>
        
                <!-- Property Features Card -->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <h2 class="fw-bold"><i class="fas fa-star"></i> Property Features</h2>
                    </div>
                    <div class="card-body pt-0">
                        @if(isset($property['features']) && !empty($property['features']))
                            @foreach($property['features'] as $feat)
                                <span class="badge badge-light-warning fs-7 fw-bold me-2">{{ $feat['feature'] ?? '' }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">No features available</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!-- General Information Card -->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <h2 class="fw-bold"><i class="fas fa-home"></i> General Information</h2>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10">
                            <h3 class="fs-5 fw-bold mb-1">Property Title</h3>
                            <p class="fs-6">{{ $property['title'] ?? 'N/A' }}</p>
                        </div>
                        <div class="mb-10">
                            <h3 class="fs-5 fw-bold mb-1">Reference</h3>
                            <span class="badge badge-light-primary fs-7 fw-bold">{{ $property['reference'] ?? 'N/A' }}</span>
                        </div>
                        <div class="mb-10">
                            <h3 class="fs-5 fw-bold mb-1">Description</h3>
                            <p class="fs-6">{{ $property['descriptionEn']['description'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
        
                <!-- Media Card -->
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <h2 class="fw-bold"><i class="fas fa-image"></i> Media</h2>
                    </div>
                    <div class="card-body pt-0">
                        @if(isset($property['images']) && !empty($property['images']))
                            <div id="property-image-carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($property['images'] as $index => $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ $image['url'] }}" class="d-block w-100" alt="Property Image">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#property-image-carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#property-image-carousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @else
                            <p class="text-muted">No images available</p>
                        @endif
                    </div>
                </div>
            </div>


            


        </div>
    </div>
    

    
</div>
