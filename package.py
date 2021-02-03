import graphics.rectangle
print('Rectangle')
l=int(input('Enter the length:'))
b=int(input('enter the breadth:'))
print('area:',graphics.rectangle.area(l,b))
print('perimeter:',graphics.rectangle.perimeter(l,b))

from graphics.circle import area as a
from graphics.circle import perimeter as p
print('\n circle')
r=float(input('enter the radius:'))
print('area:',a(r))
print('perimeter:',p(r))

from graphics.dgraphics.cuboid import area as a
from graphics.dgraphics.cuboid import perimeter as p
print('\n cuboid')
l=int(input('enter the length:'))
b=int(input('enter the breadth:'))
h=int(input('enter the height:'))
print('area:',a(l,b,h))
print('perimeter:',p(l,b,h))

from graphics.dgraphics.sphere import*
print('\n sphere')
r=print('area:',area(r))
print('circumference of sphere:',circumference(r))
