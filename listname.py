s=input('Enter the names seperated with comma : ')
b=list(s.split(','))
print('Names are : ',s)
result=[x for x in b if x[0]=='a']
print('Number of names starts with a : ',len(result))
