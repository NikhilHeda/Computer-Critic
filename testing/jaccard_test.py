#jaccard
import nltk

def jaccard(a_results, e_results):
    for i in range(len(a_results)):
        a_review_words = nltk.word_tokenize(a_results[i])
        e_review_words = nltk.word_tokenize(e_results[i])

        jc = 0
        for i in a_review_words:
            for j in e_review_words:
                if i == j:
                    jc = jc + 1

        a_review_words = set(a_review_words)
        e_review_words = set(e_review_words)
        total = a_review_words.union(e_review_words)
        total_size = len(total)
        jc_sim = jc/total_size
        print("The similarity measure computed using Jaccard's formula is " + str(jc_sim))

# The expected results
e_results = ["samsung tv is excellent", "sometimes disconnects itself", "very satisfied with price, much less"]
# The actual results from the RAKE module
a_results = ["samsung 52 &# 34", "sometimes disconnects", "price much less"]
jaccard(a_results, e_results)