@extends('backend.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Dashboard</h3>

        <!-- Kotak Statistik -->
        <div class="row">
            <!-- Total Users -->
            <div class="col-sm-6 col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h5>Total Users</h5>
                        <h4>{{ $users }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Students -->
            <div class="col-sm-6 col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h5>Total Students</h5>
                        <h4>{{ $students }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Teachers -->
            <div class="col-sm-6 col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body text-center">
                        <h5>Total Teachers</h5>
                        <h4>{{ $teachers }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Mapel -->
            <div class="col-sm-6 col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body text-center">
                        <h5>Total Mapel</h5>
                        <h4>{{ $mapels }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mt-4">
            <!-- Pie Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Student, Teacher, and Mapel Distribution</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Bar Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grade Distribution</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

/// Pastikan Chart.js sudah di-load
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen canvas
        var ctxPie = document.getElementById("pieChart").getContext("2d");
        var ctxBar = document.getElementById("barChart").getContext("2d");

        // Konfigurasi ukuran chart
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 1.5, // Menyamakan rasio aspek kedua chart
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Data Pie Chart
        var pieData = {
            labels: ['Students', 'Teachers', 'Mapel'],
            datasets: [{
                data: [parseInt("{{ $students ?? 0 }}"), parseInt("{{ $teachers ?? 0 }}"), parseInt("{{ $mapels ?? 0 }}")],
                backgroundColor: ['#007bff', '#28a745', '#ffc107'],
            }]
        };

        // Inisialisasi Pie Chart
        new Chart(ctxPie, {
            type: 'pie',
            data: pieData,
            options: chartOptions
        });

        // Data Bar Chart
        var barData = {
            labels: ['A (85-100)', 'B (70-84)', 'C (55-69)', 'D (40-54)', 'E (0-39)'],
            datasets: [{
                label: 'Total Scores',
                data: [parseInt("{{ $scoreA ?? 0 }}"), parseInt("{{ $scoreB ?? 0 }}"), parseInt("{{ $scoreC ?? 0 }}"), parseInt("{{ $scoreD ?? 0 }}"), parseInt("{{ $scoreE ?? 0 }}")],
                backgroundColor: ['#4CAF50', '#2196F3', '#FFC107', '#FF5722', '#E91E63']
            }]
        };

        // Inisialisasi Bar Chart
        new Chart(ctxBar, {
            type: 'bar',
            data: barData,
            options: chartOptions
        });
    });
</script>


@endsection
