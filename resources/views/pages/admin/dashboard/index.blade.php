@include('layout.app')
@include('layout.navbar-admin')




<div class="container">

    <div class="row">

        <div class="col">

            <div class="mt-5">

                <div class="row mb-4">

                    <div class="col">

                        <h1 class="display-4 text-dark">Dashboard</h1>

                        <p class="text-muted">Selamat datang kembali, <strong>Admin!</strong> Ini adalah ringkasan data penjualan hari ini.</p>

                    </div>

                </div>

                <div class="card mt-4">

                    <div class="card-body">

                        <h5 class="card-title">Statistik Penjualan Per Hari</h5>

                        <canvas id="salesChart" width="400" height="200"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const ctx = document.getElementById('salesChart').getContext('2d');

        const salesChart = new Chart(ctx, {

            type: 'bar', // Tipe chart: bar, line, pie, etc.

            data: {

                labels: @json($chartData['dates']),

                datasets: [{

                    label: 'Jumlah Penjualan',

                    data: @json($chartData['sales']),

                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna batang

                    borderColor: 'rgba(54, 162, 235, 1)', // Warna garis

                    borderWidth: 1,

                }]

            },

            options: {

                responsive: true,

                scales: {

                    x: {

                        beginAtZero: true,

                    },

                    y: {

                        beginAtZero: true,

                    }

                }

            }

        });

    });

</script>


