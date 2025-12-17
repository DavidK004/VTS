#include "pitches.h"
#include <LiquidCrystal_I2C.h>

#define BUZZER_PIN 27
#define GREEN_PIN 19
#define RED_PIN 18

int lcdColumns = 16;
int lcdRows = 2;

LiquidCrystal_I2C lcd(0x27, lcdColumns, lcdRows);

int melody[] = {
  NOTE_E5, NOTE_E5, NOTE_E5,
  NOTE_E5, NOTE_E5, NOTE_E5,
  NOTE_E5, NOTE_G5, NOTE_C5, NOTE_D5,
  NOTE_E5,
  NOTE_F5, NOTE_F5, NOTE_F5, NOTE_F5,
  NOTE_F5, NOTE_E5, NOTE_E5, NOTE_E5, NOTE_E5,
  NOTE_E5, NOTE_D5, NOTE_D5, NOTE_E5,
  NOTE_D5, NOTE_G5
};

int durations[] = {
  8, 8, 4,
  8, 8, 4,
  8, 8, 8, 8,
  2,
  8, 8, 8, 8,
  8, 8, 8, 16, 16,
  8, 8, 8, 8,
  4, 4
};

void setup()
{
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(GREEN_PIN, OUTPUT);
  pinMode(RED_PIN, OUTPUT);

    lcd.init();
                     
  lcd.backlight();
}

void loop()
{
   lcd.setCursor(0, 0);
  lcd.print("Merry Christmas!");
  int size = sizeof(durations) / sizeof(int);

  for (int note = 0; note < size; note++) {
    //to calculate the note duration, take one second divided by the note type.
    //e.g. quarter note = 1000 / 4, eighth note = 1000/8, etc.
    int duration = 1000 / durations[note];

        if (melody[note] == NOTE_C5 || melody[note] == NOTE_E5) { // example: green for certain notes
      digitalWrite(GREEN_PIN, HIGH);
      digitalWrite(RED_PIN, LOW);
    } else { // red for other notes
      digitalWrite(RED_PIN, HIGH);
      digitalWrite(GREEN_PIN, LOW);
    }
    tone(BUZZER_PIN, melody[note], duration);

    //to distinguish the notes, set a minimum time between them.
    //the note's duration + 30% seems to work well:
    int pauseBetweenNotes = duration * 1.30;
    delay(pauseBetweenNotes);
    
    //stop the tone playing:
    noTone(BUZZER_PIN);
  }
}


// #include "pitches.h"

// #define BUZZER_PIN 27



// int melody[] = {
//   NOTE_E4, NOTE_G4, NOTE_A4, NOTE_A4, REST,
//   NOTE_A4, NOTE_B4, NOTE_C5, NOTE_C5, REST,
//   NOTE_C5, NOTE_D5, NOTE_B4, NOTE_B4, REST,
//   NOTE_A4, NOTE_G4, NOTE_A4, REST,
  
//   NOTE_E4, NOTE_G4, NOTE_A4, NOTE_A4, REST,
//   NOTE_A4, NOTE_B4, NOTE_C5, NOTE_C5, REST,
//   NOTE_C5, NOTE_D5, NOTE_B4, NOTE_B4, REST,
//   NOTE_A4, NOTE_G4, NOTE_A4, REST,
  
//   NOTE_E4, NOTE_G4, NOTE_A4, NOTE_A4, REST,
//   NOTE_A4, NOTE_C5, NOTE_D5, NOTE_D5, REST,
//   NOTE_D5, NOTE_E5, NOTE_F5, NOTE_F5, REST,
//   NOTE_E5, NOTE_D5, NOTE_E5, NOTE_A4, REST,
  
//   NOTE_A4, NOTE_B4, NOTE_C5, NOTE_C5, REST,
//   NOTE_D5, NOTE_E5, NOTE_A4, REST,
//   NOTE_A4, NOTE_C5, NOTE_B4, NOTE_B4, REST,
//   NOTE_C5, NOTE_A4, NOTE_B4, REST,
  
//   NOTE_A4, NOTE_A4,
//   //Repeat of first part
//   NOTE_A4, NOTE_B4, NOTE_C5, NOTE_C5, REST,
//   NOTE_C5, NOTE_D5, NOTE_B4, NOTE_B4, REST,
//   NOTE_A4, NOTE_G4, NOTE_A4, REST,
  
//   NOTE_E4, NOTE_G4, NOTE_A4, NOTE_A4, REST,
//   NOTE_A4, NOTE_B4, NOTE_C5, NOTE_C5, REST,
//   NOTE_C5, NOTE_D5, NOTE_B4, NOTE_B4, REST,
//   NOTE_A4, NOTE_G4, NOTE_A4, REST,
  
//   NOTE_E4, NOTE_G4, NOTE_A4, NOTE_A4, REST,
//   NOTE_A4, NOTE_C5, NOTE_D5, NOTE_D5, REST,
//   NOTE_D5, NOTE_E5, NOTE_F5, NOTE_F5, REST,
//   NOTE_E5, NOTE_D5, NOTE_E5, NOTE_A4, REST,
  
//   NOTE_A4, NOTE_B4, NOTE_C5, NOTE_C5, REST,
//   NOTE_D5, NOTE_E5, NOTE_A4, REST,
//   NOTE_A4, NOTE_C5, NOTE_B4, NOTE_B4, REST,
//   NOTE_C5, NOTE_A4, NOTE_B4, REST,
//   //End of Repeat
  
//   NOTE_E5, REST, REST, NOTE_F5, REST, REST,
//   NOTE_E5, NOTE_E5, REST, NOTE_G5, REST, NOTE_E5, NOTE_D5, REST, REST,
//   NOTE_D5, REST, REST, NOTE_C5, REST, REST,
//   NOTE_B4, NOTE_C5, REST, NOTE_B4, REST, NOTE_A4,
  
//   NOTE_E5, REST, REST, NOTE_F5, REST, REST,
//   NOTE_E5, NOTE_E5, REST, NOTE_G5, REST, NOTE_E5, NOTE_D5, REST, REST,
//   NOTE_D5, REST, REST, NOTE_C5, REST, REST,
//   NOTE_B4, NOTE_C5, REST, NOTE_B4, REST, NOTE_A4
// };

// int durations[] = {
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8,
  
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8,
  
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 8, 4, 8,
  
//   8, 8, 4, 8, 8,
//   4, 8, 4, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 4,
  
//   4, 8,
//   //Repeat of First Part
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8,
  
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8,
  
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 8, 4, 8,
  
//   8, 8, 4, 8, 8,
//   4, 8, 4, 8,
//   8, 8, 4, 8, 8,
//   8, 8, 4, 4,
//   //End of Repeat
  
//   4, 8, 4, 4, 8, 4,
//   8, 8, 8, 8, 8, 8, 8, 8, 4,
//   4, 8, 4, 4, 8, 4,
//   8, 8, 8, 8, 8, 2,
  
//   4, 8, 4, 4, 8, 4,
//   8, 8, 8, 8, 8, 8, 8, 8, 4,
//   4, 8, 4, 4, 8, 4,
//   8, 8, 8, 8, 8, 2
// };

// void setup()
// {
//   pinMode(BUZZER_PIN, OUTPUT);
// }

// void loop()
// {
//   int size = sizeof(durations) / sizeof(int);

//   for (int note = 0; note < size; note++) {
//     //to calculate the note duration, take one second divided by the note type.
//     //e.g. quarter note = 1000 / 4, eighth note = 1000/8, etc.
//     int duration = 1000 / durations[note];
//     tone(BUZZER_PIN, melody[note], duration);

//     //to distinguish the notes, set a minimum time between them.
//     //the note's duration + 30% seems to work well:
//     int pauseBetweenNotes = duration * 1.30;
//     delay(pauseBetweenNotes);

//     //stop the tone playing:
//     noTone(BUZZER_PIN);
//   }
// }