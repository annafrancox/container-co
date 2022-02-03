@extends('admin.layouts.sistema')

@section('title', 'Porcentagem de Ocupação dos Containers')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @js($containersNames),
                datasets: [{
                    label: 'Ocupação',
                    data: @js($productsByContainer),
                    backgroundColor: [
                        'rgba(183, 65, 14, 0.6)',
                    ],
                    borderColor: [
                        'rgba(183, 65, 14, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItems, data) {
                                var i = tooltipItems.dataIndex;
                                return tooltipItems.dataset.data[i] + "%";
                            }
                        }
                    }
                }
            }    
        });
    </script>
@endpush