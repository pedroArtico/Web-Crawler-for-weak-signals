from urllib.request import urlopen
from bs4 import BeautifulSoup
import urllib.request
import re

file = open('keywords.txt', 'r')
query = file.read()
file.close()
query = query.strip().encode('ascii', 'ignore').decode('ascii').split()
query = "+".join(query)
html = "http://www.google.com/search?q=" + query
req = urllib.request.Request(html, headers={'User-Agent': 'Mozilla/61.0'})
soup = BeautifulSoup(urlopen(req).read(), "html.parser")
# Regex
reg = re.compile(".*&sa=")
x = []
link = []
links =[]
result =[]
# Parsing web urls
for item in soup.findAll('a'):
    x= item["href"]
    link.append(re.findall(r'https?://[^\s<>"]+|www\.[^\s<>"]+', str(x)))
for var in link:
    result = re.search('.*&sa=', str(var))

    if result:
        links.append(result.group(0))

arq = open('urls.txt', 'w')

for l in links:
    x = l.replace("['","")
    arq.write(x.replace("&sa=",""))
    arq.write("\n")
arq.close()

a = open('list Urls.txt', 'a+')

for l in links:
    x = l.replace("['","")
    a.write(x.replace("&sa=",""))
    a.write("\n")
a.close()