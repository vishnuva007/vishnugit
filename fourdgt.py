import math
a=int(input('Starting range: '))
b=int(input('End : '))
for i in range(a,b+1):
    k=i
    while k>0:
        q=0
        j=k%10
        if j%2==0:
            k=k//10
        else:
            q=1
            break
    if q==0:
        u=math.sqrt(i)
        if((u-math.floor(u))==0):
            print(i)
