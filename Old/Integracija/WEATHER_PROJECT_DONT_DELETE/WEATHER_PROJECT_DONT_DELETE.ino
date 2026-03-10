#include <WiFi.h>
#include <HTTPClient.h>
#include <DHT.h>

const char* ssid = "Starlink";
const char* password = "vtuz8183";
const char* serverUrl = "http://10.113.10.221:8000/api/weather/create";

#define DHTPIN 33
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);

#define SOIL_PIN 39
#define LDR_PIN 36

void setup() {
  Serial.begin(115200);
  dht.begin();
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
}

void loop() {
  float temperature = dht.readTemperature();
  float humidityAir = dht.readHumidity();

  int soilValue = analogRead(SOIL_PIN);
  int humidityGround = map(soilValue, 4095, 0, 0, 100);
  humidityGround = constrain(humidityGround, 0, 100);

  int ldrValue = analogRead(LDR_PIN);
  int light = map(ldrValue, 0, 4095, 0, 100);
  light = constrain(light, 0, 100);

  Serial.print("Temperature: "); Serial.print(temperature); Serial.println(" °C");
  Serial.print("Air Humidity: "); Serial.print(humidityAir); Serial.println(" %");
  Serial.print("Soil Moisture: "); Serial.print(humidityGround); Serial.println(" %");
  Serial.print("Light: "); Serial.print(light); Serial.println(" %");
  Serial.println("-------------------------");

  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverUrl);
    http.addHeader("Content-Type", "application/json");
    http.addHeader("X-Mikro-Key", "La7f9tq9yviCbiH5jc7zuhv5AcMYdhjB");

    String jsonPayload = "{";
    jsonPayload += "\"temperature\":" + String(temperature) + ",";
    jsonPayload += "\"humidity_air\":" + String(humidityAir) + ",";
    jsonPayload += "\"humidity_ground\":" + String(humidityGround) + ",";
    jsonPayload += "\"light\":" + String(light);
    jsonPayload += "}";

    http.POST(jsonPayload);
    http.end();
  }

  delay(5000);
}
