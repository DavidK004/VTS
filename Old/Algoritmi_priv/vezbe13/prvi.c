#include <stdio.h>
#include <stdlib.h>

struct student{
    int index;
    int ocena;
    struct student *nextPtr;
};

void ispsListe(struct student *ptr){
    int brojac=0;
    while(ptr != 0){
        brojac++;
        printf("%d. cvor: \n", brojac);
        printf("index: %d\n", ptr->index);
        printf("Ocena: %d\n", ptr->ocena);
        ptr=ptr->nextPtr;

    }

}


int main() {
    struct student *aktPtr, *startPtr, *endPtr, *prethodni, *sledeci;
    aktPtr=(struct student*)malloc(sizeof(struct student));
    startPtr=endPtr=prethodni=aktPtr;
    aktPtr->nextPtr=NULL;

    printf("Indeks: ");
    scanf("%d", &aktPtr->index);
    int ocena1;
    printf("ocena: ");
    scanf("%d", &ocena1);
    aktPtr->ocena=ocena1;

    char jos='D';
    char temp;
    while (jos=='D' || jos=='d')
    {
        scanf("%c", &temp);
        printf("more?");
        scanf("%c", &jos);
        printf("\n");
        if(jos=='d' || jos=='D'){
            aktPtr=(struct student*)malloc(sizeof(struct student));

            printf("Indeks: ");
            scanf("%d", &aktPtr->index);
            printf("ocena: ");
            scanf("%d", &aktPtr->ocena);



            if(aktPtr->index<aktPtr->index){
            aktPtr->nextPtr=startPtr;
            startPtr=aktPtr;
            prethodni=startPtr;
            sledeci=startPtr->nextPtr;
            }
            else{
                if(aktPtr->index>endPtr->index){
                    aktPtr->nextPtr=NULL;
                    endPtr->nextPtr=aktPtr;
                    endPtr=aktPtr;
                    prethodni=startPtr;
                    sledeci=startPtr->nextPtr;
                }
                else{
                    prethodni=startPtr;
                    sledeci=startPtr->nextPtr;
                    while (aktPtr->index>prethodni->index && aktPtr->index>sledeci->index && prethodni->nextPtr!=NULL)
                    {
                        prethodni=prethodni->nextPtr;
                        sledeci=sledeci->nextPtr;
                    }

                    prethodni->nextPtr=aktPtr;
                    aktPtr->nextPtr=sledeci;
                    
                }
            }
            
        }
        
    }
    
    printf("lista: \n");
    ispsListe(startPtr);

    ("freeing memory: \n");
    aktPtr=startPtr;
    for (int i = 1; aktPtr!=NULL; i++)
    {
        sledeci=aktPtr->nextPtr;
        free(aktPtr);
        aktPtr=sledeci;
    }
    

    return 0;
}