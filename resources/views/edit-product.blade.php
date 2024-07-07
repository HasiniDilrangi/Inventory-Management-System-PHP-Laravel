<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {   
            background-image: url("https://e0.pxfuel.com/wallpapers/63/803/desktop-wallpaper-blue-purple-abstract-750-x-1334.jpg");
        }
        .container {
            background-color: #151B54; 
            border-radius: 10px;
            padding: 20px; }

        .form-group label {
            color: white;
        }   
    </style>
</head>
<body>
    <!-- Navigation Bar /home-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="color: #000099; font-weight: bold;">Inventory Management System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="/">Home</a>

                </li>
            </ul>         
        </div>
    </nav>
    
    <div class="container">
    <div class="border p-3 mb-3">
        <br>
        <h2 style="color: white; font-size: 24px;">
    <img src="https://cdn.icon-icons.com/icons2/217/PNG/96/shopping-cart-accept_25344.png" alt="Icon" style="width: 50px; height: 50px; margin-right: 10px;">
    Edit Products
</h2></h2>
        <form action="/edit-product/{{$product->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
            </div>
            <button type="submit" class="btn btn-warning">Save Changes</button>
        </form>
    </div>
  
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
</body>
</html>
