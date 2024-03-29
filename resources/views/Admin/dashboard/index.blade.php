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
    <div class="card border-0 mt-5">
        <div class="card-body">
            <h1>The proportion of the top ten yearly sales</h1>
            <canvas id="myChartcirle" width="100px" height="100"></canvas>
        </div>
    </div>
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
    var results = @json($results);

    const ctxc = document.getElementById('myChartcirle').getContext('2d');
    const myChartcirle = new Chart(ctxc, {
        type: 'pie',
        data: {
            labels: [results[0].name_prod,results[1].name_prod,results[2].name_prod,results[3].name_prod,results[4].name_prod,results[5].name_prod,results[6].name_prod,results[7].name_prod,results[8].name_prod,results[9].name_prod],
            datasets: [{
                label: '# of Votes',
                data: [results[0].total_quantity,results[1].total_quantity,results[2].total_quantity,results[3].total_quantity,results[4].total_quantity,results[5].total_quantity,results[6].total_quantity,results[7].total_quantity,results[8].total_quantity,results[9].total_quantity],
                backgroundColor: [
                    '#4663BE',
                    '#8DBAFE',
                    '#21AEE4',
                    '#e9ebed',
                    '#96AB3D',
                    '#aed36c',
                    '#262626',
                    '#ACBFA4',
                    '#E2E8CE',
                    '#FF7F11',
                    '#FF1B1C'
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
