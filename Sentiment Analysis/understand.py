import nltk.classify.util
from nltk.classify import NaiveBayesClassifier
import json
from math import ceil
from nltk import word_tokenize
from nltk.corpus import stopwords
from nltk.sentiment.vader import SentimentIntensityAnalyzer
stop_words = set(stopwords.words('english'))

def getNGrams(input_list, n):
    print('\n',n,'_Grams:\n')
    return [input_list[i:i+n] for i in range(len(input_list)-(n-1))]


with open('small.json') as file:   # we use 'with' for better exception handling
    for line in file:
        data = json.loads(line)
        print(data['reviewText'])
        print("\n")
        '''
        wordslist = word_tokenize(data['reviewText'].lower())
        filtered_sentence = []
        for w in wordslist:
            if w not in stop_words:
                 filtered_sentence.append(w)
        print(filtered_sentence)
        print("\n")        
        print(getNGrams(filtered_sentence,2))
        print("\n")
        '''
        sid = SentimentIntensityAnalyzer()
        ss = sid.polarity_scores(data['reviewText'])
        for k in sorted(ss):
            print('{0}: {1}, '.format(k, ss[k]), end='')
        print("\n")
        print(data['summary'])
        print()
        sid = SentimentIntensityAnalyzer()
        ss = sid.polarity_scores(data['summary'])
        print(ss['neg'])
        print()
        print(data['overall'])
        print("\n")