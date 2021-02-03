def string_fun(str):
    if str[:2]=='Is':
        return str
    else:
        str='Is'+str
        return str
str=input('Enter a string : ')
print('New string : ',string_fun(str))
