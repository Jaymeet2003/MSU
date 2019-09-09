
#include <graphics.h>
#include <stdlib.h>
#include <stdio.h>
#include <conio.h>

int main(void)
{
   int gd=DETECT,gm,errorcode;

   initgraph(&gd,&gm,"");
   ellipse(200,200,0,360,50,30);
   line(250,200,280,170);
   line(280,170,280,230);
   line(280,230,250,200);
   circle(160,190,3);

   getch();
   closegraph();
}

