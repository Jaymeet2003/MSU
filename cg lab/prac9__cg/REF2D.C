#include<stdio.h>
#include<conio.h>
#include<graphics.h>

void main()
{
	int gd = DETECT, gm;
	int maxx,maxy,x,y,c , l, t, r, b;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	x = getmaxx() / 2;
	y = getmaxy() / 2;
	maxx = getmaxx();
	maxy = getmaxy();
	line(0,y,maxx,y);
	line(x, 0, x, maxy);

	l = 20;
	t = 50;
	r = 40;
	b = 60;

	rectangle(l,t,r,b);
	printf("enter choice:");
	scanf("%d",&c);

	switch (c)
	{
	case 1:
		l = 640 - l;
		r = 640-r;
		t = 50;
		b = 60;

		rectangle(l, t, r, b);
		break;
	case 2:
		l = l;
		r = r;
		t = 480 - t;
		b = 480 - b;
		rectangle(l,t,r,b);
		break;
	case 3:
		l = 640 - l;
		r = 640 - r;
		t = 480 - t;
		b = 480 - b;
		rectangle(l, t, r, b);
		break;

	default:
		break;
	}

	getch();
	closegraph();
}