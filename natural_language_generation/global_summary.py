import json
from rake_nltk import Rake

# Create rake object
rake_object = Rake()

def get_summary(text):
    '''
    This function uses the rake object to extract keyword from the text and rank them by score values.
    It returns a list of tuples containing the score and the keyword string with that score sorted in descending order
    by score.
    '''
    rake_object.extract_keywords_from_text(text)
    return rake_object.get_ranked_phrases_with_scores()

def main():
    '''
    This function reads the json file that contains the reviews and write the keyword phrases with the
    highest score for each review as that review's summary into a json file.
    reviews_small.json is the input file.
    review_summaries.json is the output file.
    '''
    outfile = open("../output/global_summaries.json", "w")
    global_string = ""
    global_dict = {}
    file_name = "0528881469.json"

    with open("../dataset/clusters/0528881469.json", "r") as f:
        for line in f:
            json_data = json.loads(line)
            summary = json_data["summary"]
            global_string = global_string + ". " + summary
        result = get_summary(global_string)
        global_summary = ""
        for i in range(min(5, len(result))):
            global_summary = global_summary + ". " + result[i][1] # This line chooses the phrase with the highest score to be the summary
        global_dict["cc_product_summary"] = global_summary
        global_dict["asin"] = file_name.split(".")[0]

    json.dump(global_dict, outfile)

main()