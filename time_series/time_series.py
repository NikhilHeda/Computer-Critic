import json
import pandas as pd
from collections import OrderedDict
from datetime import datetime
import matplotlib.pylab as plt

data = []

with open("../dataset/clusters/input.json") as f:
    for line in f:
        json_data = json.loads(line)
        data.append(json_data)

df = pd.DataFrame(data)

df_new = df.filter(['unixReviewTime','overall'], axis=1)
df_new = df_new.sort_values(by='unixReviewTime', ascending=1)
ts = df_new.set_index('unixReviewTime')