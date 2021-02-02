list=[4,17,24,11,95,64,138,375,242,237,40,110]
i=0
while i<len(list):
    if list[i]==237:
        print(list[i])
        break
    else:
        if not list[i]%2:
            print(list[i])
        i=i+1    
