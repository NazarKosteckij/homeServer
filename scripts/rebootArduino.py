#! /usr/bin/python
import serial
conn = serial.Serial("/dev/ttyACM0", 9600)

conn.write("reboot")

conn.close()
