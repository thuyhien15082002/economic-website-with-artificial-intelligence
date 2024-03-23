from flask import jsonify, request, send_file
from flask_cors import cross_origin
import datetime
from models.recommendation import get_product
from models.related import get_related
import json


def registryRouter(app):
    @app.route("/", methods=["GET"])
    @cross_origin()
    def hello():
        return "Hello world"

    @app.route("/api/products/<id>", methods=["GET"])
    @cross_origin()
    def products(id):
        products = get_product(int(id))
        return products, 200

    @app.route("/api/related/<id>", methods=["GET"])
    @cross_origin()
    def related(id):
        products = get_related(int(id), int(200000))
        return products, 200
