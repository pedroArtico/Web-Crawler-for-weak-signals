from urllib.request import urlopen
from bs4 import BeautifulSoup
import urllib.request
import re

file = open('keywords.txt', 'r')
query = file.read()
file.close()
query = query.strip().encode('ascii', 'ignore').decode('ascii').split()
query = "+".join(query)
html = "http://www.google.com/search?q=" + query + "&tbm=nws"
req = urllib.request.Request(html, headers={'User-Agent': 'Mozilla/61.0'})
soup = BeautifulSoup(urlopen(req).read(), "html.parser")
# Regex
reg = re.compile(".*&sa=")

links = []
# Parsing web urls
for item in soup.find_all('h3', attrs={'class': 'r'}):
    line = (reg.match(item.a['href'][7:]).group())
    links.append(line[:-4])

arq = open('urls.txt', 'w')

for l in links:
    arq.write(l)
    arq.write("\n")
arq.close()

a = open('list Urls.txt', 'a+')

for l in links:
    a.write(l)
    a.write("\n")
a.close()