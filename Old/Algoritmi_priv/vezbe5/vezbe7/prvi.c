#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <time.h>


void swap(int *a, int *b){

    int temp=*a;
    *a=*b;
    *b=temp;

}

void sort012(int a[], int a_size){


    int low=0;
    int high=a_size-1;
    int mid=0;


    while(mid<=high){

        switch (a[mid]){

            case 0:
                swap(&a[low], &a[mid]);
                low++; mid++;
                break;

            case 1:
                mid++;
                break;

            case 2:
                swap(&a[mid], &a[high]);
                high--;
                break; 






        }


    }


}

void printArray(int a[], int a_size){

    int i;
    for (i=0; i<a; i++){

        printf("%d", a[i]);
        printf("\n");



    }



}


int main() {

    int arr[]=(0,1,2,0,0,1,1,2,0,1,2);
    int n=sizeof(arr)/sizeof(arr[0]);
    printf("ulazni niz: ");
    printArray(arr, n);
    sort012(arr, n);
    printArray(arr, n);




    return 0;
}