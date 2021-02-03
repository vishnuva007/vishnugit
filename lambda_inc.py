n=[700,1200,500,1450,100]
l=list(map(lambda a:a+a*0.1 if a>1000 else a+a*0.05,n))
print('Resultant list : ',l)
