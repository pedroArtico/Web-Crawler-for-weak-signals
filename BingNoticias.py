from urllib.request import urlopen
from bs4 import BeautifulSoup
import urllib.request
import re

file = open('keywords.txt', 'r')
query = file.read()
file.close()
query = query.strip().encode('ascii', 'ignore').decode('ascii').split()
query = "+".join(query)
html = "https://www.bing.com/news/search?q=" + query + "&FORM=HDRSC6"
req = urllib.request.Request(html, headers={'User-Agent': 'Mozilla/61.0'})
soup = BeautifulSoup(urlopen(req).read(), "html.parser")
links = str(soup.findAll('div', attrs={'class': 't_t'}))
url = re.findall('http[s]?://(?:[a-zA-Z]|[0-9]|[$-_@.&+]|[!*\(\),]|(?:%[0-9a-fA-F][0-9a-fA-F]))+', links)
arq = open('urls.txt', 'w')
for l in url:
    arq.write(l)
    arq.write('\n')