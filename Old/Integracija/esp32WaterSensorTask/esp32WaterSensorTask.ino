#define POWER_PIN   17
#define SIGNAL_PIN  36
#define LED_PIN     5   

int value = 0;

void setup() {
  Serial.begin(9600);
  analogSetAttenuation(ADC_11db);

  pinMode(POWER_PIN, OUTPUT);
  digitalWrite(POWER_PIN, LOW);

  pinMode(LED_PIN, OUTPUT);
  digitalWrite(LED_PIN, LOW); 
}

void loop() {
  digitalWrite(POWER_PIN, HIGH);
  delay(10);

  value = analogRead(SIGNAL_PIN);
  digitalWrite(POWER_PIN, LOW);


  float percent = (value / 4095.0) * 100.0;

  Serial.print("Moisture: ");
  Serial.print(percent, 1);
  Serial.print("% | Status: ");

  if (percent < 30.0) {
    Serial.println("DRY -> WATER NEEDED");


    int blinkDelay = map(percent, 0, 30, 100, 1000);

    digitalWrite(LED_PIN, HIGH);   
    delay(blinkDelay / 2);
    digitalWrite(LED_PIN, LOW);     
    delay(blinkDelay / 2);

  } else {
    Serial.println("OK");
    digitalWrite(LED_PIN, LOW);   
    delay(500);
  }
}
