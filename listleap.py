y=int(input('Enter the future year upto check : '))
print('List of leap years : ')
leap=[year for year in range (2020,y) if (year%4==0) and (year%100!=0) or (year%400==0)]
print('Leap years : ',leap)
