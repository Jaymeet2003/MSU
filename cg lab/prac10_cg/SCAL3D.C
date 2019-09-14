#include<stdio.h>
#include<conio.h>
#include<graphics.h>

void main()
{
	int gd = DETECT, gm, l, t, r, b,d;
	int sx, sy;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	l = 20;
	t = 50;
	r = 70;
	b = 40;
	d = 10;

	bar3d(l, t, r, b, d, 1);
	printf("Enter sx and sy:");
	scanf("%d %d", &sx, &sy);


	l = l * sx;;
	t = t * sy;
	r = r * sx;
	b = b * sy;
	bar3d(l, t, r, b, d, 1);
	getch();
	closegraph();
}


