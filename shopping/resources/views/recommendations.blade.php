<!DOCTYPE html>
<html>

<head>
    <title>Recommended Products</title>
    <style>
    /* Add your CSS styles here */
    </style>
</head>

<body>
    <h1>Recommended Products</h1>



    <ul>
        @foreach($recommended_products as $product)

        <li>{{$product->name}}</li>
        <li>{{$product->price}} </li>

        @endforeach
    </ul>


    <!-- Add your additional HTML content here -->

    <script>
    // Add your JavaScript code here
    </script>
</body>

</html>