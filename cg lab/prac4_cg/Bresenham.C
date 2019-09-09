#include<stdio.h>
#include<conio.h>
#include<graphics.h>
#include<math.h>
#include<stdlib.h>
void main()
{
int gd=DETECT,gm;
int x1,x2,y1,y2,dy,dx,x,y,e=0,exhg=0,i=1,temp,s1,s2;
initgraph(&gd,&gm,"");
printf("enter x1 and y1");
scanf("%d %d",&x1,&y1);
printf("enter x2 and y2");
scanf("%d %d",&x2,&y2);
dx=abs(x2-x1);
dy=abs(y2-y1);
x=x1;
y=y1;
s1=x2-x1;
s2=y2-y1;

if(s1>0)
 s1=1;
else if(s1<0)
 s1=-1;
else
 s1=0;

if(s2>0)
 s2=1;
else if(s2<0)
 s2=-1;
else
 s2=0;

if(dy>dx)
{
temp=dx;
dx=dy;
dy=temp;
exhg=1;
}
else
exhg=0;

e=2*dy-dx;

do
{
putpixel(x,y,WHITE);
while(e>=0)
{
if(exhg==1)
{
x=x+s1;
}
else
{
y=y+s2;
}
e=e-(2*dx);
}

if(exhg==1)
{
y=y+s2;
}
else
{
x=x+s1;
}
e=e+2*dy;
i=i+1;
}
while(i<=dx);
line(120,100,220,200);
getch();
closegraph();
}

