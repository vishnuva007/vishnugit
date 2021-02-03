try:
    n=int(input('Enter a number:'))
    if n<90 or n>120:
        raise ValueError('Number not to the range')
except ValueError as a:
    print('Number entered is not in the range 90-120')
    print(a)
else:
    print('Number is : ',n)
