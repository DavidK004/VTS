#include <stdio.h>
#include <stdlib.h>

struct student
{
    int index;
    int ocena;
    struct student *nextPtr;
};

void ispisiListu(struct student *ptr){
    int brojac=0;
    while (ptr!=NULL)
    {
        printf("%d cvor:\n", ++brojac);
        printf("index: %d\n", ptr->index);
        printf("ocena: %d\n", ptr->ocena);
        printf("\n");
        ptr=ptr->nextPtr;
    }
    
}


int pretraziListu(struct student *ptr, int key){
    while (ptr!=NULL)
    {
        if(ptr->index==key)
            return 1;

        else
            ptr=ptr->nextPtr;
    }
    return 0;
}


int main() {
    struct student *ptr;
    ptr=(struct student*)malloc(sizeof(struct student));
    struct student *start=NULL;
    start=ptr;

    int brIndex;
    int ocena1;
    printf("unesi index: ");
    scanf("%d", &brIndex);
    printf("unesi ocenu: ");
    scanf("%d", &ocena1);
    ptr->index=brIndex;
    ptr->ocena=ocena1;
    ptr->nextPtr=NULL;
    //end of first cvor

    //other cvors
    char jos='D';
    while ((jos == 'D') || (jos == 'd'))
    {
        printf("more?(D/N)");
        //C moment
        scanf("%c", &jos);
        scanf("%c", &jos);

        if((jos == 'D') || (jos == 'd')){
            printf("unesi index: ");
            scanf("%d", &brIndex);
            printf("unesi ocenu: ");
            scanf("%d", &ocena1);
            ptr->index=brIndex;
            ptr->ocena=ocena1;
            ptr->nextPtr=NULL;
            ptr->nextPtr=start;
            start=ptr;
        }
    }
    ispisiListu(start);
    printf("enter key: ");
    int k;
    scanf("%d", &k);
    int found;
    found=pretraziListu(start, k);
    if(found)
    printf("it has been found");

    else
    printf("not found");

    return 0;
}