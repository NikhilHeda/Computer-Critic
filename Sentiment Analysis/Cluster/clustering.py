with open('reviews_Electronics_5.json') as file:   # we use 'with' for better exception handling
    for line in file:
        data = json.loads(line)
        product_id = data['asin']
        clusterfile = open(product_id+".json","a")
        clusterfile.write(line)
        clusterfile.close()
        
    