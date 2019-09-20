#include<stdio.h>
#include<conio.h>
#include<math.h>
#include<graphics.h>

int maxx,maxy, midy, midx, o;
void axis()
{
	getch();
	cleardevice();
	line(midx, o, midx, maxy);
	line(o, midy, maxx, midy );
}

void main()
{
	int x, y, z, x1, y1, x2, y2, gd = DETECT, gm;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	maxx = getmaxx();
	maxy = getmaxy();
	midx = maxx / 2;
	midy = maxy / 2;

	axis();
	bar3d(midx + 50, midy - 100, midx + 60, midy - 90, 5, 1);
	printf("Enter angle:");
	scanf("%d", &o);
	x1 = 50 * cos(o*3.14 / 180) - 100 * sin(o * 3.14 / 180);
	y1 = 50 * sin(o*3.14 / 180) + 100 * cos(o * 3.14 / 180);
	x2 = 60 * cos(o*3.14 / 180) - 90 * sin(o * 3.14 / 180);
	y2 = 60 * sin(o*3.14 / 180) + 90 * cos(o * 3.14 / 180);

	axis();
	printf("after rotation about z-axis:");
	bar3d(midx + x1, midy - y1, midx + x2, midy - y2, 5, 1);

	axis();
	printf("after rotation about y-axis:");
	bar3d(midx + 50, midy - x1, midx + 60, midy - x2, 5, 1);

	axis();
	printf("after rotation about x-axis:");
	bar3d(midx + x1, midy - 100, midx + x2, midy - 90, 5, 1);

	getch();
	closegraph();
}
