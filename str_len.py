s=input('Enter a string : ')
a=s.split()
print('The string : ',s)
max=0
word=0
for i in a:
    if max==len(i):
        word=1
    if max<len(i):
        word=0
        max=len(i)
    if word==1:
        print('BINGO')
    else:
        print('length of longest word: ',max)
