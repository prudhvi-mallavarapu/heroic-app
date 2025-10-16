<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center gap-4">
                <div>
                    <select class="form-select" wire:model.change="selectedIdentity">
                        <option value="all">All Identities</option>
                        @foreach ($identities as $identity)
                            <option value="{{ $identity->id }}">{{ $identity->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <h5 class="h5 m-0">
                        <b>Filter by Identity</b>
                    </h5>
                    <span class="text-muted m-0">Filter breach data by identity</span>
                </div>
            </div>
            <div>
                <button class="btn btn-black">Manage Identities</button>
            </div>
        </div>
    </div>
</div>
