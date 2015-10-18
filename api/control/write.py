import serial
import sys
import time
ser = serial.Serial("/dev/ttyUSB0", 9600)
ser.close();
ser.open();
if len (sys.argv) > 1:    
   ser.write(sys.argv[1])
time.sleep(1);
ser.close();
