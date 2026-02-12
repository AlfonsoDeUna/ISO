# EJERCICIOS

## Para que pueda hablar nuestro ordenador
```powershell
Add-Type -AssemblyName System.Speech
$hablar = New-Object System.Speech.Synthesis.SpeechSynthesizer
$hablar.Speak("Hola, soy la computadora 2 y he recibido tu mensaje")
```
## 3. Preguntón 
Haz un script que pregunte al usuario su nombre con Read-Host y luego muestre: Encantado de conocerte, [nombre]!

## 4. El eco  
Pide al usuario que escriba una frase. Muéstrala tres veces seguidas, cada una en una línea distinta.
