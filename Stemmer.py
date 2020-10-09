import os

from nltk import SnowballStemmer
import codecs
from unicodedata import normalize


def remove_accents(txt):
    return normalize('NFKD', txt).encode('ASCII', 'ignore').decode('ASCII')


st = SnowballStemmer('portuguese')
s = codecs.open('keys.txt', 'r', encoding='latin-1')
word = s.read()
space = " ";
palavras = word.split()
s.close()

os.remove('keys.txt')

for i in palavras:
    word = st.stem(i)
    with codecs.open('keys.txt', 'a+', encoding='latin-1') as f:
        f.write(word)
        f.write(space)