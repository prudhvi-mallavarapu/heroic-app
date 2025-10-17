<x-master-layout>
    <!-- Identity Filter -->
    <div class="mb-3">
        <livewire:identity-filter />
    </div>

    <!-- Resolution Progress + Severity Overview -->
    <div class="row g-3">
        <div class="col-lg-8 col-md-12">
            <livewire:resolution-progress />
        </div>
        <div class="col-lg-4 col-md-12">
            <livewire:severity-overview />
        </div>
    </div>

    <!-- Events Data Table -->
    <div class="row mt-3">
        <div class="col-12">
            <livewire:events-data-table wire:key="events-{{ now()->timestamp }}" />
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-3 mt-3">
        <div class="col-lg-8 col-md-12">
            <livewire:leaked-data-types-chart />
        </div>
        <div class="col-lg-4 col-md-12">
            <livewire:breached-sources-chart />
        </div>
    </div>

    <!-- Breach Discovery Trend -->
    <div class="row mt-3">
        <div class="col-12">
            <livewire:breach-discovery-trend />
        </div>
    </div>
</x-master-layout>
