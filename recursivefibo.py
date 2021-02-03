def fibon(n):
    if(n<=1):
        return n
    else:
        return (fibon(n-1)+fibon(n-2))
n=int(input('Enter no.of terms : '))
print('Fibonacci Sequence:')
for i in range(n):
    print(fibon(i))
