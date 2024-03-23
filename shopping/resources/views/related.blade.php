<!DOCTYPE html>
<html>

<head>
    <title>Related Products</title>
    <style>
    /* Add your CSS styles here */
    </style>
</head>

<body>
    <h1>RelatedRelated Products</h1>




    <ul>
        @foreach($product as $product)
        <li>{{ $product }}</li>
        @endforeach
    </ul>


    <!-- Add your additional HTML content here -->

    <script>
    // Add your JavaScript code here
    </script>
</body>

</html>