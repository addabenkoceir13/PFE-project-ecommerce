<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('bootstrap513/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@0;1&family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Suppliers Email</title>
</head>
<style>
    /* Customize the template styling here */
    .body {
        font-family: 'Noto Serif', serif;
        font-family: 'Open Sans', sans-serif;
    }
    .logo-text{
        font-family: 'Noto Serif', serif;
        font-weight: 500;

    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    h1 {
        color: #000;
        text-align: center;
        font-family: 'Noto Serif', serif;

    }
    .email-supplier h4{
        color: #000;
        font-family: 'Noto Serif', serif;
    }
    .email-supplier p {
        color: #0f0e0e;
        text-align: justify;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;

    }
    .card .card-body .card-title{
        color: #333;
        font-family: 'Noto Serif', serif;
    }
    .card .card-body .card-text strong{
        color: #0f0e0e;
        font-weight: 600;
        font-family: 'Noto Serif', serif;

    }
    .card .card-body .card-text{
        color: #0f0e0e;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;

    }
    .card .card-body .card-text a{
        color: #0674f2;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;
        text-decoration: none;

    }
    .card .card-body .card-text a:hover{
        color: #0674f2;
        font-weight: 600;

    }
    .socel-media{
        display: flex;
        justify-content: center;
        margin-top: 2rem;

    }
    .socel-media .facebook,
    .socel-media .instagram,
    .socel-media .twitter,
    .socel-media .whatsapp
    {
        padding: 10px;
        margin: 0 10px;
    }
    .socel-media .facebook a,
    .socel-media .instagram a,
    .socel-media .twitter a,
    .socel-media .whatsapp
    {
        font-size: 35px;
    }
    .socel-media .facebook a
    {
        color:  #1877f2;
    }
    .socel-media .facebook a:hover
    {
        color:  #3b5998;
    }
    .socel-media .instagram a
    {
        color:  #c32aa3;
    }
    .socel-media .twitter a
    {
        color:  #1da1f2;
    }
    .socel-media .whatsapp a
    {
        color:  #25d366;
    }
</style>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <img src="{{ asset('assets/Frontend/home/logo-techshop.png')}}" alt="image" width="60px" height="60px" class=" rounded-circle">
                    </div>
                    <div class="logo-text">
                        <h2>TECHSHOPE</h2>
                    </div>
                </div>
                <hr class="my-2">
                <div class="email-supplier">
                    <h1>{{ $data['subject'] }}</h1>
                    <p>Dear {{ $data['name'] }},</p>
                    <p>Holder's email address is {{ $data['email'] }}, and his phone number is {{ $data['phone'] }}.</p>
                    <p>
                        {{ $data['message'] }}
                    </p>
                    <p>Sincerely,</p>
                    <h4>TechShop DZ</h4>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h3 class="card-title">Contact Information TechShop</h3>
                <hr class="my-3">
                <p class="card-text"><strong>Email: </strong> contact@techshop.dz</p>
                <p class="card-text"><strong>Fax: </strong> 047429087</p>
                <p class="card-text"><strong>Phone: </strong> 0549380267 / 0783080107 / 0663561183</p>
                <p class="card-text"><strong>Address: </strong> La Grend Mosque, Ain Merane, Chlef, Algeria</p>
                <p class="card-text"><strong>Website: </strong><a href="https://techshop.dz/" target="_blank"> www.techshop.dz </a></p>

                <div class="socel-media">
                    <div class="facebook">
                        <a href="https://www.facebook.com/techshopdz/" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </div>
                    <div class="instagram">
                        <a href="https://www.instagram.com/techshopdz/" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                    <div class="twitter">
                        <a href="https://twitter.com/techshopdz" target="_blank">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                    <div class="whatsapp">
                        <a href="https://api.whatsapp.com/send?phone=+213549380267&text=Hello, I'm interested in TechShop" target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <hr class="my-5">
            </div>
        </div>
    </div>
</body>
</html>
