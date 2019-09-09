#include<stdio.h>
#include<conio.h>
#include<graphics.h>
#include<stdlib.h>
#include<math.h>
void main()
{
int i=1;
int x,x,y,x1,x2,y1,y2,dx,dy,len;
int gd=DETECT,gm;
initgraph(&gd,&gm,"");

printf("Enter the value of x1,y1");
scanf("%d%d",&x1,&y1);

printf("Enter the value of x2,y2");
scanf("%d%d",&x2,&y2);

dx=abs(x2-x1);
dy=abs(y2-y1);

if(dx>dy)
len=dx;
else
len=dy;

dx=dx/len;
dy=dy/len;

x=x1;
y=y1;

while(i<=len)
{
putpixel(x,y,3);
x=x+dx;
y=y+dy;
i=i+1;
}
getch();
closegraph();
}