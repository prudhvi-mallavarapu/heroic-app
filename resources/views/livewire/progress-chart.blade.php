<div wire:ignore class="position-relative d-inline-block" style="width: 120px; height: 120px;">
    <canvas id="progressChart" width="120" height="120"></canvas>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <span id="progressPercent" class="fw-bold fs-5 text-dark">0%</span>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            const ctx = document.getElementById('progressChart').getContext('2d');
            let progressChart;

            function renderProgressChart(total = 0, resolved = 0) {
                const percent = total > 0 ? Math.round((resolved / total) * 100) : 0;
                const remaining = 100 - percent;

                // Update center text
                const percentText = document.getElementById('progressPercent');
                if (percentText) percentText.innerText = `${percent}%`;

                // Set color
                let color = '#0d6efd';
                if (percent < 50) color = '#dc3545';
                else if (percent < 80) color = '#ffc107';
                else color = '#198754';

                if (progressChart) {
                    progressChart.data.datasets[0].data = [percent, remaining];
                    progressChart.data.datasets[0].backgroundColor = [color, '#e9ecef'];
                    progressChart.update();
                } else {
                    progressChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [percent, remaining],
                                backgroundColor: [color, '#e9ecef'],
                                borderWidth: 0
                            }]
                        },
                        options: {
                            cutout: '75%',
                            plugins: {
                                tooltip: {
                                    enabled: false
                                },
                                legend: {
                                    display: false
                                }
                            },
                            responsive: true
                        }
                    });
                }
            }

            // Listen for updates from parent
            Livewire.on('updateProgressChart', data => {
                console.log('fires updateProgressChart event', data);
                const payload = Array.isArray(data) ? data[0] : data;
                renderProgressChart(payload.total, payload.resolved);
            });
        });
    </script>
@endpush
