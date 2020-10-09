from urllib.request import urlopen
from bs4 import BeautifulSoup
import urllib.request

file = open('keywords.txt', 'r')
query = file.read()
file.close()
query = query.strip().split()
query = "+".join(query)
html = "https://www.bing.com/search?q="+query+"&FORM=HDRSC1"
req = urllib.request.Request(html, headers={'User-Agent': 'Mozilla/61.0'})
soup = BeautifulSoup(urlopen(req).read(), "html.parser")
arq = open('urls.txt', 'w')
a = open('list Urls.txt', 'a+')
for div in soup.findAll('li', attrs={'class': 'b_algo'}):
    arq.write(div.find('a')['href'])
    arq.write("\n")
    a.write(div.find('a')['href'])
    a.write("\n")