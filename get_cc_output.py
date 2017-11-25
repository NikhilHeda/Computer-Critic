import json
import sys

import entity_extraction.rake as ee
import sentiment_analysis.single_sentiment as sa

input_file, output_file = sys.argv[1], sys.argv[2]

review = []

with open(input_file, "r") as file_handle:
    review = json.load(file_handle)

review_json = review[-1]
review_json["ccSummary"] = ee.execute(review_json)
review_json["ccSentiment"] = sa.execute(review_json)

with open(output_file, "a+") as file_handle:
    json.dump(review_json, file_handle)
    file_handle.write("\n")

print(review_json)