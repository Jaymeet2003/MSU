#include<stdio.h>
#include<conio.h>
#include<graphics.h>
#include<math.h>

void main()
{
	int gd = DETECT, gm;
	int p,q,x1, x2, x3, y1, y2, y3, t, a1, a2, a3, b1, b2, b3;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	x1 = 230;
	y1 = 230;
	x2 = 260;
	y2 = 150;
	x3 = 300;
	y3 = 230;
	
	line(x1,y1,x2,y2);
	line(x2,y2,x3,y3);
	line(x3, y3, x1, y1);

	printf("Enter angle:");
	scanf("%d", &t);

	p = a2;
	q = y2;

	t = (t * 3.14) / 180;

	a1 = p + (x1 - p) * cos(t) - (y1 - q)*sin(t);
	b1 = q + (x1 - p) * sin(t) + (y1 - q) * cos(t);
	a2 = p + (x2 - p) * cos(t) - (y2 - q) * sin(t);
	b2 = q + (x2 - p) * sin(t) + (y2 - q) * cos(t);
	a3 = p + (x3 - p) * cos(t) - (y3 - q) * sin(t);
	b3 = q + (x3 - p) * sin(t) + (y3 - q) * cos(t);

	line(a1, b1, a2, b2);
	line(a2, b2, a3, b3);
	line(a3, b3, a1, b1);
	getch();
	closegraph();
}


