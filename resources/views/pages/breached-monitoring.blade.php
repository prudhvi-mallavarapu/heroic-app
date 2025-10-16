<x-master-layout>
    <livewire:identity-filter />
    <div class="row">
        <div class="col-8">
            <livewire:resolution-progress />
        </div>
        <div class="col-4">
            <livewire:severity-overview />
        </div>
    </div>
    <livewire:events-data-table />
    <div class="row">
        <div class="col-8">
            <livewire:leaked-data-types-chart />
        </div>
        <div class="col-4">
            <livewire:breached-sources-chart />
        </div>
    </div>
</x-master-layout>
