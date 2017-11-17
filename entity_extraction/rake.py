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

def execute(review):
    json_data = json.loads(review)
    text = json_data["reviewText"]
    summary = get_summary(text)[0][1]
    return summary


def main():
    '''
    This function reads the json file that contains the reviews and write the keyword phrases with the
    highest score for each review as that review's summary into a json file.
    reviews_small.json is the input file.
    review_summaries.json is the output file.
    '''
    outfile = open("../output/review_summaries.json", "w")
    list_a = []

    with open("../dataset/clusters/0594481813.json", "r") as f:
        for line in f:
            json_data = json.loads(line)
            review = json_data["reviewText"]
            summary = get_summary(review)[0][1] # This line chooses the phrase with the highest score to be the summary
            json_data["cc_summary"] = summary
            list_a.append(json_data)

    json.dump(list_a, outfile)

if __name__ == "__main__":
    main()