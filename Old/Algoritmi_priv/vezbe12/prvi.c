#include <stdio.h>
#include <stdlib.h>

struct stek {
    char karakter;
    struct stek* nextPtr;
};


int main() {
    struct stek *aktPtr, *startPtr, *endPtr;
    aktPtr=startPtr=endPtr=0;

    FILE *fp;

    fp=fopen("text.txt", "r");
    if(!fp){
        printf("greska");
        return 1;
    }

    char ch;
    int flag=1;
    while((ch=fgetc(fp))!=EOF){
        if(flag==1)
        {
            aktPtr=(struct stek *)malloc(sizeof(struct stek));
            startPtr=aktPtr;
            aktPtr->karakter=ch;
            aktPtr->nextPtr=NULL;
            endPtr=aktPtr;
            flag=0;
        }
        else
        {
            aktPtr=(struct stek *)malloc(sizeof(struct stek));
            aktPtr->karakter=ch;
            aktPtr->nextPtr=startPtr;
            startPtr=aktPtr;

        }
    }

    fclose(fp);

    aktPtr=startPtr;
    while (aktPtr!=NULL)
    {
        printf("%c", aktPtr->karakter);
        aktPtr=aktPtr->nextPtr;
    }
    
    while (startPtr!=NULL)
    {
        struct stek *temp=startPtr;
        printf("\ndeleted %c\n", startPtr->karakter);
        startPtr=startPtr->nextPtr;
        free(temp);
    }
    
    
    return 0;
}