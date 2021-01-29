#!/bin/bash 
iptables -t nat -D POSTROUTING -o WAN -j MASQUERADE --random


echo "1" > /proc/sys/net/ipv4/ip_forward

iptables -A INPUT -p tcp -i WAN  --destination-port 21 -j DROP
iptables -A INPUT -p tcp -i WAN  --destination-port 80 -j DROP
iptables -A INPUT -p tcp -i WAN  --destination-port 443 -j DROP


/usr/bin/WAN.sh
wait
/usr/bin/LAN.sh
wait
/usr/bin/OPT.sh
wait
/usr/bin/fwalld.sh
wait
service network-manager restart
wait
iptables -t nat -A POSTROUTING -o WAN -j MASQUERADE --random
systemctl restart isc-dhcp-server

