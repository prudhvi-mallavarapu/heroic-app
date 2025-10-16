<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">Leaked Data Types</div>
        <span class="text-muted">
            Total Records: <span class="text-primary fw-bold fs-5">{{ $totalRecords }}</span>
        </span>
    </div>
    <div class="card-body">
        <div class="chart-container" wire:ignore>
            <canvas id="leakedDataChart"></canvas>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('livewire:init', function() {
            const canvas = document.getElementById('leakedDataChart');
            if (!canvas) return console.error('Canvas element not found!');

            const ctx = canvas.getContext('2d');
            let leakedChart;

            function renderChart(data) {
                console.log('renderData', data);
                if (leakedChart) leakedChart.destroy();

                leakedChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Leaked Data Types',
                            data: data.counts,
                            backgroundColor: '#0d6efd',
                            borderColor: '#0a58ca',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Initial chart render
            renderChart(@json($chartData));

            // Update chart on identity change
            Livewire.on('refreshLeakedChart', data => {
                const payload = Array.isArray(data) ? data[0] : data;
                renderChart(payload.chartData ?? {
                    labels: [],
                    counts: []
                });
            });
        });
    </script>
@endpush
