#include <stdio.h>
#include <conio.h>
#include <math.h>
#include <graphics.h>
void main()
{
    int x, y, rx, ry, dx, dy, p1, p2;
    int gd = DETECT, gm;
    initgraph(&gd, &gm, "C:\\TURBOC3\\BGI");
    printf("Enter rx and ry:");
    scanf("%d %d", &rx, &ry);
    x = 0;
    y = ry;
    p1 = (((ry) ^ 2) - ((rx) ^ 2) * (ry)) + ((0.25) + ((rx) ^ 2));
    dx = (2 * ((ry) ^ 2) * x);
    dy = (2 * ((rx) ^ 2) * y);

    do
    {
        putpixel(100 + x, 100 + y, 10);
        putpixel(100 - x, 100 + y, 10);
        putpixel(100 - x, 100 - y, 10);
        putpixel(100 + x, 100 - y, 10);

        if (p1 < 0)
        {
            x = x + 1;
            y = y;
            dx = (dx + (2 * ((ry) ^ 2)));
            dy = (dy - (2 * ((rx)) ^ 2));
            p1 = (p1 + dx + ((ry) ^ 2));
        }
        else
        {
            x = x + 1;
            y = y - 1;
            dx = (dx + (2 * ((ry) ^ 2)));
            dy = (dy - (2 * ((rx) ^ 2)));
            p1 = (p1 + dx - dy + ((ry) ^ 2));
        }

    } while (dx < dy);

    p2 = (((ry) ^ 2) * (((x) + (1 / 2)) ^ 2)) + (((rx) ^ 2) * ((y - 1) ^ 2) - (((rx) ^ 2) * ((ry) ^ 2)));

    do
    {
        putpixel(100 + x, 100 + y, 10);
        putpixel(100 - x, 100 + y, 10);
        putpixel(100 - x, 100 - y, 10);
        putpixel(100 + x, 100 - y, 10);

        if (p2 > 0)
        {
            x = x;
            y = y - 1;
            dx = (dy - (2 * (rx) ^ 2));
            p2 = (p2 - dy + ((ry) ^ 2));
        }
        else
        {
            x = x + 1;
            y = y - 1;
            dy = (dy - (2 * ((rx) ^ 2)));
            dx = (dx + (2 * ((ry) ^ 2)));
            p2 = (p2 + dx - dy + ((rx) ^ 2));
        }

    } while (y > 0);
    getch();
    closegraph();
}