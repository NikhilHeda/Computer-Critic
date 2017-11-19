import nltk.classify.util
import glob
from nltk.classify import NaiveBayesClassifier
import json
from nltk import word_tokenize
from nltk.corpus import stopwords
from nltk.sentiment.vader import SentimentIntensityAnalyzer
stop_words = set(stopwords.words('english'))
# small algorithmn to calculate rating(out of 5) based on the sentiment result of comment and its summary
def calcRating(neg_review_avg,neu_review_avg,pos_review_avg,neg_summary_avg,neu_summary_avg,pos_summary_avg):
    if pos_review_avg > neg_review_avg and pos_summary_avg > neg_summary_avg:
        
        rate = (2/3*(pos_review_avg - neg_review_avg) + 1/3*(pos_summary_avg - neg_summary_avg))/(1- (2/3*neu_review_avg + 1/3* neu_summary_avg))
        
    elif pos_review_avg > neg_review_avg and  pos_summary_avg <= neg_summary_avg:
        
        rate = (2/3*(pos_review_avg - neg_review_avg) + 1/3*(pos_summary_avg - neg_summary_avg))/(1- (2/3*neu_review_avg + 1/3* neu_summary_avg))
      
    elif pos_review_avg <= neg_review_avg and  pos_summary_avg > neg_summary_avg: 
        
       rate = (2/3*(pos_review_avg - neg_review_avg) + 1/3*(pos_summary_avg - neg_summary_avg))/(1- (2/3*neu_review_avg + 1/3* neu_summary_avg))
        
    elif pos_review_avg <= neg_review_avg and  pos_summary_avg <= neg_summary_avg:   
        
        rate = (2/3*(pos_review_avg - neg_review_avg) + 1/3*(pos_summary_avg - neg_summary_avg))/(1- (2/3*neu_review_avg + 1/3* neu_summary_avg))

    return round((rate*5+5)/2)
for filename in glob.glob('*.json'):
     with open(filename) as file:  
         neg_review_avg =0
         neu_review_avg =0
         pos_review_avg =0
         neg_summary_avg =0
         neu_summary_avg =0
         pos_summary_avg =0
         rate=0
         line_count=0
         prod_count=0
         for line in file:
              data = json.loads(line)
             
              # using nltk library , sentimentanalyser module we can find the sentiment values of a sentence.
              sid = SentimentIntensityAnalyzer()
              sreview = sid.polarity_scores(data['reviewText'])
              # this is sum of all the negative , positive and neutral rating of all the reviews of a single product
              neg_review_avg = neg_review_avg + sreview['neg'] 
              neu_review_avg = neu_review_avg + sreview['neu']
              pos_review_avg = pos_review_avg + sreview['pos']
                
              ssummary = sid.polarity_scores(data['summary'])
              # this is sum of all the negative , positive and neutral rating of all the summary of the reviews of a single product
              neg_summary_avg = neg_summary_avg + ssummary['neg']
              neu_summary_avg = neu_summary_avg + ssummary['neu']
              pos_summary_avg = pos_summary_avg + ssummary['pos']
              
              line_count = line_count + 1
              # calculating the average using the sums.
         neg_review_avg = neg_review_avg / line_count  
         neu_review_avg = neu_review_avg / line_count   
         pos_review_avg = pos_review_avg / line_count
         neg_summary_avg = neg_summary_avg / line_count
         neu_summary_avg = neu_summary_avg / line_count
         pos_summary_avg = pos_summary_avg / line_count
         prod_count = prod_count + 1
         rate = calcRating(neg_review_avg,neu_review_avg,pos_review_avg,neg_summary_avg,neu_summary_avg,pos_summary_avg)
         if prod_count == 1:
              print("[{ \"ProductID\" : ",data['asin']," , \"neg_review_avg\" : ",neg_review_avg," , \"neu_review_avg\" : ",neu_review_avg," , \"pos_review_avg\" : ",pos_review_avg," , \"neg_summary_avg\" : ",neg_summary_avg," , \"neu_summary_avg\" : ",neu_summary_avg," , \"pos_summary_avg\" : ",pos_summary_avg," , \"rating\" : ",rate," }",end="")
         else:
              print(", { \"ProductID\" : ",data['asin']," , \"neg_review_avg\" : ",neg_review_avg," , \"neu_review_avg\" : ",neu_review_avg," , \"pos_review_avg\" : ",pos_review_avg," , \"neg_summary_avg\" : ",neg_summary_avg," , \"neu_summary_avg\" : ",neu_summary_avg," , \"pos_summary_avg\" : ",pos_summary_avg," , \"rating\" : ",rate," }",end="")
              
print("]")         
    





      
        