<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title">Severity Overview</div>
        <button class="btn btn-black">Refresh</button>
    </div>
    <div class="card-body">
        <div class="p-3">
            <div>
                <div class="d-flex gap-2 align-items-center">
                    <i class="fas fa-circle text-danger"></i>
                    <p class="m-0 p-0 fw-bold fs-5 text-danger">
                        Critical
                    </p>
                    <span
                        class="text-muted fw-normal">{{ $critical['unresolved'] > 0 ? $critical['unresolved'] . '/' . $critical['total'] : '' }}</span>
                </div>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
            <div>
                <div class="d-flex gap-2 align-items-center">
                    <i class="fas fa-circle text-danger"></i>
                    <p class="m-0 p-0 fw-bold fs-5 text-danger">
                        High
                    </p>
                    <span
                        class="text-muted fw-normal">{{ $high['unresolved'] > 0 ? $high['unresolved'] . '/' . $high['total'] : '' }}</span>
                </div>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
            <div>
                <div class="d-flex gap-2 align-items-center">
                    <i class="fas fa-circle text-warning"></i>
                    <p class="m-0 p-0 fw-bold fs-5 text-warning">
                        Medium
                    </p>
                    <span
                        class="text-muted fw-normal">{{ $moderate['unresolved'] > 0 ? $moderate['unresolved'] . '/' . $moderate['total'] : '' }}</span>
                </div>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
            <div>
                <div class="d-flex gap-2 align-items-center text-muted">
                    <i class="fas fa-circle"></i>
                    <p class="m-0 p-0 fw-bold fs-5">
                        Low
                    </p>
                    <span
                        class="fw-normal">{{ $low['unresolved'] > 0 ? $low['unresolved'] . '/' . $low['total'] : '' }}</span>
                </div>
                <p class="text-muted">High-priority breaches requiring immediate attention</p>
            </div>
            <hr class="text-muted" />
        </div>
    </div>
</div>
