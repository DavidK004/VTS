#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <time.h>


int main(){

int a;
int b;
int c;
int arr[]={1,2,3,4,5};

printf("\nadra %x", &a);
printf("\nadrb %x", &b);
printf("\nadrc %x", &c);

printf("\nadrarr[0] %x", &arr[2]);

int *pt;
pt=&arr[1];


printf("\nadresapt %x", &pt);
printf("\nadresa na koju pokazuje pt %x", pt);
printf("\nvrednost na koju pokazuje adresa %d", *pt);




return 0;
}