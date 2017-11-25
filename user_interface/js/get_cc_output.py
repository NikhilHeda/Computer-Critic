#!/usr/bin/env python

import json
import sys

import entity_extraction.rake as ee
import sentiment_analysis.single_sentiment as sa

input_file, output_file = sys.argv[1], sys.argv[2]

# Reading the last line of the input file
with open(input_file, "r") as file_handle:
    all_reviews = json.load(file_handle)
	
review_json = all_reviews[-1]
review_json["ccSummary"] = ee.execute(review_json)
review_json["ccSentiment"] = sa.execute(review_json)


with open(output_file, "r") as file_handle:
	all = json.load(file_handle)

all.append(review_json)

with open(output_file, "w") as file_handle:
	json.dump(all, file_handle)

print(review_json)