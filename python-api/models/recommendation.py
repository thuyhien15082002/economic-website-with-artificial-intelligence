import pandas as pd
import numpy as np
import mysql.connector
import json

conn = mysql.connector.connect(
    host="127.0.0.1", user="root", password="", database="shopping"
)

# Load data from the orders table
orders = pd.read_sql("SELECT * FROM `orders`", conn)

# Load data from the detail_order table
details = pd.read_sql("SELECT * FROM orders_detail", conn)

# Load data from the users table
users = pd.read_sql("SELECT * FROM users", conn)

# Load data from the product table
products = pd.read_sql("SELECT * FROM product", conn)

# Load data from the category table
categories = pd.read_sql("SELECT * FROM category", conn)

# Merge data frames to create a complete view of the data
merged = pd.merge(
    users, orders, left_on="id", right_on="users_id", suffixes=("_users", "_orders")
)
merged = pd.merge(
    merged,
    details,
    left_on="id_orders",
    right_on="orders_id",
    suffixes=("_merged", "_details_order"),
)
merged = pd.merge(
    merged,
    products,
    left_on="product_id",
    right_on="id",
    suffixes=("_merged", "_product"),
)
merged = pd.merge(
    merged,
    categories,
    left_on="category_id",
    right_on="id",
    suffixes=("_merged", "_category"),
)


# Get a list of unique user IDs
user_ids = merged["users_id"].unique()


# Define a function to calculate the similarity between two users based on their purchase history
def calculate_similarity(user1_purchases, user2_purchases):
    user1_set = set(user1_purchases)
    user2_set = set(user2_purchases)
    intersection = user1_set.intersection(user2_set)
    return len(intersection)


# Define a function to get recommended products for a given user
def get_recommended_products(user_id):
    # Get the purchase history of the user
    user_purchases = merged.loc[merged["users_id"] == user_id, "name_merged"]
    # Initialize a dictionary to store the similarity scores between the user and all other users
    similarities = {}

    # Iterate over all other users and calculate their similarity score with the given user
    for other_user_id in user_ids:
        if other_user_id != user_id:
            other_user_purchases = merged.loc[
                merged["users_id"] == other_user_id, "name_merged"
            ]
            similarity = calculate_similarity(user_purchases, other_user_purchases)
            if similarity:
                similarities[other_user_id] = similarity

    # Sort the similarity scores in descending order and select the top 3 users with the highest scores
    top_similarities = sorted(similarities.items(), key=lambda x: x[1], reverse=True)[
        :3
    ]

    # Get a list of products purchased by the top 3 similar users that the given user has not purchased
    similar_products = []
    for similar_user_id, similarity_score in top_similarities:
        similar_user_purchases = merged.loc[
            merged["users_id"] == similar_user_id, "name_merged"
        ]
        for product in similar_user_purchases:
            if product not in user_purchases and product not in similar_products:
                similar_products.append(product)

    return similar_products


def get_product(user_id):
    recommended_products = get_recommended_products(user_id)
    print(f"Recommended products for user {user_id}:")
    products = []
    for product_name in recommended_products:
        product_info = merged.loc[merged["name_merged"] == product_name]
        image = product_info["image"].iloc[0]
        price = product_info["price_merged"].iloc[0]
        quantity = product_info["quantity"].iloc[0]
        products.append(
            {
                "name": product_name,
                "price": str(price),
                "quantity": str(quantity),
                "image": image,
            }
        )

    return products
