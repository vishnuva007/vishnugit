c=input('Enter colors seperated with comma : ')
list=c.split(',')
print('List of colors : ',list)
new=[list[i] for i in range(len(list)) if i%2==0]
print('Alternative colors are : ',new)
