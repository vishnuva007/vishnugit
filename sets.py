set1={10,8,6,4}
set2={2,5,6,9}
print('set 1 : ',set1)
print('set 2 : ',set2)
if(len(set1)==len(set2)):
    print('equal sets ')
else:
    print('non-equal ')
if(sum(set1)==sum(set2)):
   print('sum of elements are equal ')
else:
    print('sum of elements are not equal ')
if(set1.isdisjoint(set2)):
    print('no commom elements ')
else:
    print('have commom elements : ',set1.intersection(set2))
