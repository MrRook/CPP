#!/bin/bash
compiler=$1
uid=$2
timeout=$3
question=$4
#compile phase
error=1

$compiler ${uid}.cpp -o ${uid}.out 2>${uid}.output  && error=0

#check if compilation done
if [ "$error" == "1" ]; then
echo -e "CERR\n"
echo
cat ${uid}.output
rm -f ${uid}.output
rm -f ${uid}.out > /dev/null
exit 0
fi

#run the program
error=2
timeout ${timeout} ./${uid}.out 1>${uid}.output 2>${uid}.error <${question}.input && error=0
if [ -s  ${uid}.error ]; then
rm -f ${uid}.output
rm -f ${uid}.error
rm -f ${uid}.out > /dev/null
echo "SEGMENTATION FAULT"
exit 0
fi
if [ $error == 2 ]; then
rm -f ${uid}.output
rm -f ${uid}.error
rm -f ${uid}.out > /dev/null
echo "TLE"
exit 0
fi

sed '/^$/d' ${uid}.output > ${uid}.txt
mv ${uid}.txt ${uid}.output
sed '/^$/d' ${question}sol.txt > ${question}sol.output
#compare the output
echo $(python codechecker.py ${question}sol.output ${uid}.output) 
rm -f ${uid}.output
rm -f ${uid}.error
rm -f ${uid}.out > /dev/null
#write success

