a=int(input('Enter the number of terms : '))
f1=0
f2=1
if(a<=1):
    print(f1)
if(a==2):
    print(f1)
    print(f2)
else:
    print(f1)
    print(f2)
    for i in range(a-2):
        f3=f1+f2
        print(f3)
        f1=f2
        f2=f3
