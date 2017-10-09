import nltk.classify.util
from nltk.classify import NaiveBayesClassifier
import json
from math import ceil
 
def word_feats(words):
    return dict([(word, True) for word in words])
	
negfeats = []
posfeats = []
#neufeats = []
c1,c2 = 0,0
with open('reviews_Electronics_5.json') as file:
	for line in file:
		data = json.loads(line)
		rating = data['overall']
		if rating > 2 and c1 < 20000:
			c1 += 1
			posfeats.append((word_feats(data['reviewText'].split(" ")), 'pos'))
		elif rating < 3 and c2 <20000:
			c2 += 1
			negfeats.append((word_feats(data['reviewText'].split(" ")), 'neg'))
		'''elif rating == 3 and c3 < 10000:
			c3 += 1
			neufeats.append((word_feats(data['reviewText'].split(" ")), 'neu'))'''
		if c1+c2 == 40000:
			break
#negfeats = [(word_feats(data.words(fileids=[f])), 'neg') for f in negids]
#posfeats = [(word_feats(data.words(fileids=[f])), 'pos') for f in posids]
 
negcutoff = ceil(len(negfeats)*8/10)
poscutoff = ceil(len(posfeats)*8/10)
#neucutoff = ceil(len(neufeats)*9/10) 

trainfeats = negfeats[:negcutoff] + posfeats[:poscutoff] 
testfeats = negfeats[negcutoff:] + posfeats[poscutoff:] 
print('train on %d instances, test on %d instances' % (len(trainfeats), len(testfeats)))
 
classifier = NaiveBayesClassifier.train(trainfeats)
print('accuracy:', nltk.classify.util.accuracy(classifier, testfeats))
classifier.show_most_informative_features()