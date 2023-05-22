<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <title>Document</title>
</head>
<style>
    body{margin-top:20px;
        background-color:#eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }
</style>
<body>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Invoice {{ $data['num_invoice']}} <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">TechShop.dz</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">Ain Merane, Chlef, Algeria</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>contact@techsop.dz</p>
                                    <p><i class="uil uil-phone me-1"></i> 047429087</p>
                                    <p><i class="uil uil-phone me-1"></i> 0549380267 / 0783080107 / 0663561183</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To:</h5>
                                        <h5 class="font-size-15 mb-2">{{ $data['name']}}</h5>
                                        <p class="mb-1"><strong>Address 01 </strong>{{ $data['address1']}} </p>
                                        <p class="mb-1"><strong>address 02 </strong>{{ $data['address2']}}</p>
                                        <p class="mb-1">{{ $data['city']}}, {{ $data['state']}}, {{ $data['country']}}</p>
                                        <p class="mb-1">{{ $data['email']}}</p>
                                        <p>{{ $data['phone']}}</p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                            <p>{{ $data['num_invoice']}}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                            <p>{{ $data["updated_at"] }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Order No:</h5>
                                            <p>{{ $data['tracking_no']}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <hr class="my-4">

                            <div class="py-2">
                                <h5 class="font-size-15">Order Summary</h5>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">No.</th>
                                                <th>Item</th>
                                                <th>image</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead><!-- end thead -->
                                        <tbody>
                                            @foreach ($order->ordersitems as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $item->products->name_prod }}</h5>
                                                        <p class="text-muted mb-0">{{ $item->products->mark_prod }}</p>
                                                    </div>
                                                </td>
                                                <td><img src="{{ asset('assets/uploads/products/'. $item->products->image) }}" width="80px" alt="{{ 'image'.$item->products->image}}"></td>
                                                @if ($item->products->selling_price > 0)
                                                    <td> {{ $item->products->selling_price }} DZ</td>
                                                @else
                                                    <td> {{ $item->products->original_price }} DZ</td>
                                                @endif
                                                <td>{{ $item->qty_prod }}</td>
                                                @if ($item->products->selling_price > 0)
                                                    <td> {{ $item->products->selling_price * $item->qty_prod }} DZ</td>
                                                @else
                                                    <td> {{ $item->products->original_price * $item->qty_prod }} DZ</td>
                                                @endif
                                            </tr>
                                            <!-- end tr -->
                                            @endforeach
                                            <tr>
                                                <th scope="row" colspan="5" class="text-end">Sub Total</th>
                                                <td class="text-end">{{ $data['price_total'] }} DZ</td>
                                            </tr>
                                            <!-- end tr -->
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    sum pait :</th>
                                                <td class="border-0 text-end">{{ $data['sum_paid'] }} DZ</td>
                                            </tr>@php
                                                $sumremaining = $data['price_total'] - $data['sum_paid'] ;
                                            @endphp
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    sum remaining  :</th>
                                                <td class="border-0 text-end"> {{ $sumremaining  }} DZ</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    TVA :</th>
                                                <td class="border-0 text-end">00.00 DZ</td>
                                            </tr>
                                            <!-- end tr -->
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    TIMBRE</th>
                                                <td class="border-0 text-end">00.00 DZ</td>
                                            </tr>
                                            <!-- end tr -->
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end"><h4 class="m-0 fw-semibold">{{ $sumremaining }} DZ</h4></td>
                                            </tr>
                                            <!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div><!-- end table responsive -->
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-outline-dark me-1"><i class="fa fa-print"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
</body>
</html>
