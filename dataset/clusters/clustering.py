# this small code clusters the data in groups of unique products. 

import json
import sys

line_count = int(sys.argv[1])

with open('Electronics_5.json') as file:  # we use 'with' for better exception handling
    curr_line = 0
    for line in file:
        data = json.loads(line)
        product_id = data['asin']
        clusterfile = open(product_id + ".json", "a")
        clusterfile.write(line)
        clusterfile.close()
        curr_line += 1

        if curr_line == line_count:
            break
