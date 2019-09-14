#include<stdio.h>
#include<conio.h>
#include<graphics.h>

void main()
{
	int gd = DETECT, gm, l, t, r, b;
	int sx, sy;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	l = 70;
	t = 61;
	r = 76;
	b = 55;

	rectangle(l, t, r, b);
	printf("Enter sx and sy:");
	scanf("%d %d", &sx, &sy);


	l = l * sx;;
	t = t * sy;
	r = r * sx;
	b = b * sy;
	rectangle(l, t, r, b);
	getch();
	closegraph();
}


