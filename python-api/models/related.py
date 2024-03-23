import pandas as pd
import mysql.connector

# Connect to the database
conn = mysql.connector.connect(
    host="127.0.0.1", user="root", password="", database="shopping"
)

# Load data from the product table
products = pd.read_sql("SELECT * FROM product", conn)

# Load data from the category table
categories = pd.read_sql("SELECT * FROM category", conn)

# Merge data frames to create a complete view of the data
merged = pd.merge(products, categories, left_on="category_id", right_on="id")


# Define a function to get recommended products based on category and price
def get_recommendations(product_id, max_price_diff):
    # Get the category and price of the current product

    current_category = merged.loc[merged["id_x"] == product_id, "name_y"].iloc[0]
    current_price = merged.loc[merged["id_x"] == product_id, "price"].iloc[0]

    # Get all products in the same category as the current product
    same_category_products = merged[merged["name_y"] == current_category][
        ["id_x", "name_x", "price"]
    ].values.tolist()

    # Remove the current product from the list of same category products
    same_category_products = [p for p in same_category_products if p[0] != product_id]

    # Filter products by maximum price difference
    same_category_products = [
        p for p in same_category_products if abs(p[2] - current_price) <= max_price_diff
    ]

    # Calculate the Euclidean distance between prices of products
    prices = [p[2] for p in same_category_products]
    price_diffs = [abs(p - current_price) for p in prices]
    max_price_diff = max(price_diffs)
    price_similarities = [1 - (p / max_price_diff) for p in price_diffs]

    # Calculate the cosine similarity between products' category and price
    category_price_similarities = []
    for p in same_category_products:
        category_similarity = int(p[1] == current_category)
        price_similarity = price_similarities[same_category_products.index(p)]
        similarity = category_similarity * 0.5 + price_similarity * 0.5
        category_price_similarities.append((p[0], p[1], p[2], similarity))
        print(category_price_similarities)

    # Sort products by similarity in descending order
    category_price_similarities = sorted(
        category_price_similarities, key=lambda x: x[3], reverse=True
    )

    # Return the list of recommended products
    return [(p[0], p[1], p[2]) for p in category_price_similarities]


# Call the function to get recommended products for product ID 50 with maximum price difference of 500,000 VND
def get_related(product_id, category_price):
    recommended_products = get_recommendations(product_id, category_price)
    print(recommended_products)
    products = []
    for p in recommended_products:
        product_id = p[0]
        product_name = p[1]
        product_price = p[2]
        product_image = merged.loc[merged["id_x"] == product_id, "image"].iloc[0]
        products.append(
            {
                "name": product_name,
                "price": str(product_price),
                "id": str(product_id),
                "image": product_image,
            }
        )
    return products
