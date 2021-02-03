class LoginError(Exception):
    pass
try:
    user_name1='abcde'
    password1='7ax8'
    user_name2=input('Enter username : ')
    password2=input('Enter password : ')
    if user_name2==user_name1 and password1==password2:
        print('Successfully login')
    else:
        raise LoginError('Invalid username or password')
except LoginError as a:
    print(a)
