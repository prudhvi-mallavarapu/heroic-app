<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title">Severity Overview</div>
        <button class="btn btn-black">Refresh</button>
    </div>
    <div class="card-body">
        <div class="p-3">
            <div>
                <p class="m-0 p-0 fw-bold fs-5 text-danger">
                    Critical <span
                        class="text-muted fw-normal">{{ $critical['unresolved'] > 0 ? $critical['unresolved'] . '/' . $critical['total'] : '' }}</span>
                </p>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
            <div>
                <p class="m-0 p-0 fw-bold fs-5 text-danger">
                    High <span
                        class="text-muted fw-normal">{{ $high['unresolved'] > 0 ? $high['unresolved'] . '/' . $high['total'] : '' }}</span>
                </p>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
            <div>
                <p class="m-0 p-0 fw-bold fs-5 text-warning">
                    Medium <span
                        class="text-muted fw-normal">{{ $moderate['unresolved'] > 0 ? $moderate['unresolved'] . '/' . $moderate['total'] : '' }}</span>
                </p>
                <p>High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
            <div>
                <p class="m-0 p-0 fw-bold fs-5 text-muted">
                    Low <span
                        class="text-muted fw-normal">{{ $low['unresolved'] > 0 ? $low['unresolved'] . '/' . $low['total'] : '' }}</span>
                </p>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
        </div>
    </div>
</div>
