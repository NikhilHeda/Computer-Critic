import json
import sys

import entity_extraction.rake as ee
import sentiment_analysis.single_sentiment as sa

input_file, output_file = sys.argv[1], sys.argv[2]

# Reading the last line of the input file
with open(input_file, "r") as file_handle:
    line_list = file_handle.readlines()

review = line_list[-1]
review_json = json.loads(review)
review_json["cc_summary"] = ee.execute(review)
review_json["cc_sentiment"] = sa.execute(review)

with open(output_file, "a+") as file_handle:
    json.dump(review_json, file_handle)
    file_handle.write("\n")
