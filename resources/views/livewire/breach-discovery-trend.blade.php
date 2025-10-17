<div class="card">
    <div class="card-header">
        <div class="card-title">Breach Discovery Trend</div>
    </div>
    <div class="card-body">
        <div class="chart-container" wire:ignore.self>
            <canvas id="breachTrendChart"></canvas>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            const canvas = document.getElementById('breachTrendChart');
            if (!canvas) return console.error('Canvas element not found!');

            const ctx = canvas.getContext('2d');
            let trendChart;

            function renderChart(chartData) {
                if (!chartData) return;

                if (trendChart) trendChart.destroy();

                trendChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Breaches',
                            data: chartData.counts,
                            borderColor: '#0d6efd',
                            backgroundColor: 'rgba(13,110,253,0.1)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Breaches'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Initial render
            renderChart(@json($chartData ?? ['labels' => [], 'counts' => []]));

            // Livewire dynamic update
            Livewire.on('refreshBreachTrendChart', data => {
                const payload = Array.isArray(data) ? data[0] : data;
                renderChart(payload.chartData ?? {
                    labels: [],
                    counts: []
                });
            });
        });
    </script>
@endpush
