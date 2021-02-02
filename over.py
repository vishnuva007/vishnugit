n=input('Enter some integers : ')
a=list(map(int,n.split()))
for i in a:
    if i>100:
        print('over')
    else:
        print(i)
