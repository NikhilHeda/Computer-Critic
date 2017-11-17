import json

import networkx as nx
from gensim.models import Word2Vec
from nltk.tokenize import sent_tokenize, word_tokenize
from sklearn.feature_extraction.text import TfidfTransformer

WORD2VEC_MODEL = 'word2vec_model'


def textrank(sents):
    model = Word2Vec(sents, min_count=3)
    matrix = [model.wv[word] for sent in sents for word in sent]

    normalized = TfidfTransformer().fit_transform(matrix)

    similarity_graph = normalized * normalized.T

    nx_graph = nx.from_scipy_sparse_matrix(similarity_graph)
    scores = nx.pagerank(nx_graph)
    return sorted(((scores[i], s) for i, s in enumerate(words)), reverse=True)


def main():
    a = list()
    with open("../Dataset/reviews_small.json", "r") as f:
        for line in f:
            data = json.loads(line)
            a.append(data["reviewText"])

    for i in range(len(a)):
        sents = sent_tokenize(a[i])
        words = [word_tokenize(sentence) for sentence in sents]
        scores = textrank(words)
        print(scores)
        break


main()
