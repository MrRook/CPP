# file comparator
import sys
ff=open(sys.argv[1],"r")
fs=open(sys.argv[2],"r")
k=ff.readlines()
j=fs.readlines()
ff.close()
fs.close()
if(len(k)!=len(j)):
	print("WA")
	sys.exit(1)
for i in range(len(k)):
	if len(k[i].split()) != len(j[i].split()) or cmp(k[i].split(),j[i].split())!=0:
		print("WA")
		sys.exit(-1)
print("ACCEPTED")

