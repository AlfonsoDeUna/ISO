#  QUERIES DE GRAFANA

## 1. **Uso de CPU (%)**

```promql
100 - (avg(irate(node_cpu_seconds_total{mode="idle"}[5m])) * 100)
```
- **Explicación**: mide el porcentaje de CPU usada.  
- **Tip**: `5m` es la ventana de media (puedes usar `1m`, `5m`, etc.).


## 2. **Uso de Memoria RAM (%)**

```promql
(1 - (node_memory_MemAvailable_bytes / node_memory_MemTotal_bytes)) * 100
```
- **Explicación**: muestra cuánto % de memoria está en uso.


## 3. **Espacio en Disco Usado (%)**

```promql
(1 - (node_filesystem_avail_bytes{mountpoint="/",fstype!="tmpfs",fstype!="overlay"} / node_filesystem_size_bytes{mountpoint="/",fstype!="tmpfs",fstype!="overlay"})) * 100
```
- **Explicación**: uso de disco en el punto de montaje `/` (raíz).


## 4. **Lectura y Escritura de Disco (Bytes/seg)**

- **Lecturas:**
```promql
rate(node_disk_read_bytes_total[5m])
```
- **Escrituras:**
```promql
rate(node_disk_written_bytes_total[5m])
```
- **Tip**: ideal para ver actividad de disco en gráficos de líneas.

## 5. **Uso de Red (Bytes recibidos y enviados por segundo)**

- **Recibidos:**
```promql
rate(node_network_receive_bytes_total{device!="lo"}[5m])
```
- **Enviados:**
```promql
rate(node_network_transmit_bytes_total{device!="lo"}[5m])
```
- **Nota**: filtra la interfaz de loopback (`lo`).


## 6. **Carga del sistema (Load Average)**

- **Carga 1 minuto:**
```promql
node_load1
```
- **Carga 5 minutos:**
```promql
node_load5
```
- **Carga 15 minutos:**
```promql
node_load15
```
- **Tip**: compara con el número de núcleos de CPU que tienes (`nproc`) para saber si hay sobrecarga.

## 7. **Procesos en ejecución**

```promql
node_procs_running
```
- **Tip**: si ves subidas repentinas, puede indicar saturación.

## 8. **Temperatura de CPU** (si tu máquina exporta esta métrica)

```promql
node_hwmon_temp_celsius
```
- **Ojo**: no todos los exporters traen temperatura; depende de tu **node_exporter**.

## 9. **Estado de Servicios o Targets en Prometheus**

- **Targets caídos:**
```promql
up == 0
```
- **Normalmente en un panel de alerta** para saber si algún servicio monitorizado ha dejado de responder.


# Recomendaciones de Panel en Grafana

Cuando pongas estas queries:
- **CPU, RAM, Disco y Red** ➔ **Gráficos de Líneas** (Line Graph).
- **Espacio de Disco %** ➔ **Gauge** o **Barra de progreso**.
- **Temperatura y Procesos** ➔ **Single Stat** o **Time series pequeña**.

