@extends('layouts.app')

@section('content')
    <div class="flex">
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Cards for Key Metrics -->
            <div class="md:grid-cols-3 grid grid-cols-1 gap-6">
                <!-- Total Products Card -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Total Products</h3>
                    <p class="text-2xl">{{ $totalProducts }}</p>
                </div>

                <!-- Total Users Card -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Total Users</h3>
                    <p class="text-2xl">{{ $totalUsers }}</p>
                </div>

                <!-- Total Orders Card -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Total Orders</h3>
                    <p class="text-2xl">{{ $totalOrders }}</p>
                </div>
            </div>

            <!-- Overview Chart Section -->
            <div class="p-6 mt-8 bg-white rounded-lg shadow-lg">
                <h3 class="mb-4 text-xl font-semibold">Overview Chart</h3>
                <canvas id="overviewChart" height="100"></canvas>
            </div>

            <!-- Recent Activity Feed -->
            <div class="p-6 mt-8 bg-white rounded-lg shadow-lg">
                <h3 class="mb-4 text-xl font-semibold">Recent Activity</h3>
                <ul class="space-y-4">
                    <li class="flex justify-between">
                        <span class="text-gray-600">Order #1234 placed</span>
                        <span class="text-sm text-gray-500">2 minutes ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-gray-600">New user registered</span>
                        <span class="text-sm text-gray-500">5 minutes ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-gray-600">Order #1235 placed</span>
                        <span class="text-sm text-gray-500">10 minutes ago</span>
                    </li>
                </ul>
            </div>

            <!-- Quick Actions -->
            <div class="p-6 mt-8 bg-white rounded-lg shadow-lg">
                <h3 class="mb-4 text-xl font-semibold">Quick Actions</h3>
                <ul class="space-y-4">
                    <li>
                        <button class="hover:bg-blue-700 w-full py-2 text-white transition bg-blue-600 rounded-lg">Add New Order</button>
                    </li>
                    <li>
                        <button class="hover:bg-green-700 w-full py-2 text-white transition bg-green-600 rounded-lg">Add New User</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0"></script>
    <script>
        // Get the data from the Laravel blade template
        const chartData = {
            labels: ['Products', 'Users', 'Orders'], // Categories
            datasets: [{
                label: 'Overview Data',
                data: [{{ $totalProducts }}, {{ $totalUsers }}, {{ $totalOrders }}], // Values
                backgroundColor: ['#4F46E5', '#10B981', '#F59E0B'], // Colors for each bar
                borderWidth: 1,
                borderColor: '#ffffff'
            }]
        };

        // Chart configuration
        const config = {
            type: 'bar', // Use 'bar', 'line', or other types supported by Chart.js
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false, // Hide the legend
                    },
                    tooltip: {
                        callbacks: {
                            label: (context) => `${context.dataset.label}: ${context.raw}`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true // Start y-axis at 0
                    }
                }
            }
        };

        // Render the chart
        const ctx = document.getElementById('overviewChart').getContext('2d');
        new Chart(ctx, config);
    </script>
@endsection
