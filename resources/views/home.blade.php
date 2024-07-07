<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
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

    <!-- Navigation Bar home/logout-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="color: #000099; font-weight: bold;">Inventory Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
            @auth
            <form action="/logout" method="POST" class="form-inline my-2 my-lg-0">
                @csrf
                <button class="btn btn-light btn-sm">
    <img src="https://www.freeiconspng.com/thumbs/sign-out-icon/sign-out-logout-icon-0.png" alt="logout Icon" style="width: 30px; height: 30px; margin-right: 5px;">
    
</button>
            </form>
            @endauth
        </div>
    </nav>

    <div class="container mt-4">
        <!-- success and error messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        

        @auth
        
        <div class="border p-3 mb-3">
        <h2 style="color: white; font-size: 24px;">
    <img src="https://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Add-item-icon.png" alt="Icon" style="width: 50px; height: 50px; margin-right: 10px;">
    Add New Product
</h2>

            <form action="/add-product" method="POST">
                @csrf
                <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="title" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                <label for="name">Product Description:</label>
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                <label for="name">Product Price:</label>
                <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
                <input type="submit" class="btn btn-success" value="Add Product">
            </form>
        </div>
        <div class="border p-3 mb-3">
        <h2 style="color: white; font-size: 24px;">
    <img src="https://cdn.icon-icons.com/icons2/217/PNG/96/shopping-bag-blue_25340.png" alt="Icon" style="width: 50px; height: 50px; margin-right: 10px;">
    All Products
</h2>
            @foreach($products as $product)
                <div class="bg-light p-3 mb-2">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Rs. {{ $product->price }}</p>
                    <p>
    <a href="edit-product/{{ $product->id }}" class="btn btn-warning btn-sm">
        <img src="https://cdn.icon-icons.com/icons2/217/PNG/96/male-user-edit_25348.png" alt="Edit Icon" style="width: 30px; height: 30px; margin-right: 5px;">
        Edit Product
    </a>
</p>

                    <form action='/delete-product/{{ $product->id }}' method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">
    <img src="https://cdn.icon-icons.com/icons2/217/PNG/512/remove-item_25316.png" alt="Delete Icon" style="width: 30px; height: 30px; margin-right: 5px;">
    Delete Product
</button>

                    </form>
                </div>
            @endforeach
        </div>
        @else

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  
        
<div class="border p-3 mb-3">
        <h2 style="color: white; font-size: 24px;">
    <img src="https://cdn.icon-icons.com/icons2/217/PNG/96/male-user-add_25347.png" alt="Icon" style="width: 50px; height: 50px; margin-right: 10px;">
    Register
</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Register">
            </form>
        </div>
        <div class="border p-3 mb-3">
        <h2 style="color: white; font-size: 24px;">
    <img src="https://cdn.icon-icons.com/icons2/217/PNG/96/male-user-accept_25361.png" alt="Icon" style="width: 50px; height: 50px; margin-right: 10px;">
    Login
</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="loginname" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="loginpassword" class="form-control" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Login">
            </form>
        </div>
        @endauth
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-black">
        <div class="container text-center">
            <span class="text-muted">© 2024 Inventory Management System</span>
        </div>
    </footer>
   

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
