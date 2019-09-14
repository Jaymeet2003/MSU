#include<stdio.h>
#include<conio.h>
#include<graphics.h>

void main()
{
	int gd = DETECT, gm,x=10,y=70,x1=50,y1=100,yb,b,r,c;
	initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");

	line(x, y, x1, y);
	line(x, y, x, y1);
	line(x, y1, x1, y1);
	line(x1, y1, x1, y);

	printf("Enter Choice:");
	scanf("%d", &c);
	
	switch (c)
	{
		case 1:
		{
			printf("Enter value for x-shear");
			scanf("%d", &yb);
			b = x + yb;
			r = x1 + yb;
			line(b, y, r, y);
			line(b, y, x, y1);
			line(x, y1, x1, y1);
			line(x1, y1, r, y);
			break;
		}
		case 2:
		{
			printf("Enter value of y-shear");
			scanf("%d", &yb);

			b = y - yb;
			r = y1 - yb;

			line(x, y, x1, b);
			line(x, y, x, y1);
			line(x, y1, x1, r);
			line(x1, r, x1, b);
			break;
		}
	}
	getch();
	closegraph();
}