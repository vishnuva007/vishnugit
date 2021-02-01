s=input('Enter a string : ')
print('The string is : ',s)
length=len(s)
if s[-3:]=='ing':
    s+='ly'
else:
    s+='ing'
print('result : ',s)    
