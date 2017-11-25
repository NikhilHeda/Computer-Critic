import json
import sys
import os
import glob

import entity_extraction.rake as ee
import sentiment_analysis.single_sentiment as sa
import natural_language_generation.global_summary as nlg

clusters_dir = "Reviews/";

OUTPUT_ROOT = "Reviews/Output/"

current_dir = os.getcwd()
os.chdir(clusters_dir)
product_files = glob.glob('*.json')

global_summaries = []

for product_file in product_files:
	all_summary = ""
	product_reviews = []
	
	print(product_file)
	
	with open(product_file, "r") as file_handle:
		reviews = json.load(file_handle)
		# Caching asin
		asin = file_handle.name[:-5]
	
	for review_json in reviews:
		# Entity Extraction for summaries
		review_json["ccSummary"] = ee.execute(review_json)
		
		# Sentiment Analysis for reviews
		try:
			review_json["ccSentiment"] = sa.execute(review_json)
		except ZeroDivisionError:
			pass
		
		# Accumulating all reviews
		product_reviews.append(review_json)
		
		# Accumulating all summary
		all_summary += review_json['summary']

	# Natural Language Generation.
	currect_prod_summary = ""
	nlg_result = nlg.get_summary(all_summary)
	for i in range(min(5, len(nlg_result))):
		currect_prod_summary += ". " + nlg_result[i][1]
	
	global_summaries.append({
		"asin": asin,
		"ccProductSummary": currect_prod_summary,
	})
	
	# Writing to files
	with open(current_dir + "\\" + OUTPUT_ROOT + asin + ".json", "w+") as file_handle:
		json.dump(product_reviews, file_handle)
		file_handle.write("\n")

with open(current_dir + "\\" + OUTPUT_ROOT + "product_summaries.json", "w+") as file_handle:
	json.dump(global_summaries, file_handle)
	file_handle.write("\n")


os.chdir(current_dir)