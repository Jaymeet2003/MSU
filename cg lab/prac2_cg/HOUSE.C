#include <graphics.h>
#include <stdlib.h>
#include <stdio.h>
#include <conio.h>

int main(void)
{
   /* request auto detection */
   int gdriver = DETECT, gmode, errorcode;

   initgraph(&gdriver, &gmode, "");
   rectangle(100,230,500,450);
   line(100,230,300,50);
   line(300,50,500,230);
   rectangle(250,350,350,450);
   rectangle(150,270,200,320);
   rectangle(400,270,450,320);

   getch();
   closegraph();
   return 0;
}

