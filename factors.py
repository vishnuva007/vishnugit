n=int(input('Enter the number : '))
print('Factors of ',n,':')
for i in range(1,n+1):
    if not n%i:
        print(i,end=' ')
