#! /usr/bin/python
import os

res = os.popen('sensors').read()
res.replace("Core0 Temp:   +", "")
res = res.replace("Core0 Temp:   +", "")
res = res.split(chr(ord('\xc2')), 1)[0]
res = res.replace("Adapter: PCI adapter", "")
res = res.replace("k8temp-pci-00c3", "")
res = res.replace("\n", "")
print res
