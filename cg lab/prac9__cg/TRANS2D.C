#include<stdio.h>
#include<conio.h>
#include<graphics.h>

void main()
{
int gd=DETECT,gm,l,t,r,b;
int tx,ty;
initgraph(&gd,&gm,"C:\\TURBOC3\\BGI");

l=200;
t=300;
r=10;
b=200;

rectangle(l,t,r,b);
printf("Enter tx and ty:");
scanf("%d %d",&tx,&ty);


l = l + tx;
t = t + ty;
r = r + tx;
b = b + ty;
rectangle(l,t,r,b);
getch();
closegraph();
}


