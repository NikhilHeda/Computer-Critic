import json
import sys

import entity_extraction.rake as ee
import sentiment_analysis.single_sentiment as sa

input_file, output_file = sys.argv[1]

# Reading the last line of the input file
#with open(input_file, "r") as file_handle:
   # all_reviews = file_handle.read()

#review_json = json.loads(all_reviews)[-1]
review_json["ccSummary"] = ee.execute(sys.argv[1])
print(review_json, "\n\n")
review_json["ccSentiment"] = sa.execute(sys.argv[1], review_json["ccSummary"])
print(review_json)

result = review_json["ccSummary"]+":"+str(review_json["ccSentiment"])

return result

'''
with open(output_file, "a+") as file_handle:
    json.dump(review_json, file_handle)
    file_handle.write("\n")

print(review_json)
'''