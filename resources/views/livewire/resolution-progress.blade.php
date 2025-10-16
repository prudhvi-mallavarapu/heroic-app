<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-4">
                    <div>
                        progress Indicator
                    </div>
                    <div>
                        <h5 class="fs-5 fw-bold m-0 p-0">Resolution Progress</h5>
                        <p class="text-muted">Based on breach resolution progress. {{ $resolvedCount }} of
                            {{ $totalRecords }} breaches resolved.</p>
                    </div>
                </div>
                <hr class="text-muted" />
                {{-- Records Counts Start --}}
                <div class="row mt-4">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                        <div class="card-body bg-light text-center rounded-3">
                            <h2 class="h2 mb-0">{{ $totalRecords }}</h2>
                            <span class="text-muted h5">Total Records</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                        <div class="card-body bg-success-subtle text-center rounded-3">
                            <h2 class="h2 text-success mb-0">{{ $resolvedCount }}</h2>
                            <span class="text-muted h5">Resolved</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                        <div class="card-body bg-danger-subtle text-center rounded-3">
                            <h2 class="h2 text-danger mb-0">{{ $unresolvedCount }}</h2>
                            <span class="text-muted h5">Remaining</span>
                        </div>
                    </div>
                </div>
                {{-- Records Count End --}}
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="flex">
                    <h3 class="h3 mb-0">{{ $totalRecords }}</h3>
                    <p class="text-muted p-0 m-0">Total Records</p>
                    <p class="text-danger p-0 m-0">+12% from last quarter</p>
                </div>
                <div>
                    <div class="bg-light rounded-circle p-3">
                        <i class="text-body-secondary icon-layers fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="flex">
                    <h3 class="h3 mb-0">{{ $uniqueIdentities }}</h3>
                    <p class="text-muted p-0 m-0">Unique Identities</p>
                    <p class="text-muted p-0 m-0">-54% saturation</p>
                </div>
                <div>
                    <div class="bg-light rounded-circle p-3">
                        <i class="text-body-secondary icon-people fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="flex">
                    <h3 class="h3 mb-0">{{ $discoveredEndPoints }}</h3>
                    <p class="text-muted p-0 m-0">Discoverd Endpoints</p>
                    <p class="text-danger p-0 m-0">+12% from last quarter</p>
                </div>
                <div>
                    <div class="bg-light rounded-circle p-3">
                        <i class="text-body-secondary icon-link fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="flex">
                    <h3 class="h3 mb-0">{{ $totalSources }}</h3>
                    <p class="text-muted p-0 m-0">Total Sources</p>
                    <p class="text-danger p-0 m-0">+12% from last quarter</p>
                </div>
                <div>
                    <div class="bg-light rounded-circle p-3">
                        <i class="text-body-secondary icon-layers fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
