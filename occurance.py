list=[2,5,6,3,2,1,4,2]
i,target=0,2
while i<len(list):
    if list[i]==target:
        print(target,'found at ',i)
        break
    i=i+1
else:
    print('item not found')
print('No.of occurance is : ',list.count(target))    
