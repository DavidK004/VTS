 
 #include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <time.h>
#include <stdbool.h>
 
 
 
 
 int main(){
  int s=0;
    while(s++<10)   {
      if(s<4 && s<9)
         continue;
      printf("%d",s);
   }

}


 