a=[]
def Sumdig(b):
    if(b==0):
        return 1
    dig=b%10
    Sumdig(b//10)
    a.append(dig)
n=int(input('Enter a number : '))
Sumdig(n)
print(sum(a))
