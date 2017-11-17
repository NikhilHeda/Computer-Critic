import json

import networkx as nx
from gensim.models import Word2Vec
from nltk.tokenize.punkt import PunktSentenceTokenizer
from sklearn.feature_extraction.text import TfidfTransformer, CountVectorizer


def textrank(document):
    sentence_tokenizer = PunktSentenceTokenizer()
    sentences = sentence_tokenizer.tokenize(document)

    bow_matrix = CountVectorizer().fit_transform(sentences)
    normalized = TfidfTransformer().fit_transform(bow_matrix)

    similarity_graph = normalized * normalized.T

    nx_graph = nx.from_scipy_sparse_matrix(similarity_graph)
    scores = nx.pagerank(nx_graph)
    return sorted(((scores[i], s) for i, s in enumerate(sentences)), reverse=True)


def main():
    a = list()
    with open("../Dataset/reviews_small.json", "r") as f:
        for line in f:
            data = json.loads(line)
            a.append(data["reviewText"])
    '''
    for i in range(len(a)):
        summary = textrank(a[i])[0][1]
        print(summary)
        print()
        # a[i] = a[i].split()
    '''

    print(a)
    model = Word2Vec(a)
    print(model.wv.vocab)
    temp = model["poems"]
    print(temp)


main()
