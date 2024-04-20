<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecom_Project</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
    <style>
        .custom-login{
            height: 500px;
            padding-top: 100px;
        }
        img.slider-img
        {
            height:400px !important;
        }
        .custom-product{
            height: 500px;
            text-align: center;
        }
        .slider-text
        {
            background-color: rgb(19, 96, 129);
        }
        .tranding-img
        {
            height: 100px;
           
        }
        .tranding-items
        {
            float: left;
            width: 20%
        }
        .tranding-wrapper
        {
            margin: 20px;
        }
        .detail-img
        {
            height: 200px;
        }
        .search-box
        {
            width: 500px !important
        }
        .cart-list-devider
        {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px
        }

    </style>
</body>
</html>