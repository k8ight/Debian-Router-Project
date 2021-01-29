iptables -t nat -A POSTROUTING -o WAN -j MASQUERADE --random
iptables -A FORWARD -i LAN -o WAN -j ACCEPT
iptables -A FORWARD -i WAN -o LAN -m conntrack --ctstate RELATED, ESTABLISHED -j ACCEPT
iptables -A FORWARD -j DROP
