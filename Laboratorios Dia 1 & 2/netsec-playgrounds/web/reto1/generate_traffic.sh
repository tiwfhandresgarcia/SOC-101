#!/bin/bash
# Genera tráfico hacia traffic.php cada 15s
while true; do
  curl -s http://localhost/reto1/traffic.php >/dev/null 2>&1
  sleep 15
done
