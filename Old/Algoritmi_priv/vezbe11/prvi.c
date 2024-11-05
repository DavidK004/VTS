#include <stdio.h>
#include <stdlib.h>
#include <time.h>


int readFile(int niz[]){
    int i=0;
     FILE *fp;
    fp=fopen("data.txt", "r");
    if(!fp){

        printf("greska");
        return 1;

    }
    printf("citanje fajla: ");
    while(fscanf(fp, "%d", &niz[i])!=EOF){
        if(niz[i]<10){
        printf("%d, " , niz[i]);
        i++;}

        else{
            printf("%d_%d, ", niz[i]/10, niz[i]%10);
            i++;
        }
    }
    fclose(fp);
    return i;
}

void rotateMatrix(int matrica[5][5]){
    int tempMatrix[5][5];
    for (int j=0; j<5; j++){
        for(int i=0; i<5; i++){
            tempMatrix[j][i]=matrica[i][j];
        }
    }


    printf("rotated: \n");
    for (int u = 0; u < 5; u++)
    {
        for (int k = 0; k < 5; k++)
        {
            printf("%d ", tempMatrix[u][k]);
        }
        printf("\n");
    }
    
}

int countNums(int niz[], int t, int key){
    int counter=0;
    for(int i=0; i<t; i++){
        if(niz[i]==key)
        counter++;
    }
    return counter;
}


int bubbleSort (int niz[], int t){
    int i,j, temp;
    for (i = t-1; i >= 0; i--) { 
  for (j = 1; j <= i; j++){ 
  if (niz[j-1] < niz[j]) { 
    temp = niz[j-1]; 
    niz[j-1] = niz[j];
    niz[j] = temp;
   } 
  } 
 } 

}

void deleteNums(int niz[], int t, int delKey){
    for(int i=0; i<t; i++){

        if(i==delKey){
            for(int j=i; j<t; j++){
                niz[j]=niz[j+1];
            }
        }

    }
}

int printToMatrix(int matrica[5][5]){
    int i=0,j=0;
    FILE *fp;
    fp=fopen("data.txt", "r");
    if(!fp){

        printf("greska");
        return 1;

    }
    int num=0;
    for (i=0; i<5; i++){
        for(j=0; j<5; j++){
            fscanf(fp, "%d", &matrica[i][j]);
                        printf("%d ", matrica[i][j]);

        }
        printf("\n");
    }
    /*for(int u=0; u<5; u++){
        for(int y=0; y<5; y++)
            printf("%d ", matrica[u][y]);

        printf("\n");
    }*/
    fclose(fp);
}

int randBroj(){
    int min=5;
    int max=14;

    int r;
    r=rand()%(max-min+1)+min;

    return r;
}


int main() {
    srand(time(0));
    int niz[50];
    int t=readFile(niz);
    int k;
    printf("\nkoji broj trazimo: ");
    scanf("%d", &k);

    int br=countNums(niz, t, k);
    printf("\nbroj %d se pojavljuje %d puta\n", k,br);




    printf("\nSortiran niz: ");
    bubbleSort(niz, t);
    for (int h=0; h<t; h++){
        printf("%d ", niz[h]);
    }


int delKey;
printf("\nunesite poziciju za brisanje (broj koji je manji od %d): ", t);
scanf("%d", &delKey);
deleteNums(niz, t, delKey);
    printf("\nniz bez broja na poziciji %d: ", delKey);
   for (int h=0; h<t-1; h++){
        printf("%d ", niz[h]);
    } 


    int matrica[5][5];
    printf("\n");
    printToMatrix(matrica);

    rotateMatrix(matrica);

    int randy;
    randy=randBroj();
    printf("\n random number is %d\n", randy);
    return 0;
}