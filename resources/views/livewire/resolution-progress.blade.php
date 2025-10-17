<div class="row g-3">
    <!-- Resolution Progress Card -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center gap-4">
                    <!-- Chart -->
                    <livewire:progress-chart />

                    <!-- Stats -->
                    <div class="text-center text-md-start">
                        <h5 class="fs-5 fw-bold m-0 p-0">Resolution Progress</h5>
                        <p class="text-muted mb-0">
                            Based on breach resolution progress. {{ $resolvedCount }} of {{ $totalRecords }} breaches
                            resolved.
                        </p>
                    </div>
                </div>

                <hr class="text-muted my-3" />

                <!-- Records Counts -->
                <div class="row g-3 mt-3 text-center">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card-body bg-light rounded-3">
                            <h2 class="mb-0">{{ $totalRecords }}</h2>
                            <span class="text-muted h6">Total Records</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card-body bg-success-subtle rounded-3">
                            <h2 class="text-success mb-0">{{ $resolvedCount }}</h2>
                            <span class="text-muted h6">Resolved</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card-body bg-danger-subtle rounded-3">
                            <h2 class="text-danger mb-0">{{ $unresolvedCount }}</h2>
                            <span class="text-muted h6">Remaining</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Individual Metrics Cards (2x2 Grid) -->
    <div class="col-12 col-sm-6">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-0">{{ $totalRecords }}</h3>
                    <p class="text-muted mb-0">Total Records</p>
                </div>
                <div class="bg-light rounded-circle p-3">
                    <i class="text-body-secondary icon-layers fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-0">{{ $uniqueIdentities }}</h3>
                    <p class="text-muted mb-0">Unique Identities</p>
                </div>
                <div class="bg-light rounded-circle p-3">
                    <i class="text-body-secondary icon-people fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-0">{{ $discoveredEndPoints }}</h3>
                    <p class="text-muted mb-0">Discovered Endpoints</p>
                </div>
                <div class="bg-light rounded-circle p-3">
                    <i class="text-body-secondary icon-link fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-0">{{ $totalSources }}</h3>
                    <p class="text-muted mb-0">Total Sources</p>
                </div>
                <div class="bg-light rounded-circle p-3">
                    <i class="text-body-secondary icon-layers fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>
