#!/usr/bin/env bash

LOGFILE="/var/log/ufw.log"

if [ ! -f "$LOGFILE" ]; then
  echo "ERROR: No existe el archivo $LOGFILE"
  exit 1
fi

echo "Contando conexiones bloqueadas en $LOGFILE..."

# Extraemos únicamente las líneas que indiquen 'BLOCK' y buscamos la IP
grep "BLOCK" "$LOGFILE" | while read LINE
do
  # Usamos sed o awk para extraer la IP que está entre corchetes o en una posición concreta
  # Ejemplo: ... BLOCK IN=enp0s3 SRC=192.168.1.100 DST=...
  # Extraigamos SRC= con sed
  IP=$(echo "$LINE" | sed -n 's/.*SRC=\([0-9.]*\).*/\1/p')
  # Mostramos solo la IP
  echo "$IP"
done | sort | uniq -c | sort -nr | head -n 10
