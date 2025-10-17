<div class="card">
    <div class="card-body">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 gap-md-0">

            <!-- Left Section: Select + Label -->
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-3 gap-md-4 w-100">
                <!-- Select Dropdown -->
                <div class="flex-shrink-0" style="min-width: 200px;">
                    <select class="form-select" wire:model.change="selectedIdentity">
                        <option value="all">All Identities</option>
                        @foreach ($identities as $identity)
                            <option value="{{ $identity->id }}">{{ $identity->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Label + Description -->
                <div class="text-start">
                    <h5 class="h5 mb-0">
                        <b>Filter by Identity</b>
                    </h5>
                    <small class="text-muted">Filter breach data by identity</small>
                </div>
            </div>

            <!-- Right Section: Button -->
            <div class="mt-2 mt-md-0 flex-shrink-0">
                <button class="btn bg-light">
                    <i class="icon-settings"></i>&nbsp;Manage Identities
                </button>
            </div>
        </div>
    </div>
</div>
