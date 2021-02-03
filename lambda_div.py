n=int(input('Enter a number : '))
IsDivisible=lambda n:'not divisible' if n%5 else 'divisible'
print(IsDivisible(n))
