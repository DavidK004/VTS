#include "DHT.h"
#include <WiFi.h>
#include <HTTPClient.h>

#define DHTPIN 33
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);

#define MOISTURE_PIN 36 

const char* ssid = "Starlink";
const char* password = "vtuz8163";
void setup() {
  Serial.begin(115200);
  dht.begin();
  delay(2000);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();
  float light = 0;

  if (isnan(temperature) || isnan(humidity)) {
    Serial.println("Failed to read from DHT sensor!");
  } else {
    Serial.print("Temperature: ");
    Serial.print(temperature);
    Serial.print("°C  |  Humidity: ");
    Serial.print(humidity);
    Serial.println("%");
  }


  int rawMoisture = analogRead(MOISTURE_PIN); 
  float moisturePercent = map(rawMoisture, 4095, 0, 0, 100); 
  Serial.print("Soil Moisture: ");
  Serial.print(moisturePercent);
  Serial.println("%");

  Serial.println("---------------------------");
  String jsonData = "{\"humidity_air\":" + String(humidity) + 
                    ",\"humidity_ground\":" + String(moisturePercent) + 
                    ",\"temperature\":" + String(temperature) + 
                    ",\"light\":" + String(light) + "}";

    // Send data to Machinechat JEDI 
  HTTPClient http;
  http.begin("http://10.102.229.221:8000/api/weather/create/"); 
  http.addHeader("Content-Type", "application/json");
  http.addHeader("accept", "application/json");
  http.addHeader("X-Mikro-Key", "La7f9tq9yviCbiH5jc7zuhv5AcMYdhjB");
  int httpResponseCode = http.POST(jsonData);
  if (httpResponseCode > 0) {
    String response = http.getString();
    Serial.println(httpResponseCode);
    Serial.println(response);
  } else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();
  delay(1000); 
}