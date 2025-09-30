### **Comandos divertidos y ASCII**
1.  **Muestra una vaca que habla:** `cowsay "Hola"`
2.  **Muestra una vaca que piensa:** `cowthink "Hmm..."`
3.  **Crea un banner de texto grande:** `figlet "BIENVENIDO"`
4.  **Crea un banner con una fuente específica:** `figlet -f slant "Inclinado"`
5.  **Crea un banner con otra fuente:** `figlet -f big "ENORME"`
6.  **Crea texto grande y colorido:** `toilet -F gay "Arcoiris"`
7.  **Crea texto con efecto metálico:** `toilet -F metal "Heavy Metal"`
8.  **Crea texto con un borde:** `toilet -F border "Encerrado"`
9.  **Crea texto con fuente y filtro:** `toilet -f mono12 -F border "Estilo"`
10. **Crea un banner de 10 letras máx.:** `banner "Hola"`
11. **Invierte el orden de un texto:** `rev`
12. **Muestra una frase o cita al azar:** `fortune`
13. **Muestra el calendario del mes actual:** `cal`
14. **Muestra el calendario de un año:** `cal 2025`
15. **Descompone un número en factores primos:** `factor 1337`
16. **Muestra el valor de Pi:** `pi`
17. **Genera una identidad falsa:** `rig`
18. **Repite un texto sin parar:** `yes "Linux"`
19. **Hace que el ordenador hable:** `espeak "Hola mundo"`
20. **Usa una voz en español:** `espeak -v spanish "La terminal puede hablar"`
21. **Muestra los usuarios conectados:** `w`

**ESPECIAL** neofecht

### **Animaciones y Efectos Visuales**
22. **Muestra una locomotora de vapor:** `sl`
23. **Inicia la lluvia digital de Matrix:** `cmatrix`
24. **Matrix en modo "screensaver":** `cmatrix -s`
25. **Matrix en negrita y color rojo:** `cmatrix -b -C red`
26. **Matrix en color cian:** `cmatrix -C cyan`
27. **Enciende una hoguera en la terminal:** `aafire`
28. **Un gato persigue tu ratón:** `oneko`
29. **Un perro persigue tu ratón:** `oneko -dog`
30. **La animación del Nyan Cat:** `nyancat`
31. **Una demo audiovisual abstracta:** `bb`
32. **Ojos que siguen tu cursor:** `xeyes`
33. **Simula una escena de hacking:** `hollywood`

### **Huevos de Pascua (Easter Eggs)**
34. **Una vaca oculta en apt-get:** `apt-get moo`
35. **El huevo de pascua de aptitude:** `aptitude -v moo`

### **Combinaciones Simples (Piping)**
36. **Una vaca dice una frase al azar:** `fortune | cowsay`
37. **Una vaca piensa una frase al azar:** `fortune | cowthink`
38. **Tu nombre en un banner y a color:** `echo "MiNombre" | figlet | lolcat`
39. **El calendario en un banner:** `cal | figlet`
40. **El calendario con borde y color:** `cal | toilet -F border --gay`
41. **La fecha y hora actuales en grande:** `date | figlet -f big`
42. **Listado de ficheros a color:** `ls -l | lolcat`
43. **Información del sistema a color:** `neofetch | lolcat`
44. **Una frase al azar, pero al revés:** `fortune | rev`
45. **Que la vaca hable a color:** `cowsay "Arcoiris" | lolcat`
46. **La fecha en formato ISO, en grande:** `date -I | figlet`
47. **Tu nombre con efecto metálico:** `echo "MiNombre" | toilet -F metal`

### **Combinaciones con Personajes Específicos**
48. **Un dragón dice una frase al azar:** `fortune | cowsay -f dragon`
49. **Un Tux (pingüino de Linux) dice algo:** `cowsay -f tux "Linux Mola"`
50. **Un fantasma dice "Boo!":** `cowsay -f ghostbusters "Boo!"`
51. **Un esqueleto dice una frase:** `fortune | cowsay -f skeleton`
52. **Un dragón de fuego a color:** `cowsay -f dragon "FUEGO" | lolcat`
53. **El dragón anuncia la fecha:** `date | cowsay -f dragon`
54. **El Tux anuncia la fecha:** `date | cowsay -f tux`
55. **El fantasma te da la hora:** `date +%T | cowsay -f ghostbusters`

### **Combinaciones Creativas y Avanzadas**
56. **Fuego hecho de una palabra:** `yes "FUEGO" | aafire`
57. **Fuego hecho de una palabra a color:** `yes "FUEGO" | lolcat | aafire`
58. **Un reloj que se actualiza:** `watch -n1 date`
59. **Un reloj gigante que se actualiza:** `watch -n1 "date +%T | figlet -f big"`
60. **Un reloj gigante metálico:** `watch -n1 "date +%T | toilet -f mono12 -F metal"`
61. **La lluvia de Matrix, pero hecha de unos y ceros:** `yes "01" | cmatrix`
62. **El ordenador dice una frase al revés:** `fortune | rev | espeak -v spanish`
63. **El calendario de tu nacimiento en llamas:** `cal 10 2005 | aafire`
64. **Una frase de 'fortune' sobre ordenadores:** `fortune -m "computer"`
65. **La vaca dice una frase sobre ordenadores:** `fortune -m "computer" | cowsay`
66. **Un cronómetro simple en la terminal:** `time cat`
67. **Convertir una imagen a arte ASCII:** `asciiviewer /ruta/a/tu/imagen.jpg`
68. **El listado de procesos del sistema a color:** `ps aux | lolcat`
69. **El dragón anuncia la hora y el Tux la fecha:** `date +%T | cowsay -f dragon; date +%D | cowsay -f tux`
70. **Un bucle infinito de sabiduría colorida:** `while true; do fortune; sleep 2; done | lolcat`

### **Ejemplos para la "Guerra de Terminales"**
71. **Lluvia de Matrix sobre un banner:** `figlet "HACKED"; cmatrix`
72. **Una frase aleatoria dentro de un borde metálico:** `fortune | toilet -F border:metal`
73. **Un mensaje de bienvenida complejo:** `echo "Bienvenido" | figlet; neofetch`
74. **Fuego con textura de calendario:** `cal 2025 | aafire`
75. **Un reloj que habla (cada 10 seg):** `watch -n10 "date +%T | espeak -v spanish"`
76. **La vaca dice el resultado de un factor:** `factor 314 | cowsay`
77. **Un banner con la fecha, al revés:** `date | rev | figlet`
78. **El listado de archivos como lluvia de Matrix:** `ls -R / | cmatrix`
79. **Una hoguera para una frase de fortuna:** `fortune; aafire`
80. **Tu nombre en metal y al revés:** `echo "MiNombre" | rev | toilet -F metal`
81. **Un mensaje que se autodestruye (simulado):** `echo "Este mensaje se autodestruira"; sleep 2; clear; aafire`
82. **Identidad falsa presentada por un dragón:** `rig | cowsay -f dragon`
83. **Texto con doble filtro en toilet:** `echo "DOBLE" | toilet -F metal:border`
84. **Texto volteado y metálico:** `echo "FLIP" | toilet -F flip:metal`
85. **Un banner hecho de banners:** `figlet "FIGLET" | toilet`
86. **Reloj de 24h con `watch` y `toilet`:** `watch -n1 "date +%T | toilet -f term"`
87. **Un bucle de `sl` (hay que pararlo con Ctrl+C):** `while true; do sl; sleep 1; done`
88. **Mostrar los procesos y colorearlos:** `top -n 1 | lolcat`
89. **Un menú de restaurante con `cowsay`:** `echo "Menu: 1. Filete 2. Ensalada" | cowsay`
90. **La lluvia de Matrix con tu nombre cayendo:** `yes "MiNombre" | cmatrix`
91. **La secuencia de Hacking definitiva:** `cmatrix -s; neofetch | lolcat; fortune | cowsay -f dragon; aafire`
