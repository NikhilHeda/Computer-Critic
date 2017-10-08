import json
from pprint import pprint

js = open("reviews_small.json").read()
data = json.loads(js)
