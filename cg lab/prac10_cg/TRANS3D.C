#include<stdio.h>
#include<conio.h>
#include<graphics.h>

void main()
{
	int gd = DETECT, gm, l, t, r, b, d;
	int tx, ty;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	l = 40;
	t = 50;
	r = 60;
	b = 70;
	d = 10;

	setfillstyle(EMPTY_FILL, getmaxcolor());
	bar3d(l, t, r, b, d, 1);
	printf("Enter tx and ty:");
	scanf("%d %d", &tx, &ty);


	l = l + tx;
	t = t + ty;
	r = r + tx;
	b = b + ty;
	bar3d(l, t, r, b, d, 1);
	getch();
	closegraph();
}


