words={ }
line='love is like a red red rose love is life'
for w in line.split():
    words[w]=words.get(w,0)+1
print(words)
