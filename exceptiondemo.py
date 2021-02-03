try:
    a=int(input('Enter numerator : '))
    b=int(input('Enter denominator : '))
    print('Result after division : ',(a/b))
except(ZeroDivisionError,ValueError)as  n:
    print(n)
else:
    print('Successfully executed')
finally:
    print('Executed')
    
