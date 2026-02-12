# EJERCICIOS

## Para que pueda hablar nuestro ordenador
```powershell
Add-Type -AssemblyName System.Speech
$hablar = New-Object System.Speech.Synthesis.SpeechSynthesizer
$hablar.Speak("Hola, soy la computadora 2 y he recibido tu mensaje")
```
