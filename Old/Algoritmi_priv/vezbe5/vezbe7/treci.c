#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <time.h>
#include <stdbool.h>

bool isPrime(int n){

    if(n<=1){
        return false;

    }

    int i;

    for(i=2; i<=sqrt(n); i++){

        if(n%i==0){
            return false;
        }

    }

return true;
}


int main(){

    FILE *fptr, *parni, *neparni, *prosti;

    int num;

    fptr=fopen("text.txt", "r");
    parni=fopen("parni.txt", "w");
    neparni=fopen("neparni.txt", "w");
    prosti=fopen("prosti.txt", "w");

    if(fptr==NULL || parni==NULL || neparni==NULL || prosti==NULL){
    printf("greska");
    return 1;
    }




    while (fscanf(fptr, "%d",&num)    ==1   ){}





    return 0;
}