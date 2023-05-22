@extends('layouts.admin')

@section('title', 'Dashboard ')

@section('title-page-cat' , 'Dashboard Page')

@section('content')
    <div class="card border-0">
        <div class="car-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
            <div class="views row">
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $users }}">000</h5>
                        <p> Users </p>
                    </div>
                    <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $suppliers }}">000</h5>
                        <p> Suppliers </p>
                    </div>
                    <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $reviews }}">000</h5>
                        <p> Reviews </p>
                    </div>
                    <div class="icon"><i class="bi bi-chat-left-text" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $ratings }}">000</h5>
                        <p> Ratings </p>
                    </div>
                    <div class="icon"><i class="bi bi-star" aria-hidden="true"></i></div>
                </div>

                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $products }}">000</h5>
                        <p> Products </p>
                    </div>
                    <div class="icon"><i class="bi bi-boxes" aria-hidden="true"></i></div>
                </div>

                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $phones }}">000</h5>
                        <p> Phones </p>
                    </div>
                    <div class="icon"><i class="bi bi-phone" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $computers }}">000</h5>
                        <p> Comupteurs </p>
                    </div>
                    <div class="icon"><i class="bi bi-laptop"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $orders }}">000</h5>
                        <p> Orders </p>
                    </div>
                    <div class="icon"><i class="bi bi-bag" aria-hidden="true"></i></div>
                </div>

                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $orderCon }}">000</h5>
                        <p> Orders are confirmed </p>
                    </div>
                    <div class="icon"><i class="bi bi-bag-check" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $orderNoCon }}">000</h5>
                        <p>Orders not confirmed </p>
                    </div>
                    <div class="icon"><i class="bi bi-bag-dash" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $invoices }}">000</h5>
                        <p>Invoices </p>
                    </div>
                    <div class="icon"><i class="bi bi-clipboard-check" aria-hidden="true"></i></div>
                </div>
                <div class="view-1 col-sm-12 col-md-6 col-lg-4 col-xl-3 my-3">
                    <div class="info">
                        <h5 class="num" data-val="{{ $wishlists }}">000</h5>
                        <p>Wishlists</p>
                    </div>
                    <div class="icon"><i class="bi bi-bag-heart" aria-hidden="true"></i></div>
                </div>

            </div>

        </div>
    </div>
    <div class="card border-0 mt-5">
        <div class="card-body">
            <h1>Vertical sales graph for the year</h1>
            <canvas id="myChart" width="200" height="100"></canvas>
        </div>
    </div>
    {{-- <div class="card border-0 mt-5">
        <div class="card-body">
            <h1>Vertical sales graph for the year</h1>
            <canvas id="myChartcirle" width="200" height="100"></canvas>
        </div>
    </div> --}}
@endsection

@section('scripts')
<script>
    // chart Colum
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: '# of Votes',
                data: [5, 3, 2, 228, 750, 250, 0,0,0,0,0,0],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
     // ----------------------------- JAV Pie chart service appiotment -----------------------------------------------------------------------
    const ctxc = document.getElementById('myChartcirle').getContext('2d');
    const myChartcirle = new Chart(ctxc, {
        type: 'pie',
        data: {
            labels: ['Cardiology', 'Radiology Specialized Medical imaging', 'Emergency Intensive Care', 'Vascular Medicine and Call Vascular', 'Medical analysis laboratory', 'Dental Surgery'],
            datasets: [{
                label: '# of Votes',
                data: [20,50,78,50,50,0],
                backgroundColor: [
                    '#4663BE',
                    '#8DBAFE',
                    '#21AEE4',
                    '#e9ebed',
                    '#96AB3D',
                    '#aed36c'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Chart.js Pie Chart'
        }
        }
    },
    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection
