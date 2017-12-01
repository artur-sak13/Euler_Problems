n=600851475143
a=2
l = []

for a in range(2,13195):
    x=n//a
    if n%a==0:
        l.append(a)
        n=x
    else:
        a=a+1
w=max(l)

print(w)
