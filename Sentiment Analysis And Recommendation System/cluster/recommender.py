import json
products_file = open("product_sentiment_output.json", "r")
output_file = open("recommender_output.json", "r+")
metadatas_file = open("meta_data.json", "r+")

products = [json.loads(p) for p in products_file]
metadatas = [json.loads(m) for m in metadatas_file]

def get_categories(product_id):
    return list([m['category'] for m in metadatas if m['asin'] == product_id])

def get_products_by_category(category):
    product_asins = [m['asin'] for m in metadatas if m['category'] == category]
    return list([p for p in products if p["ProductID"] in product_asins])

def sort_by_rating(products_list):
    sorted(products_list, key=lambda x: x["float_rating"])

for product in products:
    similar_products = list()
    categories = get_categories(product['ProductID'])
    for category in categories:
        similar_products += get_products_by_category(category)
    sort_by_rating(similar_products)
    priority = 0
    for similar_product in similar_products:
        priority = priority + 1
        output_file.write("{ \"asin\" : " + product['ProductID'] + ", \"recommed_prodid\" : " + similar_product['ProductID'] + ", \"priority\" : " + str(priority) + " }\n")


metadatas_file.close()
output_file.close()
products_file.close()
