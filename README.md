# Debian-Router-Project
Make any debian distributuion a router or install from our prebuild iso

# Installer
<ul>
 <li>For Debian Distribution Debian package:-<a href="https://github.com/sounakkar/Debian-Router-Project/blob/main/DEBIAN/drp.deb?raw=true">Download</a>
 <strong>install using dpkg -i drp.deb <br>for this search single desired network interface manually then insert using echo "enp0s3" > /var/www/html/network/igs/LAN/assign .then reboot</strong>
 </li>
 <li>For Direct Minimal iso Installer(Mega):-<a href="https://mega.nz/file/YVFxDSja#DZiwNc6X2EyG_WrdaehNCebAInY5StXigm4ObWf3I9Q">Download</a> <br> (for iso install Open terminal type cd /pkg then type ./install and follow the instruction after install on terminal go to /pkg and run ./set) then reboot </li>
  </ul>

# Post Install
 <strong>After install(both type) and setting LAN management interfaces conect a wire from the LAN inerface(Default ip 192.168.0.1/24) to the (LAN device) issue a static ip on (LAN device's) interface (like 192.168.0.2/24) conect to LAN  interfaces(Default ip 192.168.0.1)  and assign WAN,OPT,LAN interfaces from gui.OS SUPPORT STP for multi port assigned to LAN WAN OPT. Assignment of Multiple Ip is restricted, ip inserted must be in ip/subnet charecter(Like 192.168.0.1/24)  </strong>
