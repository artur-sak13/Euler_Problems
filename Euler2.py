term1=1
term2=1

a=0

while term1<4000000:
    sum=term1+term2
    term1=term2
    term2=sum
    if term1 %2==0:
        a=a+term1

print(a)
