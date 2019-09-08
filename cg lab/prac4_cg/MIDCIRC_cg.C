#include<stdio.h>
#include<conio.h>
#include<math.h>
#include<graphics.h>
void main()
{
int gd=DETECT,gm;
int x,y,r,x1,y1;
float p=0;
clrscr();
initgraph(&gd,&gm,"C:\\TURBOC3\\BGI");
printf("enter center and radius of circle:");
scanf("%d %d %d",&x1,&y1,&r);
x=0;
y=r;
p=1.25-r;
do
{
putpixel(x1+x,y1+y,10);
putpixel(x1-x,y1+y,10);
putpixel(x1+x,y1-y,10);
putpixel(x1-x,y1-y,10);
putpixel(x1+y,y1+x,10);
putpixel(x1-y,y1+x,10);
putpixel(x1-y,y1-x,10);
putpixel(x1+y,y1-x,10);
if(p<0)
{
x=x+1;
y=y;
p=p+2*x+1;
}
else{
x=x+1;
y=y-1;
p=p+2*x-2*y+1;
}
}while(x<y);
delay(1000);
getch();
closegraph();
}