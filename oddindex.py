Str1='Thiruvananthapuram'
Str2=''
i=0
while i<len(Str1):
    if not(i%2):
        Str2=Str2+Str1[i]
    i=i+1
print('String : ',Str1)
print('After removing odd indexed characters : ',Str2)
