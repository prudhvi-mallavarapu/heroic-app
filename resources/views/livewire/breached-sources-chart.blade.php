<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="card-title">Breached Sources <i class="icon-information"></i></div>
            <button class="btn bg-light">Analytics Panel <i class="fas fa-arrow-right text-muted"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="chart-container" wire:ignore.self>
            <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            const canvas = document.getElementById('doughnutChart');
            if (!canvas) return console.error('Canvas element not found!');

            const ctx = canvas.getContext('2d');
            let doughnutChart;

            function renderChart(chartData) {
                if (!chartData) return;

                if (doughnutChart) doughnutChart.destroy();

                doughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            data: chartData.counts,
                            backgroundColor: [
                                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            }

            // Initial render
            renderChart(@json($chartData ?? ['labels' => [], 'counts' => []]));

            // Update dynamically
            Livewire.on('refreshSourcesChart', data => {
                const payload = Array.isArray(data) ? data[0] : data;
                renderChart(payload.chartData ?? {
                    labels: [],
                    counts: []
                });
            });
        });
    </script>
@endpush
